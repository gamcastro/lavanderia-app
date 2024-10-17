<?php

namespace Geosoft\LavanderiaApp\Repositorio ;

use Geosoft\LavanderiaApp\Modelo\Cliente;

interface ClienteRepositorioInterface
{
    public function adicionarCliente(Cliente $cliente): bool ;

}