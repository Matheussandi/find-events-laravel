@extends('layouts.main')

@section('title', 'Todos eventos')

@section('content')
    <div class="container">
        <div class="flex justify-between items-center my-4">
            <h1 class="text-2xl font-bold my-4">Todos eventos</h1>
            {{-- @auth --}}
                <a href="{{ route('events.create') }}" class="inline-block px-4 py-2 bg-[#4439C5] text-white font-bold rounded shadow hover:bg-[#362fa3] transition">Criar evento</a>
            {{-- @endauth --}}

        </div>
        @if(session('success'))
            <div id="notification-success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center fixed top-6 left-1/2 transform -translate-x-1/2 z-50 shadow-lg transition-opacity duration-500">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(() => {
                    const notif = document.getElementById('notification-success');
                    if (notif) {
                        notif.style.opacity = '0';
                        setTimeout(() => notif.remove(), 500);
                    }
                }, 1000);
            </script>
        @endif
        <input type="text" id="eventFilter" placeholder="Filtrar eventos..." class="mb-6 p-2 border rounded w-full" onkeyup="filterEvents()">
        <div id="events-list" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($events as $event)
            <div class="mb-4 border rounded-xl shadow-lg bg-white flex flex-col md:flex-row event-item transition hover:shadow-2xl overflow-hidden">
                <div class="md:w-1/3 w-full h-48 md:h-auto flex-shrink-0">
                    <img src="{{ $event->image ? Storage::disk('public')->url($event->image) : 'https://picsum.photos/400.webp' }}" alt="Imagem do evento" class="w-full h-full object-cover">
                </div>
                <div class="flex-1 w-full p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <h2 class="text-xl font-semibold event-title">{{ $event->title }}</h2>
                        </div>
                        <p class="text-gray-600 mb-1 flex items-center"><x-heroicon-o-calendar-days class="w-5 h-5 mr-1 text-gray-400" />Data: {{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d/m/Y') : 'Não informada' }}</p>
                        <p class="text-gray-500 mb-1 flex items-center"><x-heroicon-o-users class="w-5 h-5 mr-1 text-blue-400" />Participantes: {{ $event->users ? $event->users->count() : 0 }}</p>
                        <p class="text-gray-500 mb-2 flex items-center"><x-heroicon-o-eye class="w-5 h-5 mr-1 text-green-400" />É público: {{ $event->is_public ? 'Sim' : 'Não' }}</p>
                    </div>
                    <a href="{{ route('events.show', $event->id) }}" class="inline-block mt-2 px-4 py-2 bg-[#4439C5] text-white font-bold rounded shadow hover:bg-[#362fa3] transition">Ver detalhes</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <script>
        function filterEvents() {
            const input = document.getElementById('eventFilter');
            const filter = input.value.toLowerCase();
            const items = document.querySelectorAll('.event-item');
            items.forEach(item => {
                const title = item.querySelector('.event-title').textContent.toLowerCase();
                if (title.includes(filter)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
@endsection