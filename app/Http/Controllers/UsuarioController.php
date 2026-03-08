<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtualizacaoSenhaRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Services\EmpresasService;
use App\Services\EsqueciSenhaService;
use App\Services\HistoricoService;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    private UsuarioService $usuarioService;
    private HistoricoService $historicoService;
    private EsqueciSenhaService $esqueciSenhaService;
    private EmpresasService $empresasService;
    public function __construct(UsuarioService $usuarioService,
                                HistoricoService $historicoService,
                                EsqueciSenhaService $esqueciSenhaService,
                                EmpresasService $empresasService)
    {
        $this->usuarioService = $usuarioService;
        $this->historicoService = $historicoService;
        $this->esqueciSenhaService = $esqueciSenhaService;
        $this->empresasService = $empresasService;
    }

    public function login(LoginRequest $request){
        $logado = $this->usuarioService->LogarUsuario($request);
        if($logado){
            $usuario = $request->user();
            $usuarioPremium = $this->historicoService->usuarioPremium($usuario->id);
            if($usuarioPremium){
                $usuarioEmpresa = $this->empresasService->buscarEmpresaUsuario($usuario->id);
                if($usuarioEmpresa){
                    return redirect()->route('dashboard');
                }else{
                    return redirect()->route('empresas');
                }
            }

            return redirect()->route('usuario.registro.planos');
        }else{
            return redirect()->route('login')->with('erro_login', 'Login ou senha incorreto(s)');
        }
    }

    public function registro(){
        return view('registro/index');
    }

    public function planos(){
        return view('registro/planos');
    }

    public function criarUsuario(CreateUserRequest $request){
        $usuario = $this->usuarioService->criarUsuario($request);
        $this->historicoService->criarHistorico($usuario->id, null, 1);
        return redirect()->route('login')
            ->with('sucesso_registro', 'Usuário cadastrado com sucesso! Faça o login');
    }

    public function atualizarSenha(AtualizacaoSenhaRequest $request){
        $email = $request->email;
        $otp = $this->esqueciSenhaService->verificaOtp($email, $request->codigo);
        if($otp){
            $this->usuarioService->atualizarSenha($email, $request->senha);
            return redirect()->route('login')->with('sucesso_registro', 'Sua senha foi atualizada com sucesso!');
        }
        return redirect()->route('login')->with('erro_login', 'Código incorreto ou inexistente');

    }
}
