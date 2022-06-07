<?php
namespace ITEC\DAW\CONFIGURE;
interface iconfig{
    public function createFile(string $file);
    public function readFile(string $file);
    public function removeFile(string $file);
    public function writeFile(string $file, string $contet);
    public function addVariable(string $name, $value);
    public function removeVariable(string $name);
    public function modVariable(string $name, $value);
    public function readValue(string $name);
}
?>