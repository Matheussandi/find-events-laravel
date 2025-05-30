@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto flex flex-col items-center justify-center py-16">
        <h1 class="text-3xl font-extrabold text-[#4439C5] mb-4 text-center">Dashboard</h1>
        <p class="mb-4 text-lg text-gray-700 text-center">Bem-vindo ao seu painel! Aqui você pode gerenciar sua conta e
            visualizar seus dados.</p>

        <div class="flex flex-col md:flex-row gap-4 w-full max-w-2xl justify-center mb-8">
            <a href="{{ route('events.index') }}"
                class="px-4 py-2 bg-[#4439C5] text-white font-bold rounded shadow hover:bg-[#362fa3] transition w-full text-center">Visualizar
                Eventos</a>
            <button onclick="document.getElementById('manage-message').classList.toggle('hidden')"
                class="px-4 py-2 bg-gray-500 text-white font-bold rounded shadow hover:bg-gray-700 transition w-full text-center">Gerenciar
                Evento</button>
        </div>
        <div id="manage-message"
            class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-8 w-full max-w-2xl hidden">
            <p>Área de gerenciamento de eventos. Em breve você poderá organizar seus eventos por aqui!</p>
        </div>
    </div>
@endsection
