<?php

namespace Deg540\DockerPHPBoilerplate;

class ListaCompra
{
    public function execute($command) : string{
        $splittedCommand = explode(" ", $command);
        if(count($splittedCommand) == 2){
            return strtolower($splittedCommand[1])." x1";
        }
        return strtolower($splittedCommand[1])." x".$splittedCommand[2];
    }
}
