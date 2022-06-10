<?php
namespace DAW\CONFIG;
use DAW\CONFIG\file;
use DAW\CONFIG\configuracion;
use Symfony\Component\Yaml\Yaml;


class yml extends file implements configuracion {
    private array $arrayContent;

    public function __construct(string $nombreArchivo)
    {
        parent::__construct($nombreArchivo);
        $contenidoString = $this->getContentStr();
        $this->arrayContent = Yaml::parse($contenidoString);
                
    }


    public function showFileYaml(){
        return Yaml::dump($this->arrayContent);
        
    }
    public function addVar(string $name, $value){
        $this->arrayContent[$name] = $value;

    }
    public function deleteVar(string $name){
        if(array_key_exists($name, $this->arrayContent)){
            unset($this->arrayContent[$name]);
        }

    }
    public function modVar(string $name, string $value){
        if(array_key_exists($name, $this->arrayContent)){
            $this->arrayContent[$name] = $value;
        }
    }
    public function readValue(string $name){
        if(array_key_exists($name, $this->arrayContent)){
             return $this->arrayContent[$name];
        }
    }

    public function TransformInFileYaml(){
        /*
        esto crearía un nuevo archivo
        $fo = fopen("src/" . $this->getFilename(), "w");
        fwrite($fo, $this->showFileYaml());
        */

        $this->reWrite($this->showFileYaml());
    }
}


?>