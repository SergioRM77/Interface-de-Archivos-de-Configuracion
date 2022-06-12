<?php

namespace DAW\CONFIG;

class file{
    private string $filename;
    private string $content;

    /*
    *Mis conclusiones: se ha pensado todo para trabajar con archivos, independientemente de la extension,
    *la funcion es transformarlo a string, de ahí pasa a array y con eso se trabaja
    *añade, borra, cambia... y luego entrega, las funciones son las mismas para todos
    *La diferencia es, qué función o librería hay que usar para cada tipo de archivo
    */

    public function __construct( string $filename)
    {
        $this->filename = $filename;
        $this->content = file_get_contents($filename);

    }

    public function getFilename(){
        return $this->filename;
    }

    public function getContentStr(){
        return $this->content;
    }

    public function reWrite(string $newContenido){
        $this->content = file_put_contents($this->filename, $newContenido);
    }

    public function delFile(){
        unlink($this->filename);
    }
}
?>