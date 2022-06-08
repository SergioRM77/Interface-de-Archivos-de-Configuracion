<?php

namespace DAW\CONFIG;

class ini implements configuracion{
    private string $file;
    private array $parse;

    public function __construct($file){
        $this->file = $file;
        $this->parse = self::parseArrayToIni($file);
    }

    /**
     * Transforma un array puro o string, a array unidimensional con valores
     * comentados válidos para archivo .ini
     */
    private static function parseArrayToIni($files){
        $ini = [];
        if (is_array($files)){
            foreach ($files as $file => $value){
                if (!is_numeric($value)){
                    $ini[] = "[". $file ."]". PHP_EOL;
                    if(is_array($value)){
                        if(count($value)==2)
                            $ini[] = ";" . $value[0] . " = " . $value[1] . PHP_EOL;
                        if(count($value)==1)
                            $ini[] = ";" . $value[0] . " = " . PHP_EOL;
                    }
                    if (is_string($value))
                        $ini[]= ";" . $value . PHP_EOL;   
                }

                if (is_numeric($value)){
                    if(is_array($value)){
                        if(count($value)==2)
                            $ini[] = ";" . $value[0] . " = " . $value[1] . PHP_EOL;
                        if(count($value)==1)
                            $ini[] = ";" . $value[0] . " = " . PHP_EOL;
                    }
                    if (is_string($value))
                        $ini[]= ";" . $value . PHP_EOL;  
                }

            return $ini;
        }
        if (is_string($files)){
            $ini[]= ";" . $files . PHP_EOL;
            return $ini;
        }

    }
}

    /**
     * muestra contenido de array parseado
     */
    public function readArchive(){
        return print_r($this->parse);
    }

    /**
     * Transforma un array puro o string, a array unidimensional con valores
     * comentados válidos para archivo .ini
     * Estructura válida de array a ingresar -->
     *      "seccion1" => ["atributo", "valor"],
     *      "seccion2" => ["atributo"],
     *      "seccion3" => "string",
     *           (0)      ["atributo", "valor"],
     *           (1)      ["atributo"]
     *           (2)      "string"
     */
    public static function createArchive($file){
        return new ini($file);
    }

    /**
     * borrar completamente
     */
    public function deleteArchive(){
        unset($this->file);
        unset($this->parse);
    }

    /**
     * añadir atributo, valor y nombre de [seccion] (opcional)
     */
    public function addVar(string $atributte, string $value, $seccion = null){
        if($seccion == null)
            $this->parse[] = ";". $atributte . "=" . $value . PHP_EOL;
        if($seccion != null)
            $this->parse[] = "[" . $seccion . "]". PHP_EOL;
            $this->parse[] = ";". $atributte . "=" . $value . PHP_EOL;
    }
    public function activeVar(string $atributte){
        if(array_search($atributte, $this->parse) != false){
            $clave = array_search($atributte, $this->parse);
            $this->parse[$clave] = str_replace(";", "", $this->parse[$clave]);
        }

        
    }
    public function deleteVar($atributte){
        foreach ($this->parse as $key => $value){
            if (str_contains($value, $atributte)){
                unset($this->parse[$key]);
            }
        }
    }
    public function modVar(string $name, string $value){
        $this->deleteVar($name);
        $this->addVar($name, $value);
    }
    public function readValue(string $name){
        foreach ($this->parse as $key => $value){
            if (str_contains($value, $name)){
                return $value;
            }
        }     
    }
}

?>