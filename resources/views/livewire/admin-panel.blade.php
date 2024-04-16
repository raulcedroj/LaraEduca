<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    @if ($users->isEmpty())
        <div>
            <p class="text-gray-500 text-4xl text-center mt-20">¡No se encontraron usuarios!</p>
        </div>
    @else
        <div class="max-w-7xl mt-8 mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-8">
                @foreach ($users as $user)
                    <div class="bg-white shadow-md rounded-xl p-6 flex justify-between items-center" wire:key="user-{{ $user->id }}">
                        <div>
                        <p class="text-gray-800 flex items-center"><x-icons.user class="mr-2" /> {{ $user->name }}</p>
                        <p class="text-gray-800 flex items-center"><x-icons.mail class="mr-2" /> {{ $user->email }}</p>
                        <p class="text-gray-800 flex items-center"><x-icons.shield-check class="mr-2" /> {{ $user->roles->first()->name }}</p>
                        <!-- Mostrar más información del usuario si lo deseas -->
                    </div>

                        <div class="">
                        <button wire:click="edit({{ $user->id }})">
                            <x-icons.pencil-alt class="hover:text-green-500 cursor-pointer text-gray-800" />
                        </button>

                        <button wire:click="delete({{ $user->id }})">
                            <x-icons.x-circle class="hover:text-red-600 cursor-pointer text-gray-800" />
                        </button>

                    </div>

                    </div>
                @endforeach
            </div>
        </div>
        
        <x-dialog-modal wire:model='open_edit'>
            
            <x-slot name='title'>
                
                @if ($selectedUser)
                    Editar el user {{ $selectedUser->name }}
                @endif
            </x-slot>
            

            <x-slot name='content'>
                
                <div class="mb-4">
                    <x-label value='Nombre de usuario' />
                    <x-input type='text' class="w-full" wire:model='userEdit.name' />
                </div>

                <div>
                    <x-label value='Email' />
                    <x-input type='text' class="w-full" wire:model='userEdit.email' />
                </div>

                <div class="mt-4 flex flex-col space-y-2">
                    <x-label value='Roles' />
                
                    @foreach ($roles as $role)
                        <label class="inline-flex items-center">
                            <input type="radio" wire:model="userEdit.role_id" value="{{ $role->id }}" class="form-radio">
                            <span class="ml-2">{{ $role->name }}</span>
                        </label>
                    @endforeach
                </div>
                

            </x-slot>

            <x-slot name='footer'>
                
                <x-secondary-button wire:click="closeModals" class="mr-2">
                    Cancelar
                </x-secondary-button>

                <x-button wire:click='update'>
                    Editar user
                </x-button>
                
            </x-slot>
        </x-dialog-modal>
@endif

    
</div>
