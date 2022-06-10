<?php
use PHPUnit\Framework\TestCase;
use DAW\CONFIG\yml;
use Symfony\Component\Yaml\Yaml;

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
        $this->assertEquals(file_get_contents("tests/archivos/archivo1.yaml"), file_get_contents("tests/archivos/archivo2.yaml" ));
    }
}
?>