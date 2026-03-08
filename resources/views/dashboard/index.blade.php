@extends('dashboard')

@section('content')
    @if(session('sucesso_criar_empresa'))
        <div class="p-2 bg-green-500 rounded-md text-white flex justify-center items-center mb-3">
            <p>{{ session('sucesso_criar_empresa') }} </p>
        </div>
    @endif
    <div class="flex justify-center items-center mb-5">
        <img src="{{ asset('storage/'.$empresaUsuario->empresas_logo) }}" width="200">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white/90 backdrop-blur-lg shadow-xl rounded-2xl p-6">
            <div class="flex flex-col items-center justify-center">
                <h2 class="text-gray-500 text-sm">Leads Hoje</h2>
                <span class="text-3xl font-bold mt-2">
                {{ $leadsToday ?? 0 }}
            </span>
            </div>
        </div>

        <div class="bg-white/90 backdrop-blur-lg shadow-xl rounded-2xl p-6">
            <div class="flex flex-col items-center justify-center">
                <h2 class="text-gray-500 text-sm">Leads da Semana</h2>
                <span class="text-3xl font-bold mt-2">
                {{ $leadsWeek ?? 0 }}
            </span>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">

        <div class="bg-white/90 backdrop-blur-lg shadow-xl rounded-2xl p-6">
            <div class="flex flex-col items-center justify-center">
                <h2 class="text-gray-500 text-sm">Leads Em Contato</h2>
                <span class="text-3xl font-bold mt-2">
                {{ $leadsToday ?? 0 }}
            </span>
            </div>
        </div>

        <div class="bg-white/90 backdrop-blur-lg shadow-xl rounded-2xl p-6">
            <div class="flex flex-col items-center justify-center">
                <h2 class="text-gray-500 text-sm">Fechados</h2>
                <span class="text-3xl font-bold mt-2">
                {{ $leadsWeek ?? 0 }}
            </span>
            </div>
        </div>

    </div>
@endsection
