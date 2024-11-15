<?php

namespace Geosoft\LavanderiaApp\Modelos ;

class Cliente 
{

    public ?string $cpf ;
    public ?string $nome ;
    public ?string $endereco ;
    public ?string $telefone ;
    public ?string $email ;
    public ?string $criado_em ;

    public function __construct($cpf = null, $nome = null, $endereco = null, $telefone = null , $email = null, $criado_em = null)
    {
        $this->cpf = $cpf ;
        $this->nome = $nome ;
        $this->endereco = $endereco ;
        $this->telefone = $telefone ;
        $this->email = $email ;
        $this->criado_em = $criado_em ;
    }
}
