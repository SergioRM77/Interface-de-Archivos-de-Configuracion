<?php
use PHPUnit\Framework\TestCase;
use DAW\CONFIG\ini2v;
final class ini2vTest extends TestCase{
    public function testini2v(){
        
/*      esto era otra manera de crear los archivos y pasarlos con el array de arriba
        pero si no existe un archivo lo crea por defecto y le mete valores con 'addVar'
        $fo = fopen("tests/archivos/archivo1.json", "w");
        fwrite($fo, json_encode($array));

        $fu = fopen("tests/archivos/archivo2.json", "w");
        fwrite($fu, json_encode($array));
*/       
        $ini = new ini2v("tests/archivos/archivo1.ini");
        $ini->addVar("pel", "pel");
        $ini->TransformInFileIni();
        $ini2 = new ini2v("tests/archivos/archivo2.ini");
        $ini2->addVar("pel", "pel");
        $ini2->TransformInFileIni();
        $this->assertFileEquals(("tests/archivos/archivo1.ini"), ("tests/archivos/archivo2.ini" ));
        $ini->deleteVar("bar");
        $ini2->deleteVar("bar");
        $ini->TransformInFileIni();
        $ini2->TransformInFileIni();
        
        $ini->modVar("foo", "miasma");
        $ini2->modVar("foo", "miasma");
        $ini->addVar("bar", "tre");
        $ini2->addVar("bar", "tre");
        $ini->addVar("sap", "sap");
        $ini2->addVar("sap", "sap");
        $ini->TransformInFileIni();
        $ini2->TransformInFileIni();
        $this->assertEquals($ini->readValue("sap"), $ini2->readValue("sap"));
        $this->assertFileEquals(("tests/archivos/archivo1.ini"), ("tests/archivos/archivo2.ini" ));
        $ini->modVar("foo", "bar");
        $ini2->modVar("foo", "bar");
        $ini->addVar("bar", "baz");
        $ini2->addVar("bar", "baz");
        $ini->addVar("pel", "pel");
        $ini2->addVar("pel", "pel");
        $ini->TransformInFileIni();
        $ini2->TransformInFileIni();
        $this->assertFileEquals(("tests/archivos/archivo1.ini"), ("tests/archivos/archivo2.ini" ));
        //al terminar vuelvo los archivos al estado inicial




    }
}
?>