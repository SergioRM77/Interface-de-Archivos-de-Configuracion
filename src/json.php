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
        if($key = array_search($name, $this->arrayContent) != false){
            unset($this->arrayContent[$key]);
        }

    }
    public function modVar(string $name, string $value){
        if(array_search($name, $this->arrayContent) != false){
            $this->arrayContent[$name] = $value;
        }
    }
    public function readValue(string $name){
        if(array_search($name, $this->arrayContent) != false){
             return $this->arrayContent[$name];
        }
    }

    public function TransformInFileJson(){
        $fo = fopen("archivo.json", "w");
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