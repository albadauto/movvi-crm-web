@extends('template')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <!-- Card Login -->
        <div class="bg-white/90 backdrop-blur-lg shadow-2xl rounded-2xl w-full max-w-lg p-8 ">
            <div class="flex items-center justify-center">
                <h1 class="text-2xl font-bold text-[#050a30] ">Esqueci a senha</h1>
            </div>
            <div class="flex items-center justify-center mb-5">
                <p class="text-gray-600 ">Digite o e-mail cadastrado</p>
            </div>
            @if(session('erro_email_esquecisenha'))
                <div class="p-2 bg-red-500 rounded-md text-white flex justify-center items-center mb-3">
                    <p>{{ session('erro_email_esquecisenha') }} </p>
                </div>
            @endif
            @error('email')
            <span
                class="p-2 bg-red-500 rounded-md text-white flex justify-center items-center mb-3">{{ $message }}</span>
            @enderror
            <form action="{{ route('esquecisenha.enviaremail') }}" method="post">
                @csrf
                    <div class="relative w-full">
                        <input
                            type="email"
                            placeholder="seu@email.com"
                            name="email"
                            class="w-full mt-1 px-4 py-3 pr-12 rounded-lg border border-gray-300
                             focus:ring-2 focus:ring-[#050a30] focus:outline-none transition"
                        />
                        <button
                            type="submit"
                            class="absolute right-2 top-1/2 -translate-y-1/2
                        bg-[#050a30] hover:bg-gray-700 text-white p-2
                        rounded-lg transition duration-300 shadow-lg hover:shadow-xl"
                                            title="Enviar código"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                 class="size-5">
                                <path
                                    d="M3.105 2.288a.75.75 0 0 0-.826.95l1.414 4.926A1.5 1.5 0 0 0 5.135 9.25h6.115a.75.75 0 0 1 0 1.5H5.135a1.5 1.5 0 0 0-1.442 1.086l-1.414 4.926a.75.75 0 0 0 .826.95 28.897 28.897 0 0 0 15.293-7.155.75.75 0 0 0 0-1.114A28.897 28.897 0 0 0 3.105 2.288Z"/>
                            </svg>
                        </button>
                    </div>
                <a
                    href="{{ route('login') }}"
                    class="block w-full mt-4 text-center bg-gray-200 hover:bg-[#050a30] hover:text-white text-[#050a30] font-semibold py-3 rounded-lg transition duration-300">
                    Voltar
                </a>
            </form>

        </div>
    </div>
@endsection
