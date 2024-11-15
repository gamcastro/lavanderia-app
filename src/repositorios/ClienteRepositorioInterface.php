<?php

namespace Geosoft\LavanderiaApp\repositorios ;

use Geosoft\LavanderiaApp\modelos\Cliente;

interface ClienteRepositorioInterface
{
    public function adicionarCliente(Cliente $cliente): bool ;
    public function deletarCliente(string $cpf) ;
    public function buscarCliente(string $cpf) ;
    public function atualizarCliente(Cliente $cliente) ;

}