<?php

namespace Geosoft\LavanderiaApp\repositorios ;

use Geosoft\LavanderiaApp\Modelos\Cliente;

interface ClienteRepositorioInterface
{
    public function adicionarCliente(Cliente $cliente): bool ;

}