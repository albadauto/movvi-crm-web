@extends('dashboard')
@section('content')
    <div class="flex items-center justify-center">
        <div class="bg-gray-50 p-6 shadow-2xl rounded-2xl">

            <div class="col-span-2">
                <label class="text-sm text-gray-600">Nome da empresa</label>
                <input
                    type="text"
                    name="empresas_nome"
                    class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none"
                    placeholder="Nome da empresa" value="{{ $empresa->empresas_nome }}" readonly
                    required
                >
            </div>

            <div class="col-span-2">
                <label class="text-sm text-gray-600">CNPJ</label>
                <input
                    type="text"
                    name="empresas_cnpj"
                    class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none"
                    placeholder="00.000.000/0000-00" value="{{ $empresa->empresas_cnpj }}" readonly
                    required
                >
            </div>

            <div class="col-span-2">
                <label class="text-sm text-gray-600">Telefone</label>
                <input
                    type="text"
                    name="empresas_telefone" value="{{ $empresa->empresas_telefone }}" readonly
                    class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none"
                    placeholder="(00) 00000-0000"
                >
            </div>

            <div class="col-span-2">
                <label class="text-sm text-gray-600">Email</label>
                <input
                    type="email"
                    name="empresas_email" value="{{ $empresa->empresas_email }}" readonly
                    class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none"
                    placeholder="empresa@email.com"
                >
            </div>

            <div class="col-span-2">
                <label class="text-sm text-gray-600">Cidade</label>
                <input
                    type="text"
                    name="empresas_cidade" value="{{ $empresa->empresas_cidade }}" readonly
                    class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none"
                >
            </div>

            <div class="col-span-2">
                <label class="text-sm text-gray-600">Estado</label>
                <input
                    type="text"
                    name="empresas_estado" value="{{ $empresa->empresas_estado }}" readonly
                    class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none"
                    placeholder="SP"
                >
            </div>

            <div class="text-center mt-5">
                <a class="w-full mt-6 bg-[#050a30] hover:bg-gray-700
                text-white font-semibold py-3 rounded-lg transition
                 duration-300 shadow-lg hover:shadow-xl p-6" href="{{ route('meuperfil.planos') }}">
                    Alterar Plano</a>
            </div>
        </div>
    </div>
@endsection
