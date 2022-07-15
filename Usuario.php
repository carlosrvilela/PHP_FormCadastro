<?php
namespace Loja;

function separaNomeSobrenome(string $nomeSobrenome)
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

class Usuario{
    private $nome;
    private $sobrenome;

    public function __construct(string $nomeCompleto)
    {
        $nomeSobrenome = separaNomeSobrenome($nomeCompleto);
        $this->nome = $nomeSobrenome['nome'];
        $this->sobrenome = $nomeSobrenome['sobrenome'];
    }


    public function getNome()
    {
        return $this->nome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

}