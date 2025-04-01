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
    public function execute($command) : string
    {
        $splittedCommand = explode(" ", $command);
        $product = $splittedCommand[1];
        $result = "";
        if($splittedCommand[0] == "añadir")
        {
            if(count($splittedCommand) == 2)
            {
                if(!in_array($product, $this->listaCompraProductos))
                {
                    $this->listaCompraProductos[] = $product;
                    $this->listaCompraCantidades[] = 1;
                }
                else
                {
                    $index = array_search($product, $this->listaCompraProductos);
                    $this->listaCompraCantidades[$index] += 1;
                }
                for($i = 0; $i < count($this->listaCompraProductos); $i++)
                {
                    $result .= $this->listaCompraProductos[$i] . " x" . $this->listaCompraCantidades[$i] . ", ";
                }

                return rtrim($result, ", ");
            }

            $quantity = (int)$splittedCommand[2];
            if(!in_array($product, $this->listaCompraProductos))
            {
                $this->listaCompraProductos[] = $product;
                $this->listaCompraCantidades[] = $quantity;
            }
            else
            {
                $index = array_search($product, $this->listaCompraProductos);
                $this->listaCompraCantidades[$index] += $quantity;
            }
            for($i = 0; $i < count($this->listaCompraProductos); $i++)
            {
                $result .= $this->listaCompraProductos[$i] . " x" . $this->listaCompraCantidades[$i] . ", ";
            }
            return rtrim($result, ", ");
        }

        if($splittedCommand[0] === "eliminar")
        {
            $index = array_search($product, $this->listaCompraProductos);
            unset($this->listaCompraProductos[$index]);
            unset($this->listaCompraCantidades[$index]);
            for($i = 0; $i < count($this->listaCompraProductos); $i++)
            {
                $result .= $this->listaCompraProductos[$i] . " x" . $this->listaCompraCantidades[$i] . ", ";
            }

            return rtrim($result, ", ");
        }

        return "Comando no reconocido";
    }
}
