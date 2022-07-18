<?php
namespace App\Loja;

class Usuario{
    private $nome;
    private $sobrenome;
    private $senha;
    private $tratamento;

    public function __construct(string $nomeCompleto, string $senha, string $genero)
    {
        $nomeSobrenome = $this->separaNomeSobrenome($nomeCompleto);
        $this->nome = $nomeSobrenome['nome'];
        $this->sobrenome = $nomeSobrenome['sobrenome'];
        $this->validaSenha($senha);
        $this->addTratamento($nomeCompleto, $genero);
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

    private function addTratamento($nomeCompleto, $genero)
    {
        if ($genero === 'M') {
            $this->tratamento = preg_replace('/^(\w+)\b/', 'Sr.', $nomeCompleto, 1);
        }
    
        if ($genero === 'F') {
            $this->tratamento = preg_replace('/^(\w+)\b/', 'Srª.', $nomeCompleto, 1);
        }
    }

    public function getTratamento(): string
    {
        return $this->tratamento;
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