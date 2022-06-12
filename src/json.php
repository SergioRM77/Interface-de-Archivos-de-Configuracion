<?php
namespace DAW\CONFIG;
use DAW\CONFIG\file;
use DAW\CONFIG\configuracion;

class json extends file implements configuracion{
    private array $arrayContent;
/*
 *Mis conclusiones: se ha pensado todo para trabajar con archivos, independientemente de la extension,
 *la funcion es transformarlo a string, de ahí pasa a array y con eso se trabaja
 *añade, borra, cambia... y luego entrega, las funciones son las mismas para todos
 *La diferencia es, qué función o librería hay que usar para cada tipo de archivo
 */

    public function __construct($contenido)
    {
        parent::__construct($contenido);
        $arrayContenido = $this->getContentStr();
        $this->arrayContent = json_decode($arrayContenido, true);
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
        
         $this->reWrite($this->showFileJson());
    }
}

?>