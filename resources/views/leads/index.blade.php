@extends('dashboard')

@section('content')

    <div class="bg-gray-50 min-h-screen p-6">

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-2xl font-bold text-gray-800">
                Funil de Leads
            </h1>

            <a href="{{ route('leads.cadastro') }}"
               class="px-6 py-3 bg-[#050a30] hover:bg-[#0a145c] text-white font-semibold rounded-lg shadow-lg transition">
                + Novo Lead
            </a>

        </div>


        <div class="flex gap-6 overflow-x-auto pb-6">

            @foreach($acoes as $acao)

                <div class="w-80 bg-white rounded-xl shadow-md flex-shrink-0"
                     onclick="window.location.href = '{{ route('login') }}'">
                    <!-- Header da coluna -->
                    <div class="flex justify-between items-center p-4 border-b">
                        <h2 class="font-semibold text-gray-700">
                            {{ $acao->acoes_titulo }}
                        </h2>

                        <span class="count bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded">
                            {{ $acao->leads->count() }}
                        </span>
                    </div>

                    <div class="kanban-col p-4 space-y-3 min-h-[300px]" data-stage="{{ $acao->acoes_id }}">

                        @foreach($leads->where('leads_acoes_id', $acao->acoes_id) as $lead)

                            <div
                                class="card bg-white border-l-4 border-blue-500 p-4 rounded-lg shadow-sm hover:shadow-md cursor-move transition"
                                data-id="{{ $lead->leads_id }}">

                                <h3 class="font-semibold text-gray-800">
                                    {{ $lead->leads_nome }}
                                </h3>

                                <p class="text-sm text-gray-500">
                                    {{ $lead->leads_email }}
                                </p>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endforeach

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="{{ asset('js/leads/script.js') }}"></script>

@endsection
