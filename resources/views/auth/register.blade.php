@extends('layouts.main')

@section('title', 'Cadastrar')

@section('content')
 <div class="container mx-auto flex flex-col items-center justify-center py-16">
    <div class="w-full max-w-md ">
        <h1 class="text-2xl font-bold text-[#4439C5] mb-6 text-center">Criar Conta</h1>
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-1">Nome</label>
                <input id="name" type="text" name="name" required autofocus class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#4439C5]">
            </div>
            <div>
                <label for="surname" class="block text-gray-700 font-semibold mb-1">Sobrenome</label>
                <input id="surname" type="text" name="surname" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#4439C5]">
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-1">E-mail</label>
                <input id="email" type="email" name="email" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#4439C5]">
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-1">Senha</label>
                <input id="password" type="password" name="password" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#4439C5]">
            </div>
            <div>
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-1">Confirme a Senha</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#4439C5]">
            </div>
            <button type="submit" class="w-full mt-4 py-2 bg-[#4439C5] text-white font-bold rounded hover:bg-[#362fa3] transition">Cadastrar</button>
        </form>
        <div class="mt-6 text-center">
            <span class="text-gray-600">Já tem uma conta?</span>
            <a href="{{ route('login') }}" class="text-[#4439C5] font-semibold hover:underline ml-1">Entrar</a>
        </div>
    </div>
</div>
@endsection
