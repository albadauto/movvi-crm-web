@extends('template')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <!-- Card Login -->
        <div class="bg-white/90 backdrop-blur-lg shadow-2xl rounded-2xl w-full max-w-md p-8 ">
            <!-- Logo / Título -->
            <div class="text-center mb-8 flex items-center justify-center">
                <img src="{{ asset('img/logo.png') }}" width="200"/>
            </div>
            <p class="text-gray-500 mt-2 text-center">Acesse sua conta</p>
            @if(session('sucesso_registro'))
                <div class="p-2 bg-green-500 rounded-md text-white flex justify-center items-center mb-3">
                    <p>{{ session('sucesso_registro') }} </p>
                </div>
            @endif
            @if(session('erro_login'))
                <div class="p-2 bg-red-500 rounded-md text-white flex justify-center items-center mb-3">
                    <p>{{ session('erro_login') }} </p>
                </div>
            @endif
            <!-- Form -->
            <form class="space-y-5" method="post" action="{{ route('usuario.login') }}">
                @csrf
                <!-- Email -->
                <div>
                    <label class="text-sm font-medium text-gray-600">E-mail</label>
                    <input
                        type="email"
                        placeholder="seu@email.com" name="email"
                        class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none transition"
                    />
                </div>

                <!-- Senha -->
                <div>
                    <label class="text-sm font-medium text-gray-600">Senha</label>
                    <input
                        type="password" name="password"
                        placeholder="••••••••"
                        class="w-full mt-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#050a30] focus:outline-none transition"
                    />
                </div>

                <!-- Opções -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" class="rounded text-black">
                        <span class="text-gray-600">Lembrar-me</span>
                    </label>

                    <a href="{{ route('esquecisenha') }}" class="text-[#050a30] hover:underline">
                        Esqueceu a senha?
                    </a>
                </div>

                <!-- Botão -->
                <button
                    class="w-full bg-[#050a30] hover:bg-gray-700 text-white font-semibold py-3 rounded-lg transition duration-300 shadow-lg hover:shadow-xl"
                    type="submit">
                    Entrar
                </button>

            </form>

            <!-- Divider -->
            <div class="my-6 flex items-center">
                <div class="flex-grow h-px bg-gray-200"></div>
                <span class="px-3 text-gray-400 text-sm">ou</span>
                <div class="flex-grow h-px bg-gray-200"></div>
            </div>

            <!-- Criar conta -->
            <p class="text-center text-sm text-gray-600">
                Não tem conta?
                <a href="{{ route('usuario.registro') }}" class="text-[#050a30] font-medium hover:underline">
                    Criar agora
                </a>
            </p>
        </div>

    </div>

@endsection
