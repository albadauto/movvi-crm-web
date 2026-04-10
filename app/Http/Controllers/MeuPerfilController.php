<?php

namespace App\Http\Controllers;

use App\Services\EmpresasService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeuPerfilController extends Controller
{
    private EmpresasService $empresasService;
    function __construct(EmpresasService $empresasService)
    {
        $this->empresasService = $empresasService;
    }
    public function index(){
        $empresa = $this->empresasService->buscarEmpresaUsuario(Auth::id());
        return view('meuperfil/index', ['empresa' => $empresa]);
    }

    public function meuplano(){
        return view('meuperfil/planos');
    }

    public function trocarPlano(Request $request)
    {
        $user = auth()->user();
        $priceId = $request->price_id;

        if (!$user->subscribed('default')) {
            return redirect()->back()->with('error', 'Você não possui assinatura ativa.');
        }

        try {
            $user->subscription('default')->swap($priceId);

            return redirect()
                ->route('meuperfil.planos')
                ->with('success', 'Plano alterado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao trocar plano: ' . $e->getMessage());
        }
    }
}
