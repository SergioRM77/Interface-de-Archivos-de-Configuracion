<?php
namespace DAW\CONFIG;
use DAW\CONFIG\file;
use DAW\CONFIG\configuracion;

class csv extends file implements configuracion {
    private array $arrayContent;
    /*
    *Mis conclusiones: se ha pensado todo para trabajar con archivos, independientemente de la extension,
    *la funcion es transformarlo a string, de ahí pasa a array y con eso se trabaja
    *añade, borra, cambia... y luego entrega, las funciones son las mismas para todos
    *La diferencia es, qué función o librería hay que usar para cada tipo de archivo
    */

    public function __construct(string $nombreArchivo)
    {
        parent::__construct($nombreArchivo);
        $contenidoString = $this->getContentStr();
        $this->arrayContent = str_getcsv($contenidoString);        
    }


    public function showFileCSV(){
        $csv = $this->getFilename();

        $file = fopen($csv, "w");
        fputcsv($file, $this->arrayContent);
        fclose($file);

        return file_get_contents($this->getFilename());
        
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

    public function TransformInFileCSV(){
        
        $this->reWrite($this->showFileCSV());
    }
}


?>