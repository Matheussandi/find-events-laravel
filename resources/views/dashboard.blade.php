@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto flex flex-col items-center justify-center py-16">
        <h1 class="text-3xl font-extrabold text-[#4439C5] mb-4 text-center">Dashboard</h1>
        <p class="mb-4 text-lg text-gray-700 text-center">Bem-vindo ao seu painel! Aqui você pode gerenciar sua conta e visualizar seus dados.</p>

        <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-2xl mb-8">
            <h2 class="text-xl font-semibold mb-4">Seus Dados</h2>
            <p class="mb-2 text-gray-600">Aqui você pode ver suas atividades recentes e estatísticas.</p>
            <!-- Adicione mais conteúdo do dashboard aqui -->
        </div>
        <div class="mt-6 w-full max-w-2xl">
            <h2 class="text-xl font-semibold mb-4">Ações Rápidas</h2>
            <ul class="list-disc pl-5 space-y-2">
                <li><a href="{{ url('/profile') }}" class="text-blue-600 hover:underline">Ver Perfil</a></li>
                <li><a href="{{ url('/settings') }}" class="text-blue-600 hover:underline">Configurações da Conta</a></li>
                <li><a href="{{ url('/reports') }}" class="text-blue-600 hover:underline">Ver Relatórios</a></li>
            </ul>
        </div>
    </div>
@endsection