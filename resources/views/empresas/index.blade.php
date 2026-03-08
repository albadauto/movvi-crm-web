@extends('template')

@section('content')
    <div class="flex items-center justify-center min-h-screen">

        <div class="bg-white/90 backdrop-blur-lg shadow-2xl rounded-2xl w-full max-w-2xl p-8">

            <div class="flex justify-center mb-6">
                <h1 class="text-2xl font-bold text-[#050a30]">Cadastrar Empresa</h1>
            </div>

            @if(session('erro'))
                <div class="p-2 bg-red-500 rounded-md text-white text-center mb-4">
                    {{ session('erro') }}
                </div>
            @endif

            <form method="POST" enctype="multipart/form-data" action="{{ route('empresas.criarempresa') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">

                    <!-- Nome -->
                    <div class="col-span-2">
                        <label class="text-sm text-gray-600">Nome da empresa</label>
                        <input
                            type="text"
                            name="empresas_nome"
                            class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none"
                            placeholder="Nome da empresa"
                            required
                        >
                    </div>

                    <!-- CNPJ -->
                    <div class="col-span-2">
                        <label class="text-sm text-gray-600">CNPJ</label>
                        <input
                            type="text"
                            name="empresas_cnpj"
                            class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none"
                            placeholder="00.000.000/0000-00"
                            required
                        >
                    </div>

                    <!-- Telefone -->
                    <div class="col-span-2">
                        <label class="text-sm text-gray-600">Telefone</label>
                        <input
                            type="text"
                            name="empresas_telefone"
                            class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none"
                            placeholder="(00) 00000-0000"
                        >
                    </div>

                    <!-- Email -->
                    <div class="col-span-2">
                        <label class="text-sm text-gray-600">Email</label>
                        <input
                            type="email"
                            name="empresas_email"
                            class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none"
                            placeholder="empresa@email.com"
                        >
                    </div>

                    <!-- Cidade -->
                    <div class="col-span-2">
                        <label class="text-sm text-gray-600">Cidade</label>
                        <input
                            type="text"
                            name="empresas_cidade"
                            class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none"
                        >
                    </div>

                    <!-- Estado -->
                    <div class="col-span-2">
                        <label class="text-sm text-gray-600">Estado</label>
                        <input
                            type="text"
                            name="empresas_estado"
                            class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none"
                            placeholder="SP"
                        >
                    </div>

                    <!-- Logo -->
                    <div class="col-span-2">
                        <label class="text-sm text-gray-600">Logo da empresa</label>
                        <input
                            type="file"
                            name="empresas_logo"
                            class="w-full mt-1 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none"
                        >
                    </div>

                </div>

                <button
                    type="submit"
                    class="w-full mt-6 bg-[#050a30] hover:bg-gray-700 text-white font-semibold py-3 rounded-lg transition duration-300"
                >
                    Cadastrar Empresa
                </button>

                <a
                    href="{{ route('dashboard') }}"
                    class="block w-full mt-3 text-center bg-gray-200 hover:bg-[#050a30] hover:text-white text-[#050a30] font-semibold py-3 rounded-lg transition duration-300"
                >
                    Cancelar
                </a>

            </form>

        </div>

    </div>
@endsection
