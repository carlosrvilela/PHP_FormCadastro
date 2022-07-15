<?php
namespace Loja;

class Contato
{
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getNomeUsuario()
    {
        $nomeUsuario = substr($this->email, 0, strpos($this->email, '@'));
        if ($nomeUsuario == null){
            $nomeUsuario = "Usuário Inválido";
        }
        return $nomeUsuario;
    }
}