<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\ListaCompra;
use PHPUnit\Framework\TestCase;

class ListaCompraTest extends TestCase
{
    /**
     * @test
     */
    public function givenStringAñadirPanReturnsListWithPan() : void{
        $listaCompra = new listaCompra();
        $result = $listaCompra->execute("añadir pan");
        $this->assertEquals("pan x1", $result);
    }

    /**
     * @test
     */
    public function givenStringAñadirPan2ReturnsListWithPanx2() : void{
        $listaCompra = new listaCompra();
        $result = $listaCompra->execute("añadir pan 2");
        $this->assertEquals("pan x2", $result);
    }
}
