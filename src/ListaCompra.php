<?php

namespace Deg540\DockerPHPBoilerplate;

class ListaCompra
{
    public array $listaCompraProductos;
    public array $listaCompraCantidades;
    public function __construct()
    {
        $this->listaCompraProductos = [];
        $this->listaCompraCantidades = [];
    }
    public function execute($command) : string{
        $splittedCommand = explode(" ", $command);
        if(count($splittedCommand) == 2){
            $producto = $splittedCommand[1];
            if(!in_array($producto, $this->listaCompraProductos)){
                $this->listaCompraProductos[] = $producto;
                $this->listaCompraCantidades[] = 1;
            }else{
                $index = array_search($producto, $this->listaCompraProductos);
                $this->listaCompraCantidades[$index] += 1;
            }
        }
        if(count($splittedCommand) == 3){
            $producto = $splittedCommand[1];
            $cantidad = (int)$splittedCommand[2];
            if(!in_array($producto, $this->listaCompraProductos)){
                $this->listaCompraProductos[] = $producto;
                $this->listaCompraCantidades[] = $cantidad;
            }else{
                $index = array_search($producto, $this->listaCompraProductos);
                $this->listaCompraCantidades[$index] += $cantidad;
            }
        }
        $result = "";
        for($i = 0; $i < count($this->listaCompraProductos); $i++){
            $result .= $this->listaCompraProductos[$i] . " x" . $this->listaCompraCantidades[$i] . ", ";
        }
        return rtrim($result, ", ");
    }
}
