@extends('layouts.main')

@section('title', 'Entrar')

@section('content')
 <div class="container mx-auto flex flex-col items-center justify-center py-16">
    <div class="w-full max-w-md">
        <h1 class="text-2xl font-bold text-[#4439C5] mb-6 text-center">Entrar</h1>
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-1">E-mail</label>
                <input id="email" type="email" name="email" required autofocus class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#4439C5]">
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-1">Senha</label>
                <input id="password" type="password" name="password" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#4439C5]">
            </div>
            <button type="submit" class="w-full py-2 mt-4 bg-[#4439C5] text-white font-bold rounded hover:bg-[#362fa3] transition">Entrar</button>
        </form>
        <div class="mt-6 text-center">
            <span class="text-gray-600">Não tem uma conta?</span>
            <a href="{{ route('register') }}" class="text-[#4439C5] font-semibold hover:underline ml-1">Cadastre-se</a>
        </div>
    </div>
</div>
@endsection
