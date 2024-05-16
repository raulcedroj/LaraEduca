<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex flex-col items-center justify-center">
                @php
                    $userRole = Auth::user()->roles->first();
                @endphp

                <p class="text-4xl font-bold mb-8 pt-8">Bienvenido, 
                    @if($userRole !== null)
                        {{ $userRole->name }} 
                    @endif
                    <span class="text-[#11979d]">{{ Auth::user()->name }}</span>
                </p>
                <img src="{{ asset('logo-laraeduca.png') }}" alt="hola" class="w-96 pb-4">
            </div>
        </div>
    </div>
</x-app-layout>
