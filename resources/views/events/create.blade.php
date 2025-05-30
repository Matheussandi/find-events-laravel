@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')
    <div class="container">
        
        @if($errors->any())
            <div id="notification-error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-center fixed top-6 left-1/2 transform -translate-x-1/2 z-50 shadow-lg transition-opacity duration-500">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <script>
                setTimeout(() => {
                    const notif = document.getElementById('notification-error');
                    if (notif) {
                        notif.style.opacity = '0';
                        setTimeout(() => notif.remove(), 500);
                    }
                }, 3000);
            </script>
        @endif

        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded shadow max-w-lg mx-auto mt-8">
            <h1 class="text-2xl font-bold mb-4">Criar evento</h1>
            @csrf
            <div>
                <label for="title" class="block font-semibold">Título</label>
                <input type="text" name="title" id="title" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label for="date" class="block font-semibold">Data</label>
                <input type="date" name="date" id="date" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label for="is_public" class="block font-semibold">É público?</label>
                <select name="is_public" id="is_public" class="w-full border rounded p-2">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <div>
                <label for="organizer" class="block font-semibold">Organizador</label>
                <input type="text" name="organizer" id="organizer" class="w-full border rounded p-2">
            </div>
            <div>
                <label for="image" class="block font-semibold">Imagem do evento</label>
                <input type="file" name="image" id="image" class="w-full border rounded p-2" accept="image/*" onchange="previewImage(event)">
                <div id="image-preview" class="mt-2"></div>
            </div>
            <div>
                <label for="location" class="block font-semibold">Localização</label>
                <input type="text" name="location" id="location" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block font-semibold mb-2">Itens do evento</label>
                <div class="flex flex-wrap gap-4">
                    <label><input type="checkbox" name="items[]" value="Cadeira"> Cadeira</label>
                    <label><input type="checkbox" name="items[]" value="Mesa"> Mesa</label>
                    <label><input type="checkbox" name="items[]" value="Projetor"> Projetor</label>
                    <label><input type="checkbox" name="items[]" value="Microfone"> Microfone</label>
                    <label><input type="checkbox" name="items[]" value="Água"> Água</label>
                    <label><input type="checkbox" name="items[]" value="Coffee Break"> Coffee Break</label>
                </div>
            </div>
            <script>
                function previewImage(event) {
                    const preview = document.getElementById('image-preview');
                    preview.innerHTML = '';
                    const file = event.target.files[0];
                    if (file) {
                        const img = document.createElement('img');
                        img.src = URL.createObjectURL(file);
                        img.className = 'max-h-48 rounded shadow border mt-2';
                        img.onload = () => URL.revokeObjectURL(img.src);
                        preview.appendChild(img);
                    }
                }
            </script>
            
            <div class="space-y-4">
                <button type="submit" class="bg-[#4439C5] w-full text-white px-4 py-2 rounded font-bold hover:bg-[#362fa3]">Criar</button>
                <a href="{{ route('events.index') }}" class="block text-center text-blue-600 hover:underline">Voltar para eventos</a>
            </div>

        </form>
    </div>
@endsection