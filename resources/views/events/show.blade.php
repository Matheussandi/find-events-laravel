@extends('layouts.main')

@section('title', $event->title)

@section('content')
<div class="container mx-auto max-w-3xl py-8">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="w-full h-64 bg-gray-100 flex items-center justify-center">
            <img src="{{ $event->image ? Storage::disk('public')->url($event->image) : 'https://picsum.photos/600.webp' }}" alt="Imagem do evento" class="object-cover w-full h-full">
        </div>
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-2">{{ $event->title }}</h1>
            <p class="text-gray-600 mb-2 flex items-center"><x-heroicon-o-calendar-days class="w-5 h-5 mr-1 text-gray-400" />Data: {{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d/m/Y') : 'Não informada' }}</p>
            <p class="text-gray-500 mb-2 flex items-center"><x-heroicon-o-users class="w-5 h-5 mr-1 text-blue-400" />Participantes: {{ $event->users ? $event->users->count() : 0 }}</p>
            <p class="text-gray-500 mb-2 flex items-center"><x-heroicon-o-eye class="w-5 h-5 mr-1 text-green-400" />É público: {{ $event->is_public ? 'Sim' : 'Não' }}</p>
            <div class="mt-4">
                <h2 class="text-lg font-semibold mb-1">Descrição</h2>
                <p class="text-gray-700">{{ $event->description ?? 'Nenhuma descrição informada.' }}</p>
            </div>
            <div class="mt-6 flex gap-2">
                <a href="{{ route('events.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">Voltar</a>
                @auth
                    <form action="#" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-[#4439C5] text-white rounded hover:bg-[#362fa3] transition">Participar</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
