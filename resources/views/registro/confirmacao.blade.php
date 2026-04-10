@extends('template')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">

        <div class="bg-white shadow-xl rounded-2xl p-10 max-w-md w-full text-center">

            <!-- Ícone -->
            <div class="flex justify-center mb-6">
                <div class="bg-green-100 rounded-full p-4">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-12 w-12 text-green-600"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>

            <!-- Título -->
            <h1 class="text-2xl font-bold text-gray-800 mb-3">
                Pagamento confirmado!
            </h1>

            <!-- Texto -->
            <p class="text-gray-600 mb-6">
                Seu pagamento foi realizado com sucesso.
                Em breve você receberá mais informações no seu e-mail.
            </p>

            <!-- Botão -->
            <a href="{{ route('empresas') }}"
               class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg transition">
                Voltar para o site
            </a>

        </div>

    </div>
@endsection
