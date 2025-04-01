<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\ListaCompra;
use PHPUnit\Framework\TestCase;

class ListaCompraTest extends TestCase
{
    /**
     * @test
     */
    public function givenStringAñadirPanReturnsListWithPan(){
        $listaCompra = new listaCompra();
        $result = $listaCompra->execute("añadir pan");
        $this->assertEquals("Pan x1", $result);
    }
}
