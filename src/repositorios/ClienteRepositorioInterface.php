<?php

namespace Geosoft\LavanderiaApp\repositorios ;

use Geosoft\LavanderiaApp\modelos\Cliente;

interface ClienteRepositorioInterface
{
    public function adicionarCliente(Cliente $cliente): bool ;

}