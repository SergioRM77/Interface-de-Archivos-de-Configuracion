<?php
use PHPUnit\Framework\TestCase;
use DAW\CONFIG\csv;
final class csvTest extends TestCase{
    public function testini2v(){
        
/*      esto era otra manera de crear los archivos y pasarlos con el array de arriba
        pero si no existe un archivo lo crea por defecto y le mete valores con 'addVar'
        $fo = fopen("tests/archivos/archivo1.json", "w");
        fwrite($fo, json_encode($array));

        $fu = fopen("tests/archivos/archivo2.json", "w");
        fwrite($fu, json_encode($array));
*/       
        $csv = new csv("tests/archivos/archivo1.csv");
        $csv->addVar("pel", "pel");
        $csv->TransformInFileCSV();
        $csv2 = new csv("tests/archivos/archivo2.csv");
        $csv2->addVar("pel", "pel");
        $csv2->TransformInFileCSV();
        $this->assertFileEquals(("tests/archivos/archivo1.csv"), ("tests/archivos/archivo2.csv" ));
        $csv->deleteVar("bar");
        $csv2->deleteVar("bar");
        $csv->TransformInFileCSV();
        $csv2->TransformInFileCSV();
        
        $csv->modVar("foo", "miasma");
        $csv2->modVar("foo", "miasma");
        $csv->addVar("bar", "tre");
        $csv2->addVar("bar", "tre");
        $csv->addVar("sap", "sap");
        $csv2->addVar("sap", "sap");
        $csv->TransformInFileCSV();
        $csv2->TransformInFileCSV();
        $this->assertEquals($csv->readValue("sap"), $csv2->readValue("sap"));
        $this->assertFileEquals(("tests/archivos/archivo1.csv"), ("tests/archivos/archivo2.csv" ));
        $csv->modVar("foo", "bar");
        $csv2->modVar("foo", "bar");
        $csv->addVar("bar", "baz");
        $csv2->addVar("bar", "baz");
        $csv->addVar("pel", "pel");
        $csv2->addVar("pel", "pel");
        $csv->TransformInFileCSV();
        $csv2->TransformInFileCSV();
        $this->assertFileEquals(("tests/archivos/archivo1.csv"), ("tests/archivos/archivo2.csv" ));
        //al terminar vuelvo los archivos al estado inicial




    }
}
?>