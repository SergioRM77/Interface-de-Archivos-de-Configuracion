<?php
use PHPUnit\Framework\TestCase;
use DAW\CONFIG\yml;
//use Symfony\Component\Yaml\Yaml;

final class ymlTest extends TestCase{
    public function testyml(){
        $array = [
            'foo' => 'bar',
            'bar' => ['foo' => 'bar', 'bar' => 'baz'],
            'pel' => 'pel'
        ];

        $yaml = new yml("tests/archivos/archivo1.yaml");
        $yaml->addVar("pel", "pel");
        $yaml->TransformInFileYaml();
        $yaml2 = new yml("tests/archivos/archivo2.yaml");
        $yaml->deleteVar("bar");
        $yaml2->deleteVar("bar");
        $yaml->TransformInFileYaml();
        $yaml2->TransformInFileYaml();
        $this->assertFileEquals(("tests/archivos/archivo1.yaml"), ("tests/archivos/archivo2.yaml" ));

        $yaml->modVar("foo", "miasma");
        $yaml2->modVar("foo", "miasma");
        $yaml->addVar("bar", "tre");
        $yaml2->addVar("bar", "tre");
        $yaml->addVar("sap", "sap");
        $yaml2->addVar("sap", "sap");
        $yaml->TransformInFileYaml();
        $yaml2->TransformInFileYaml();
        $this->assertEquals($yaml->readValue("sap"), $yaml2->readValue("sap"));
        $this->assertFileEquals(("tests/archivos/archivo1.yaml"), ("tests/archivos/archivo2.yaml" ));

        $yaml->modVar("foo", "bar");
        $yaml2->modVar("foo", "bar");
        $yaml->addVar("bar", "baz");
        $yaml2->addVar("bar", "baz");
        $yaml->addVar("pel", "pel");
        $yaml2->addVar("pel", "pel");
        $yaml->TransformInFileYaml();
        $yaml2->TransformInFileYaml();
        $this->assertFileEquals(("tests/archivos/archivo1.yaml"), ("tests/archivos/archivo2.yaml" ));
        //al terminar vuelvo los archivos al estado inicial

    }
}
?>