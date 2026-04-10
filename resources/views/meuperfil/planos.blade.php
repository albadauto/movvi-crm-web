@extends('template')
@section('content')
    <!-- Título -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800">
            Escolha seu Plano
        </h1>
        <p class="text-gray-500 mt-3">
            Comece no Movvi e evolua conforme precisar, simples assim!
        </p>
    </div>

    <!-- Planos -->
    <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">

        <!-- Plano Básico -->
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
            <h2 class="text-xl font-semibold">Free</h2>

            <p class="text-4xl font-bold mt-4">
                R$ 0,00
                <span class="text-sm text-gray-500">/mês</span>
            </p>

            <ul class="mt-6 space-y-3 text-gray-600">
                <li>✔ 1 Usuário</li>
                <li>✔ Até 10 Leads</li>
            </ul>
            <form action="{{ route('meuperfil.trocarPlano', ['price_id' => 'price_1T9QOmC6gzfmqJLeFuTN7DZg', 'plan_id' => 1]) }}" method="POST">
                @csrf
                <button class="mt-8 w-full bg-[#050a30] text-white py-3 rounded-lg hover:bg-gray-700 transition" type="submit">
                    Assinar
                </button>
            </form>

        </div>


        <!-- Plano Pro (Destaque) -->
        <div class="bg-[#050a30] text-white rounded-2xl shadow-2xl p-10 text-center scale-105">

            <span class="bg-white text-[#050a30] px-3 py-1 rounded-full text-sm font-semibold">
                Mais Popular
            </span>

            <h2 class="text-xl font-semibold mt-4">Pro</h2>

            <p class="text-5xl font-bold mt-4">
                R$29,90
                <span class="text-sm opacity-80">/mês</span>
            </p>

            <ul class="mt-6 space-y-3">
                <li>✔ 1 Usuário</li>
                <li>✔ Até 100 leads</li>
                <li>✔ Suporte prioritário</li>
            </ul>
            <form action="{{ route('meuperfil.trocarPlano', ['price_id' => 'price_1T9QSIC6gzfmqJLe40d9d40h', 'plan_id' => 2]) }}" method="POST">
                @csrf
                <button class="mt-8 w-full bg-white text-[#050a30] py-3 rounded-lg font-semibold hover:bg-gray-100 transition" type="submit">
                    Assinar Agora
                </button>
            </form>
        </div>


        <!-- Plano Premium -->
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
            <h2 class="text-xl font-semibold">Imobiliária</h2>

            <p class="text-4xl font-bold mt-4">
                R$69,90
                <span class="text-sm text-gray-500">/mês</span>
            </p>

            <ul class="mt-6 space-y-3 text-gray-600">
                <li>✔ 1 usuários</li>
                <li>✔ Leads ilimitados</li>
                <li>✔ Suporte prioritário</li>
            </ul>
            <form action="{{ route('meuperfil.trocarPlano', ['price_id' => 'price_1T9n9UC6gzfmqJLe3nokFzWy', 'plan_id' => 3]) }}" method="POST">
                @csrf
                <button class="mt-8 w-full bg-[#050a30] text-white py-3 rounded-lg hover:bg-gray-700 transition" type="submit">
                    Assinar
                </button>
            </form>
        </div>

    </div>
@endsection
