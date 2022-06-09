<?php

namespace DAW\CONFIG;
use DAW\CONFIG\file;
use DAW\CONFIG\configuracion;

class ini2v extends file implements configuracion{

    private string $contenido;
    private array $parsed;

    public function __construct(string $filename)
    {
        parent::__construct($filename);
        $this->contenido = $this->getContentStr();
    }


    public function arr2ini(array $a, array $parent = array())
    {
        $out = '';
        foreach ($a as $k => $v)
        {
            if (is_array($v))
            {
                $sec = array_merge((array) $parent, (array) $k);

                $out .= '[' . join('.', $sec) . ']' . PHP_EOL;

                $out .= $this->arr2ini($v, $sec);
            }
            else
            {
                $out .= "$k=$v" . PHP_EOL;
            }
        }
        return $out;
    }

    public function addVar(string $name, string $value){
        

    }
    public function deleteVar(string $name){

    }
    public function modVar(string $name, string $value){

    }
    public function readValue(string $name){

    }
}



?>