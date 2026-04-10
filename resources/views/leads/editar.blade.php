@extends('dashboard')
@section('content')

    <div class="bg-gray-50 min-h-screen p-6">

        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md p-8">

            <h1 class="text-2xl font-bold text-gray-800 mb-6">
                Editar Lead
            </h1>

            @if($errors->any())
                <div class="p-2 bg-red-500 rounded-md text-white text-center mb-4">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>

            @endif

            <form action="{{ route('leads.atualizar', ['id' => $lead->leads_id]) }}" method="POST" class="space-y-6">
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
                           required value="{{ $lead->leads_nome }}">
                </div>

                <!-- CPF -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        CPF
                    </label>
                    <input type="text"
                           name="leads_cpf"
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           placeholder="000.000.000-00" value="{{ $lead->leads_cpf }}"
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
                           placeholder="email@exemplo.com" value="{{ $lead->leads_email }}"
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
                           placeholder="(11) 99999-9999" value="{{ $lead->leads_whatsapp }}"
                           required>
                </div>


                <!-- Próxima ação -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Próxima ação
                    </label>

                    <select
                        name="leads_prox_acao"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        <option value="">Selecione uma ação</option>

                        <option value="ligar"
                            {{ $lead->leads_prox_acao == 'ligar' ? 'selected' : '' }}>
                            📞 Ligar
                        </option>

                        <option value="whatsapp"
                            {{ $lead->leads_prox_acao == 'whatsapp' ? 'selected' : '' }}>
                            💬 Enviar WhatsApp
                        </option>

                        <option value="visita"
                            {{ $lead->leads_prox_acao == 'visita' ? 'selected' : '' }}>
                            🏢 Marcar visita
                        </option>

                        <option value="proposta"
                            {{ $lead->leads_prox_acao == 'proposta' ? 'selected' : '' }}>
                            📄 Enviar proposta
                        </option>

                        <option value="aguardar"
                            {{ $lead->leads_prox_acao == 'aguardar' ? 'selected' : '' }}>
                            ⏳ Aguardar proposta
                        </option>

                    </select>
                </div>


                <!-- Data e hora da próxima ação -->
                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Data da ação
                        </label>

                        <input
                            type="date"
                            name="leads_prox_acao_data"
                            value="{{ $lead->leads_prox_acao_data }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Hora
                        </label>

                        <input
                            type="time"
                            name="leads_prox_acao_hora"
                            value="{{ $lead->leads_prox_acao_hora }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                </div>


                <div class="flex flex-col justify-center items-center gap-3 pt-4">

                    <button type="submit"
                            class="w-full px-6 py-3 bg-[#050a30] hover:bg-[#0a145c] text-white font-semibold rounded-lg shadow">
                        Salvar Lead
                    </button>

                    <a href="{{ route('leads.deletar', ['id' => $lead->leads_id]) }}" class="w-full px-6 py-3 bg-red-500 hover:bg-red-800 text-white font-semibold rounded-lg shadow text-center">
                        Excluir Lead
                    </a>


                    <a href="{{ route('leads') }}"
                       class="w-full px-6 py-3 bg-gray-200 hover:bg-gray-300 rounded-lg text-center">
                        Cancelar
                    </a>

                </div>


            </form>

        </div>

    </div>

@endsection
