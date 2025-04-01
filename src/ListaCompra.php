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
        $function = $splittedCommand[0];
        if($function == "añadir")
        {
            $product = $splittedCommand[1];
            $parameterNumber = count($splittedCommand);
            if($parameterNumber == 2)
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

                for($productNumber = 0; $productNumber < count($this->productList); $productNumber++)
                {
                    $result .= $this->productList[$productNumber] . " x" . $this->quantityList[$productNumber] . ", ";
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

            for($productNumber = 0; $productNumber < count($this->productList); $productNumber++)
            {
                $result .= $this->productList[$productNumber] . " x" . $this->quantityList[$productNumber] . ", ";
            }

            return rtrim($result, ", ");
        }

        if($function === "eliminar")
        {
            $product = $splittedCommand[1];
            $index = array_search($product, $this->productList);
            if($index === false)
            {
                return "El producto seleccionado no existe";
            }

            unset($this->productList[$index]);
            unset($this->quantityList[$index]);
            for($productNumber = 0; $productNumber < count($this->productList); $productNumber++)
            {
                $result .= $this->productList[$productNumber] . " x" . $this->quantityList[$productNumber] . ", ";
            }

            return rtrim($result, ", ");
        }

        if($function === "vaciar")
        {
            $this->productList = [];
            $this->quantityList = [];

            return "";
        }

        return "Comando no reconocido";
    }
}
