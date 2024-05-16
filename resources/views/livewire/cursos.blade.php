<div>
    <div class="max-w-full mt-8 mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-8">

            @if (Auth::user()->roles->first()->name === 'admin')
                <button wire:click="$set('open_create', true)"
                    class=" p-4 bg-green-400 rounded-xl shadow-md flex hover:text-gray-800 focus:outline-none hover:bg-green-300 transition duration-150 ease-in-out">
                    <span class="material-symbols-outlined mr-2">add_box</span>Añadir nuevo curso
                </button>
            @endif

            <div class="flex justify-evenly flex-wrap gap-10">
                @foreach ($cursos as $curso)
                    <div class="bg-white shadow-md rounded-xl p-6 flex justify-between items-center w-96">
                        <div class="space-y-3">
                            <p class="text-gray-800 flex items-center text-xl font-bold"><span
                                    class="material-symbols-outlined mr-2">school</span> {{ $curso->nombre }}</p>
                            <p class="text-gray-800 flex items-center text-md font-bold"><span
                                    class="material-symbols-outlined">person</span> {{ $curso->teacher->name }}</p>
                        </div>

                        @if (Auth::user()->roles->first()->name === 'admin')
                            <div class="">
                                <button wire:click="edit({{ $curso->id }})">
                                    <span
                                        class="material-symbols-outlined hover:text-green-500 cursor-pointer text-gray-800">edit</span>
                                </button>

                                <button wire:click="delete({{ $curso->id }})">
                                    <span
                                        class="material-symbols-outlined hover:text-red-600 cursor-pointer text-gray-800">delete</span>
                                </button>

                            </div>
                        @endif

                    </div>
                @endforeach
            </div>

            <x-dialog-modal wire:model='open_create'>

                <x-slot name='title'>
                    <p>Crear nuevo curso</p>
                </x-slot>


                <x-slot name='content'>
                    <div class="modal">
                        <div class="modal-content flex flex-col items-center justify-center w-full space-y-3">
                            <!-- Formulario para crear un nuevo curso -->
                            <x-input type="text" wire:model="cursoCreate.nombre" placeholder="Nombre del curso" />
                            <select wire:model="cursoCreate.user_id"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Seleccione un usuario</option>
                                @foreach ($users as $user)
                                    @if ($user->roles->first()->name === 'profesor')
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </x-slot>
                <x-slot name='footer'>
                    <x-secondary-button type="button"
                        wire:click="$set('open_create', false)">Cancelar</x-secondary-button>
                    <x-button wire:click="create" class="ml-2">Crear Curso</x-button>


                </x-slot>
        </div>
    </div>
    </x-dialog-modal>


    <x-dialog-modal wire:model='open_edit'>

        <x-slot name='title'>
            @if ($selectedCurso)
                Editar el curso: {{ $selectedCurso->nombre }}
            @endif
        </x-slot>

        <x-slot name='content'>
            <div class="modal">
                <div class="modal-content flex flex-col items-center justify-center w-full space-y-3">
                    <!-- Formulario para crear un nuevo curso -->
                    <x-input type="text" wire:model="cursoEdit.nombre" placeholder="Nombre del curso" />
                    <select wire:model="cursoEdit.user_id"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="">Seleccione un usuario</option>
                        @foreach ($users as $user)
                            @if ($user->roles->first()->name === 'profesor')
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>

        <x-slot name='footer'>

            <x-secondary-button wire:click="closeModals" class="mr-2">
                Cancelar
            </x-secondary-button>

            <x-button wire:click='update'>
                Editar curso
            </x-button>

        </x-slot>

    </x-dialog-modal>

</div>
</div>
</div>
