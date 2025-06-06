<x-app-layout>
<div class="container mx-auto max-w-3xl py-8">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="w-full h-64 bg-gray-100 flex items-center justify-center relative">
            <a href="{{ url()->previous() }}" class="absolute top-4 left-4 hover:scale-110 transition" title="Voltar">
                <x-heroicon-o-arrow-left class="w-7 h-7 text-gray-700" />
            </a>
            <img src="{{ $event->image ? Storage::disk('public')->url($event->image) : 'https://picsum.photos/600.webp' }}" alt="Imagem do evento" class="object-cover w-full h-full">
        </div>
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-2">{{ $event->title }}</h1>
            <p class="text-gray-500 mb-4 flex items-center">
                <x-heroicon-o-user class="w-5 h-5 mr-1 text-purple-400" />
                Organizador:
                <span class="ml-1 font-bold">{{ $event->user ? $event->user->name : ($event->organizer ?? 'Não informado') }}</span>
            </p>
            <div class="flex flex-col md:flex-row md:items-center md:gap-6 mb-4">
                <p class="text-gray-600 flex items-center mb-2 md:mb-0"><x-heroicon-o-calendar-days class="w-5 h-5 mr-1 text-gray-400" />{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d/m/Y') : 'Data não informada' }}</p>
                <span class="hidden md:inline mx-2 text-gray-300">|</span>
                <p class="text-gray-500 flex items-center mb-2 md:mb-0"><x-heroicon-o-users class="w-5 h-5 mr-1 text-blue-400" />{{ $event->users ? $event->users->count() : 0 }} participantes</p>
                <span class="hidden md:inline mx-2 text-gray-300">|</span>
                <p class="text-gray-500 flex items-center mb-2 md:mb-0"><x-heroicon-o-eye class="w-5 h-5 mr-1 text-green-400" />{{ $event->is_public ? 'Público' : 'Privado' }}</p>
                <span class="hidden md:inline mx-2 text-gray-300">|</span>
                <p class="text-gray-500 flex items-center"><x-heroicon-o-map-pin class="w-5 h-5 mr-1 text-pink-400" />{{ $event->location }}</p>
            </div>
            <div class="mt-4">
                <h2 class="text-lg font-semibold mb-1">Descrição</h2>
                <p class="text-gray-700">{{ $event->description ?? 'Nenhuma descrição informada.' }}</p>
            </div>
            @if($event->items && is_array($event->items) && count($event->items))
            <div class="mt-4">
                <h2 class="text-lg font-semibold mb-1">Itens do evento</h2>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach($event->items as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="flex justify-center mt-6">
                @auth
                    <form action="{{ route('events.join', $event->id) }}" method="POST">
                        @csrf
                        @if($event->users && $event->users->contains(auth()->user()->id))
                            <button type="button" class="px-4 py-2 bg-gray-300 text-gray-600 rounded cursor-not-allowed" disabled>Já participando</button>
                        @else
                            <button type="submit" class="px-4 py-2 bg-[#4439C5] text-white rounded hover:bg-[#362fa3] transition">Participar</button>
                        @endif
                    </form>
                @endauth
            </div>
        </div>
    </div>
</div>
</x-app-layout>