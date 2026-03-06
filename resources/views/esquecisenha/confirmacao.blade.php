@extends('template')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <!-- Card Login -->
        <div class="bg-white/90 backdrop-blur-lg shadow-2xl rounded-2xl w-full max-w-lg p-8 ">
            <div class="flex items-center justify-center">
                <h1 class="text-2xl font-bold text-[#050a30] ">Nova senha</h1>
            </div>
            <div class="flex items-center justify-center mb-5">
                <p class="text-gray-600 ">Digite o código enviado no e-mail e logo em seguida, a nova senha</p>
            </div>
            <form method="post" action="{{ route('usuario.atualizarsenha') }}">
                @csrf
                <input
                    type="text"
                    placeholder="Código enviado no e-mail"
                    name="codigo"
                    class="w-full mt-3 px-4 py-3 pr-12 rounded-lg border border-gray-300
                             focus:ring-2 focus:ring-[#050a30] focus:outline-none transition"
                />
                 <input type="hidden" value="{{ $email }}" name="email"/>
                <input
                    type="password"
                    placeholder="Nova senha"
                    name="senha"
                    class="w-full mt-3 px-4 py-3 pr-12 rounded-lg border border-gray-300
                             focus:ring-2 focus:ring-[#050a30] focus:outline-none transition"
                />
                <button
                    class="w-full mt-3 bg-[#050a30] hover:bg-gray-700 text-white font-semibold py-3 rounded-lg transition duration-300 shadow-lg hover:shadow-xl"
                    type="submit">
                    Enviar
                </button>
            </form>


        </div>
    </div>
@endsection
