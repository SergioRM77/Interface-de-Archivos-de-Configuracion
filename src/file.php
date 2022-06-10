<?php

namespace DAW\CONFIG;

class file{
    private string $filename;
    private string $content;

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