<?php
namespace App\Loja;

class Usuario{
    private $nome;
    private $sobrenome;
    private $senha;

    public function __construct(string $nomeCompleto, string $senha)
    {
        $nomeSobrenome = $this->separaNomeSobrenome($nomeCompleto);
        $this->nome = $nomeSobrenome['nome'];
        $this->sobrenome = $nomeSobrenome['sobrenome'];
        $this->validaSenha($senha);
    }

    private function separaNomeSobrenome(string $nomeSobrenome)
    {
        [0=>$nome, 1=>$sobrenome] = explode(' ',$nomeSobrenome, limit:2);
        if($nome == null){
            $nome = 'Nome Inválido';
        }
        if($sobrenome == null){
            $sobrenome = 'Sobrenome Inválido';
        }
        return ['nome'=>$nome, 'sobrenome'=>$sobrenome];
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    private function validaSenha(string $senha)
    {
        $tamanhoSenha = strlen(trim($senha));
        if ($tamanhoSenha >= 6){
            $this->senha = $senha;
        } else {
            $this->senha = 'Senha Inválida';
        }
    }
}