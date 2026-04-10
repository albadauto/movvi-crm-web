@extends('dashboard')

@section('content')

    <div class="bg-gradient-to-br from-gray-100 via-gray-50 to-gray-200 p-8 shadow-2xl rounded-2xl">

        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Funil de Leads
                </h1>

                <p class="text-gray-500 text-sm">
                    Gerencie e acompanhe o progresso dos seus leads
                </p>
            </div>

            <a href="{{ route('leads.cadastro') }}"
               class="px-6 py-3 bg-[#050a30] from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 text-white font-semibold rounded-xl shadow-lg transition transform hover:scale-105">

                + Novo Lead
            </a>

        </div>
        <div>
            @if($leads->where('leads_critico', 1)->count() > 0)
                <div class="bg-yellow-100 p-2 rounded-md rounded mb-3">
                    Existem leads que estão parados a 3 dias ou mais e necessitam de uma ação!
                </div>
            @endif

            @if($leads->where('leads_prox_acao', null)->where('leads_acoes_id', '!=', 4)->count() > 0)
                <div class="bg-red-100 p-2 rounded-md rounded mb-3">
                    Existem leads que não possuem uma próxima ação definida!
                </div>
            @endif

            @if(session('error_leads'))
                <div class="bg-yellow-100 p-2 rounded-md rounded mb-3">
                    {{ session('error_leads') }}
                </div>
            @endif
        </div>


        <!-- KANBAN -->
        <div class="flex gap-6 overflow-x-auto pb-6">

            @foreach($acoes as $acao)

                <div class="w-80 flex-shrink-0">

                    <!-- COLUNA -->
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">

                        <!-- HEADER COLUNA -->
                        <div class="flex justify-between items-center px-5 py-4 bg-gray-50 border-b">

                            <h2 class="font-semibold text-gray-700 text-sm tracking-wide uppercase">
                                {{ $acao->acoes_titulo }}
                            </h2>

                            <span class="count bg-indigo-100 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full">
                        {{ $acao->leads->count() }}
                    </span>

                        </div>

                        <div class="kanban-col p-4 space-y-4 min-h-[400px]"
                             data-stage="{{ $acao->acoes_id }}">

                            @foreach($leads->where('leads_acoes_id', $acao->acoes_id) as $lead)
                                @php
                                    $bgColor = "white";
                                    if($lead->leads_critico){
                                        $bgColor = "yellow-100";
                                    }
                                    if (($lead->leads_prox_acao == null || $lead->leads_prox_acao == "") && $lead->leads_acoes_id != 4){
                                        $bgColor = "red-100";
                                    }
                                @endphp
                                <div
                                    class="card bg-{{ $bgColor }} border border-gray-200 p-4 rounded-xl shadow-sm hover:shadow-lg cursor-move transition duration-200 hover:-translate-y-1"
                                    data-id="{{ $lead->leads_id }}"
                                    onclick="window.location.href = '{{ route('leads.editar', ['id' => $lead->leads_id]) }}'">

                                    <!-- Avatar + Nome -->
                                    <div class="flex items-center gap-3 mb-2">

                                        <div
                                            class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold text-sm">

                                            {{ strtoupper(substr($lead->leads_nome,0,1)) }}
                                        </div>
                                        <div>

                                            <h3 class="font-semibold text-gray-800 text-sm">
                                                {{ $lead->leads_nome }}
                                            </h3>

                                            <p class="text-xs text-gray-400">
                                                Lead
                                            </p>

                                        </div>

                                    </div>

                                    <!-- EMAIL -->
                                    <p class="text-sm text-gray-500 truncate mb-1">
                                        {{ $lead->leads_email }}
                                    </p>
                                    <hr>
                                    @if(($lead->leads_prox_acao != null || $lead->leads_prox_acao != "") && $lead->leads_acoes_id != 4)
                                        <p class="text-sm text-gray-500 truncate mt-1 text-center">
                                            Próxima ação:
                                        </p>
                                        <!-- EMAIL -->
                                        <p class="text-sm text-gray-500 truncate mt-1 font-bold text-center">
                                            {{ucfirst($lead->leads_prox_acao)}} {{ \Carbon\Carbon::parse($lead->leads_prox_acao_data)->format('d/m/Y') }}
                                            ás {{ $lead->leads_prox_acao_hora }}
                                        </p>
                                    @endif


                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="{{ asset('js/leads/script.js') }}"></script>

@endsection
