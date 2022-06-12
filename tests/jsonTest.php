<?php
use PHPUnit\Framework\TestCase;
use DAW\CONFIG\json;

final class jsonTest extends TestCase{
    public function testjson(){
        $array = [
            'foo' => 'bar',
            'bar' => ['foo' => 'bar', 'bar' => 'baz'],
            'pel' => 'pel'
        ];
/*      esto era otra manera de crear los archivos y pasarlos con el array de arriba
        pero si no existe un archivo lo crea por defecto y le mete valores con 'addVar'
        $fo = fopen("tests/archivos/archivo1.json", "w");
        fwrite($fo, json_encode($array));

        $fu = fopen("tests/archivos/archivo2.json", "w");
        fwrite($fu, json_encode($array));
*/       
        $json = new json("tests/archivos/archivo1.json");
        $json->addVar("pel", "pel");
        $json->TransformInFileJson();
        $json2 = new json("tests/archivos/archivo2.json");
        $json2->addVar("pel", "pel");
        $json2->TransformInFileJson();
        $this->assertFileEquals(("tests/archivos/archivo1.json"), ("tests/archivos/archivo2.json" ));
        $json->deleteVar("bar");
        $json2->deleteVar("bar");
        $json->TransformInFileJson();
        $json2->TransformInFileJson();
        
        $json->modVar("foo", "miasma");
        $json2->modVar("foo", "miasma");
        $json->addVar("bar", "tre");
        $json2->addVar("bar", "tre");
        $json->addVar("sap", "sap");
        $json2->addVar("sap", "sap");
        $json->TransformInFileJson();
        $json2->TransformInFileJson();
        $this->assertEquals($json->readValue("sap"), $json2->readValue("sap"));
        $this->assertFileEquals(("tests/archivos/archivo1.json"), ("tests/archivos/archivo2.json" ));
        $json->modVar("foo", "bar");
        $json2->modVar("foo", "bar");
        $json->addVar("bar", "baz");
        $json2->addVar("bar", "baz");
        $json->addVar("pel", "pel");
        $json2->addVar("pel", "pel");
        $json->TransformInFileJson();
        $json2->TransformInFileJson();
        $this->assertFileEquals(("tests/archivos/archivo1.json"), ("tests/archivos/archivo2.json" ));
        //al terminar vuelvo los archivos al estado inicial




    }
}
?>