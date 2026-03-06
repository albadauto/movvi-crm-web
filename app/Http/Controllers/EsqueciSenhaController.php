<?php

namespace App\Http\Controllers;

use App\Services\EsqueciSenhaService;
use App\Services\UsuarioService;
use Illuminate\Http\Request;

class EsqueciSenhaController extends Controller
{
    private readonly EsqueciSenhaService $esqueciSenhaService;
    private readonly UsuarioService $usuarioService;
    public function __construct(EsqueciSenhaService $esqueciSenhaService, UsuarioService $usuarioService)
    {
        $this->esqueciSenhaService = $esqueciSenhaService;
        $this->usuarioService = $usuarioService;
    }
    public function index(){
        return view('esquecisenha/index');
    }

    public function confirmacao(Request $request){
        return view('esquecisenha/confirmacao', ['email' => $request->session()->get('email')]);
    }

    public function enviarEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ], [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.'
        ]);

        $email = $request->email;

        $usuarioExiste = $this->usuarioService->buscaUsuarioEmail($email);

        if ($usuarioExiste) {
            $this->esqueciSenhaService->enviaCodigoEmail($email);
            return redirect()->route('esquecisenha.confirmacao')->with('email', $email);
        } else {
            return redirect()->route('esqueciSenha')
                ->with('erro_email_esquecisenha', 'Usuário inexistente no sistema');
        }
    }
}
