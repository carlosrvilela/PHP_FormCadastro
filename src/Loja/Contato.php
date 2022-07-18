<?php
namespace App\Loja;

class Contato
{
    private $email;
    private $endereco;
    private $cep;
    private $telefone;

    public function __construct(string $email, string $endereco, string $cep, string $telefone)
    {
        if ($this->validaEmail($email) !== false) {
            $this->setEmail($email);
        } else {
            $this->setEmail('Email Inválido');
        }

        $this->endereco = $endereco;
        $this->cep = $cep;
        $this->validaTelefone($telefone);
        
        
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

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    private function validaTelefone(string $telefone)
    {
        $validacao = preg_match('/^([0-9]{2,3})?([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $telefone, $matches);
        if($matches[1] == ''){
            $codigo_pais = '55';
        } else {
            $codigo_pais = $matches[1];
        }
        $ddd = $matches[2];
        $fone_par1 = $matches[3];
        $fone_par2 = $matches[4];
        if($validacao != false){
            $this->telefone = "+$codigo_pais($ddd)$fone_par1-$fone_par2";
        } else {
            $this->telefone = 'Telefone Inválido';
        }
        
        
    }
}