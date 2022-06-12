<?php
namespace DAW\CONFIG;
use DAW\CONFIG\file;
use DAW\CONFIG\configuracion;

/*
 *Mis conclusiones: se ha pensado todo para trabajar con archivos, independientemente de la extension,
 *la funcion es transformarlo a string, de ahí pasa a array y con eso se trabaja
 *añade, borra, cambia... y luego entrega, las funciones son las mismas para todos
 *La diferencia es, qué función o librería hay que usar para cada tipo de archivo
 */

class ini2v extends file implements configuracion{

    private string $contenido;
    private array $arrayContent;

    public function __construct($filename)
    {
        parent::__construct($filename);
        $this->contenido = $this->getContentStr();
        //parse_ini_file espera que se le entregue el fichero directamente 
        //parse_ini_string espera un string, que es con lo que trabajamos
        //los dos devuelven array pero lo tenemos pensado para string en el parseo
        $this->arrayContent = parse_ini_string($this->contenido, true);
    }


    private function arr2ini(array $a, array $parent = array())
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

    
    public function showFileIni(){
        return self::arr2ini($this->arrayContent);
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

    public function TransformInFileIni(){
        
         $this->reWrite($this->showFileIni());
    }
}



?>