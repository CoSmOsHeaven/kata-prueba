<?php

namespace Deg540\DockerPHPBoilerplate;

class ListaCompra
{
    public array $productList;
    public array $quantityList;
    public function __construct()
    {
        $this->productList = [];
        $this->quantityList = [];
    }
    public function execute($command) : string
    {
        $splittedCommand = explode(" ", $command);
        $result = "";
        if($splittedCommand[0] == "añadir")
        {
            $product = $splittedCommand[1];
            if(count($splittedCommand) == 2)
            {
                if(!in_array($product, $this->productList))
                {
                    $this->productList[] = $product;
                    $this->quantityList[] = 1;
                }

                else
                {
                    $index = array_search($product, $this->productList);
                    $this->quantityList[$index] += 1;
                }

                for($i = 0; $i < count($this->productList); $i++)
                {
                    $result .= $this->productList[$i] . " x" . $this->quantityList[$i] . ", ";
                }

                return rtrim($result, ", ");
            }

            $quantity = (int)$splittedCommand[2];
            if(!in_array($product, $this->productList))
            {
                $this->productList[] = $product;
                $this->quantityList[] = $quantity;
            }

            else
            {
                $index = array_search($product, $this->productList);
                $this->quantityList[$index] += $quantity;
            }

            for($i = 0; $i < count($this->productList); $i++)
            {
                $result .= $this->productList[$i] . " x" . $this->quantityList[$i] . ", ";
            }

            return rtrim($result, ", ");
        }

        if($splittedCommand[0] === "eliminar")
        {
            $product = $splittedCommand[1];
            $index = array_search($product, $this->productList);
            if($index === false)
            {
                return "El producto seleccionado no existe";
            }
            unset($this->productList[$index]);
            unset($this->quantityList[$index]);
            for($i = 0; $i < count($this->productList); $i++)
            {
                $result .= $this->productList[$i] . " x" . $this->quantityList[$i] . ", ";
            }

            return rtrim($result, ", ");
        }

        if($splittedCommand[0] === "vaciar")
        {
            $this->productList = [];
            $this->quantityList = [];

            return "";
        }

        return "Comando no reconocido";
    }
}
