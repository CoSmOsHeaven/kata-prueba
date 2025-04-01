<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\ListaCompra;
use PHPUnit\Framework\TestCase;

class ListaCompraTest extends TestCase
{
    /**
     * @test
     */
    public function givenStringAñadirPanReturnsStringWithPan() : void{
        $listaCompra = new listaCompra();
        $result = $listaCompra->execute("añadir pan");
        $this->assertEquals("pan x1", $result);
    }

    /**
     * @test
     */
    public function givenStringAñadirPan2ReturnsStringWithPanx2() : void{
        $listaCompra = new listaCompra();
        $result = $listaCompra->execute("añadir pan 2");
        $this->assertEquals("pan x2", $result);
    }

    /**
     * @test
     */
    public function givenStringAñadirPan2WithExistingPanx1ReturnsStringWithPanx3(): void{
        $listaCompra = new listaCompra();
        $result = $listaCompra->execute("añadir pan 1");
        $result = $listaCompra->execute("añadir pan 2");
        $this->assertEquals("pan x3", $result);
    }
}
