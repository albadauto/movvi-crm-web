@extends('template')
@section('content')
    <div class="flex justify-center items-center mih-h-screen">

        <div class="bg-white/90 backdrop-blur-lg shadow-2xl rounded-2xl w-full max-w-md p-8">
            <div class="flex justify-center">
                <h1 class="text-2xl text-[#050a30] font-bold">Registro de Usuário</h1>
            </div>
            <div class="flex items-center justify-center">
                <p class="text-gray-500 ">Garanta seu acesso ao melhor CRM imobilIário</p>
            </div>
            @if($errors->any())
                <div class="p-2 bg-red-300 rounded-md text-white ">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{ route('usuario.criarusuario') }}">
                @csrf
                <input
                    type="text"
                    placeholder="Nome" name="nome"
                    class="w-full px-4 py-3 mb-4 mt-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none transition"
                />
                <input
                    type="email"
                    placeholder="Email" name="email"
                    class="w-full mt-1 px-4 py-3 mb-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none transition"
                />

                <input
                    type="password"
                    placeholder="Senha" name="senha" id="senha_original"
                    class="w-full mt-1 px-4 py-3 mb-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none transition"
                />

                <input
                    type="password"
                    placeholder="Repita a senha" id="repita_senha"
                    class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none transition"
                />

                <button id="btnPlanos"
                    class="w-full mt-6 bg-[#050a30] hover:bg-gray-700 text-white font-semibold py-3 rounded-lg transition duration-300 shadow-lg hover:shadow-xl">
                    Criar usuário
                </button>

                <a
                    href="{{ route('login') }}"
                    class="block w-full mt-4 text-center bg-gray-200 hover:bg-[#050a30] hover:text-white text-[#050a30] font-semibold py-3 rounded-lg transition duration-300">
                    Voltar
                </a>
            </form>
            <script src="{{ asset('js/registro/registro_usuario.js') }}"></script>
        </div>
    </div>
@endsection
