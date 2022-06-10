<?php
namespace DAW\CONFIG;
use DAW\CONFIG\file;
use DAW\CONFIG\configuracion;

class json {
    private array $arrayContent;

    public function __construct($contenido)
    {
        
        $this->arrayContent = $contenido;
    }


    public function showFileJson(){
        return json_encode($this->arrayContent);
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

    public function TransformInFileJson(){
        $fo = fopen("src/archivo.json", "w");
        fwrite($fo, $this->showFileJson());
    }
}

$array = [
    "hola" => 5,
    "hola2" => "K ASE",
    "hola3" => [45, "mamoncin"],
    "edad",
    30
];

$archivo = new json($array);
$archivo->addVar("prueba", "me cago en json");
$archivo->deleteVar("hola");
$archivo->TransformInFileJson();

?>