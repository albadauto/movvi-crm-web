@extends('dashboard')

@section('content')

    <div class="bg-gray-50 min-h-screen p-6">

        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md p-8">

            <h1 class="text-2xl font-bold text-gray-800 mb-6">
                Cadastro de Lead
            </h1>

            @if($errors->any())
                <div class="p-2 bg-red-500 rounded-md text-white text-center mb-4">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>

            @endif

            <form action="{{ route('leads.cadastrarlead') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Nome -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nome
                    </label>
                    <input type="text"
                           name="leads_nome"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           placeholder="Digite o nome do lead"
                           required>
                </div>

                <!-- CPF -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        CPF
                    </label>
                    <input type="text"
                           name="leads_cpf"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           placeholder="000.000.000-00"
                           required>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>
                    <input type="email"
                           name="leads_email"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           placeholder="email@exemplo.com"
                           required>
                </div>

                <!-- WhatsApp -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        WhatsApp
                    </label>
                    <input type="text"
                           name="leads_whatsapp"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           placeholder="(11) 99999-9999"
                           required>
                </div>


                <!-- Botões -->
                <div class="flex justify-end gap-3 pt-4">

                    <a href="{{ route('leads') }}"
                       class="px-6 py-3 bg-gray-200 hover:bg-gray-300 rounded-lg">
                        Cancelar
                    </a>

                    <button type="submit"
                            class="px-6 py-3 bg-[#050a30] hover:bg-[#0a145c] text-white font-semibold rounded-lg shadow">
                        Salvar Lead
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection
