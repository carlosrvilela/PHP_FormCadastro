<?php
namespace App\Loja;

class Contato
{
    private $email;
    private $endereco;
    private $cep;

    public function __construct(string $email, string $endereco, string $cep)
    {
        if ($this->validaEmail($email) !== false) {
            $this->setEmail($email);
        } else {
            $this->setEmail('Email Inválido');
        }

        $this->endereco = $endereco;
        $this->cep = $cep;
        
    }

    public function getNomeUsuario(): string
    {
        $nomeUsuario = substr($this->email, 0, strpos($this->email, '@'));
        if ($nomeUsuario == null){
            $nomeUsuario = "Usuário Inválido";
        }
        return $nomeUsuario;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    private function validaEmail(string $email)
    {
        return (filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    public function getEnderecoCep(): string
    {
        $enderecoCep = [$this->endereco, $this->cep];
        return implode(" - ", $enderecoCep);
    }
}