<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('events.index') }}" method="GET"
                    class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                    <div class="flex-1 flex items-center gap-2">
                        <input type="text" name="search" placeholder="Buscar por título, descrição ou local"
                            class="p-2 border rounded w-full" value="{{ request('search') }}">
                        <button type="button" id="openFilterModal"
                            class="p-2 rounded bg-gray-100 border border-gray-400 text-gray-700 flex items-center hover:bg-gray-200 transition"
                            title="Filtros avançados">
                            <x-heroicon-o-adjustments-horizontal class="w-5 h-5" />
                        </button>
                    </div>
                </form>
                <!-- Modal de Filtros -->
                <div id="filterModal"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
                    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md relative">
                        <button id="closeFilterModal" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700">
                            <x-heroicon-o-x-mark class="h-6 w-6" />
                        </button>
                        <form action="{{ route('events.index') }}" method="GET" id="filterForm" class="space-y-6">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <div>
                                <label class="block font-semibold mb-2">Participantes (máximo)</label>
                                <div class="flex flex-wrap gap-4">
                                    <label><input type="radio" name="max_participants" value="10"
                                            {{ request('max_participants') == '10' ? 'checked' : '' }}> Até 10</label>
                                    <label><input type="radio" name="max_participants" value="50"
                                            {{ request('max_participants') == '50' ? 'checked' : '' }}> Até 50</label>
                                    <label><input type="radio" name="max_participants" value="100"
                                            {{ request('max_participants') == '100' ? 'checked' : '' }}> Até 100</label>
                                </div>
                            </div>
                            <div>
                                <label class="block font-semibold mb-2">Tipo de evento</label>
                                <div class="flex flex-wrap gap-4">
                                    <label><input type="radio" name="is_public" value="1"
                                            {{ request('is_public') === '1' ? 'checked' : '' }}>
                                        Público</label>
                                    <label><input type="radio" name="is_public" value="0"
                                            {{ request('is_public') === '0' ? 'checked' : '' }}>
                                        Privado</label>
                                </div>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" id="closeFilterModal2"
                                    class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</button>
                                <button type="submit"
                                    class="px-4 py-2 bg-[#4439C5] text-white rounded hover:bg-[#362fa3]">
                                    Filtrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                @if (count($events) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($events as $event)
                            <div
                                class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                                <img src="{{ $event->image ? Storage::disk('public')->url($event->image) : 'https://picsum.photos/400.webp' }}"
                                    alt="Imagem do evento" class="w-full h-48 object-cover">
                                <div class="p-6 flex flex-col flex-1 justify-between">
                                    <div>
                                        <h2 class="text-xl font-semibold mb-2">{{ $event->title }}</h2>
                                        <p class="text-gray-600 mb-1 flex items-center">
                                            <x-heroicon-o-calendar-days class="w-5 h-5 mr-1 text-gray-400" />
                                            {{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d/m/Y') : 'Não informada' }}
                                        </p>
                                        <p class="text-gray-500 mb-1 flex items-center">
                                            <x-heroicon-o-users class="w-5 h-5 mr-1 text-blue-400" />
                                            Participantes: {{ $event->users ? $event->users->count() : 0 }}
                                        </p>
                                        <p class="text-gray-500 mb-2 flex items-center">
                                            @if ($event->is_public)
                                                <x-heroicon-o-eye class="w-5 h-5 mr-1 text-green-400" />
                                                Público: <span class="ml-1 text-green-600 font-semibold">Sim</span>
                                            @else
                                                <x-heroicon-o-eye-slash class="w-5 h-5 mr-1 text-red-400" />
                                                Público: <span class="ml-1 text-red-600 font-semibold">Não</span>
                                            @endif
                                        </p>
                                    </div>
                                    <a href="{{ route('events.show', $event->id) }}"
                                        class="inline-block mt-4 px-4 py-2 bg-[#4439C5] text-white text-center font-bold rounded shadow hover:bg-[#362fa3] transition">Ver
                                        detalhes</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-8 flex justify-center">
                        {{ $events->links('vendor.pagination.custom') }}
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center w-full py-16">
                        <x-heroicon-o-magnifying-glass class="w-16 h-16 text-gray-400 mb-4" />
                        <p class="text-lg text-gray-600 font-semibold text-center">
                            Não foi possível encontrar o evento <span
                                class="text-blue-700 font-bold">{{ request('search') }}</span>.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        const openBtn = document.getElementById('openFilterModal');
        const closeBtn = document.getElementById('closeFilterModal');
        const closeBtn2 = document.getElementById('closeFilterModal2');
        const modal = document.getElementById('filterModal');
        openBtn.addEventListener('click', () => modal.classList.remove('hidden'));
        closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
        closeBtn2.addEventListener('click', () => modal.classList.add('hidden'));
    </script>
</x-app-layout>
