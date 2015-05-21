<?php

use Thyyppa\Wheatstone\Object\Point;

class PngExporterTest extends PHPUnit_Framework_TestCase {

    /**
     * @var
     */
    private $exporter;


    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        $this->exporter = new \Thyyppa\Wheatstone\Export\PngExporter( 100, 100 );
    }


    /**
     *
     */
    public function testLineDraw()
    {
        $a = Mockery::mock( Point::class );
        $b = Mockery::mock( Point::class );

        $this->exporter->line( $a, $b );
    }


    /**
     *
     */
    public function testFileOutput()
    {
        $this->testLineDraw();

        $this->exporter->output( './tests/test.png' );

        $this->assertFileExists( './tests/test.png' );

        unlink( './tests/test.png' );
    }

}
