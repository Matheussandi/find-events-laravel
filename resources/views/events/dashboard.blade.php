<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-end mb-6">
                        <a href="{{ route('events.create') }}"
                            class="inline-block px-4 py-2 bg-[#4439C5] text-white font-bold rounded shadow hover:bg-[#362fa3] transition">
                            Criar evento
                        </a>
                    </div>
                    @if ($events->isEmpty())
                        <p class="text-gray-500">Você ainda não criou nenhum evento.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Título
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Participantes
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($events as $event)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('events.show', $event->id) }}"
                                                    class="text-blue-600 hover:underline">
                                                    {{ $event->title }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-gray-500">0</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('events.edit', $event->id) }}"
                                                    class="text-indigo-600 hover:text-indigo-900 mr-2">Editar
                                                </a>
                                                <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                                    class="inline delete-event-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="text-red-600 hover:text-red-900 delete-btn">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmação -->
    <div id="deleteModal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-sm mx-auto">
            <h2 class="text-lg font-semibold mb-4">Confirmar exclusão</h2>
            <p class="mb-6">Tem certeza que deseja excluir este evento?</p>
            <div class="flex justify-end gap-2">
                <button id="cancelDelete" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</button>
                <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Excluir
                </button>
            </div>
        </div>
    </div>

    <script>
        let formToSubmit = null;
        const modal = document.getElementById('deleteModal');
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function (e) {
                formToSubmit = btn.closest('form');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });
        document.getElementById('cancelDelete').addEventListener('click', function () {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            formToSubmit = null;
        });
        document.getElementById('confirmDelete').addEventListener('click', function () {
            if (formToSubmit) {
                formToSubmit.submit();
            }
        });
    </script>
</x-app-layout>
