<?php
namespace ITEC\DAW\CONFIGURE\iconfig;

use ITEC\DAW\CONFIGURE\iconfig;

class FilesINI implements iconfig{
    private array $file;

    public function __construct($file)
    {
        $this->file = $file;
    }
    private function parse_to_ini($file){
        if(is_array($file)){
            foreach ($file as $clave => $valor) {
                
            }
        }
    }
  
    public function createFile(string $file ){
    
    }
    public function readFile(string $file){

    }
    public function removeFile(string $file){

    }
    public function writeFile(string $file, string $contet){

    }
    public function addVariable(string $name, $value){

    }
    public function removeVariable(string $name){

    }
    public function modVariable(string $name, $value){

    }
    public function readValue(string $name){

    }
    
}

?>