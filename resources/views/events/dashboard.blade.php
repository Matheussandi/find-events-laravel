<x-app-layout>
    @if (session('success') || session('error'))
        <div id="toast-feedback"
            class="fixed top-6 left-1/2 z-50 flex items-center px-5 py-3 rounded shadow-lg transition-opacity duration-500 transform -translate-x-1/2"
            style="min-width: 220px; max-width: 350px; opacity: 1; background: {{ session('success') ? '#22c55e' : '#ef4444' }}; color: white;">
            @if (session('success'))
                <x-heroicon-o-check-circle class="w-6 h-6 mr-2 text-white" />
            @else
                <x-heroicon-o-x-circle class="w-6 h-6 mr-2 text-white" />
            @endif
            <span class="font-medium">{{ session('success') ?? session('error') }}</span>
        </div>
        <script>
            setTimeout(() => {
                const toast = document.getElementById('toast-feedback');
                if (toast) {
                    toast.style.opacity = '0';
                    setTimeout(() => toast.remove(), 500);
                }
            }, 3000);
        </script>
    @endif

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-end mb-6">
                        <a href="{{ route('events.create') }}" class="group" title="Criar evento">
                            <x-heroicon-o-plus
                                class="w-7 h-7 text-[#4439C5] group-hover:text-[#362fa3] transition-colors" />
                            <span class="sr-only">Criar evento</span>
                        </a>
                    </div>

                    <h2 class="text-xl font-bold mb-4">Meus eventos</h2>
                    @if ($createdEvents->isEmpty())
                        <p class="text-gray-500 mb-8">Você ainda não criou nenhum evento.</p>
                    @else
                        <div class="overflow-x-auto mb-10">
                            <table class="min-w-full table-fixed divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/2">
                                            Título</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">
                                            Participantes</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">
                                            Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($createdEvents as $event)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('events.show', $event->id) }}"
                                                    class="text-blue-600 hover:underline">
                                                    {{ $event->title }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-gray-500">
                                                    {{ $event->users ? $event->users->count() : 0 }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('events.edit', $event->id) }}"
                                                    class="text-indigo-600 hover:text-indigo-900 mr-2">Editar</a>
                                                <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                                    class="inline delete-event-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="text-red-600 hover:text-red-900 delete-btn">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-gray-500 text-center py-4">Você ainda não
                                                criou nenhum evento.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <h2 class="text-xl font-bold mb-4">Eventos que participo</h2>
                    @if ($participatingEvents->isEmpty())
                        <p class="text-gray-500">Você ainda não está participando de nenhum evento.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-fixed divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/2">
                                            Título</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">
                                            Participantes</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">
                                            Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($participatingEvents as $event)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('events.show', $event->id) }}"
                                                    class="text-blue-600 hover:underline">
                                                    {{ $event->title }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-gray-500">
                                                    {{ $event->users ? $event->users->count() : 0 }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <form action="{{ route('events.leave', $event->id) }}" method="POST"
                                                    class="inline leave-event-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="text-red-600 hover:text-red-900 leave-btn">Sair</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-gray-500 text-center py-4">Você ainda não
                                                está participando de nenhum evento.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmação para excluir evento -->
    <div id="deleteModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-sm mx-auto">
            <h2 class="text-lg font-semibold mb-4">Confirmar exclusão</h2>
            <p class="mb-6">Tem certeza que deseja excluir este evento?</p>
            <div class="flex justify-end gap-2">
                <button id="cancelDelete" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</button>
                <button id="confirmDelete"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Excluir</button>
            </div>
        </div>
    </div>

    <!-- Modal de confirmação para sair do evento -->
    <div id="leaveModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-sm mx-auto">
            <h2 class="text-lg font-semibold mb-4">Confirmar saída</h2>
            <p class="mb-6">Tem certeza que deseja sair deste evento?</p>
            <div class="flex justify-end gap-2">
                <button id="cancelLeave" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</button>
                <button id="confirmLeave" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Sair</button>
            </div>
        </div>
    </div>

    <script>
        let formToSubmit = null;
        const deleteModal = document.getElementById('deleteModal');
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                formToSubmit = btn.closest('form');
                deleteModal.classList.remove('hidden');
                deleteModal.classList.add('flex');
            });
        });
        document.getElementById('cancelDelete').addEventListener('click', function() {
            deleteModal.classList.add('hidden');
            deleteModal.classList.remove('flex');
            formToSubmit = null;
        });
        document.getElementById('confirmDelete').addEventListener('click', function() {
            if (formToSubmit) {
                formToSubmit.submit();
            }
        });

        // Modal para sair do evento
        const leaveModal = document.getElementById('leaveModal');
        document.querySelectorAll('.leave-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                formToSubmit = btn.closest('form');
                leaveModal.classList.remove('hidden');
                leaveModal.classList.add('flex');
            });
        });
        document.getElementById('cancelLeave').addEventListener('click', function() {
            leaveModal.classList.add('hidden');
            leaveModal.classList.remove('flex');
            formToSubmit = null;
        });
        document.getElementById('confirmLeave').addEventListener('click', function() {
            if (formToSubmit) {
                formToSubmit.submit();
            }
        });
    </script>
</x-app-layout>
