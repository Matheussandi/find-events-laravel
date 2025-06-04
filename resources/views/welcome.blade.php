<x-guest-layout>
    @auth
        <script>window.location = '{{ route('dashboard') }}';</script>
    @else
    <div class="container mx-auto flex flex-col items-center justify-center py-16">
        <h1 class="text-4xl font-extrabold text-[#4439C5] mb-4 text-center">Bem-vindo ao FIND EVENTS</h1>
        <h2 class="text-2xl font-semibold text-gray-800 mb-2 text-center">Sua plataforma completa de eventos</h2>
        <p class="text-lg text-gray-600 mb-6 text-center max-w-2xl">
            O FIND EVENT é uma plataforma onde você pode criar, editar e participar de eventos de outras pessoas. Gerencie seus próprios eventos, descubra novas oportunidades e conecte-se com outros participantes de forma simples e prática!
        </p>
        <ul class="mb-8 text-gray-700 text-center space-y-2">
            <li>✅ Descubra eventos incríveis e participe com um clique</li>
            <li>✅ Crie e edite seus próprios eventos</li>
            <li>✅ Participe de eventos criados por outras pessoas</li>
            <li>✅ Gerencie sua agenda de forma prática e visual</li>
        </ul>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('register') }}" class="px-8 py-3 bg-[#4439C5] text-white font-bold rounded shadow hover:bg-[#362fa3] transition">Cadastre-se grátis</a>
            <a href="{{ route('login') }}" class="px-8 py-3 bg-white border border-[#4439C5] text-[#4439C5] font-bold rounded shadow hover:bg-gray-100 transition">Já tenho conta</a>
        </div>
    </div>
    @endauth
</x-guest-layout>