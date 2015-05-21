<?php

use Thyyppa\Wheatstone\Object\STL\AsciiSTL;
use Thyyppa\Wheatstone\Render\Renderer;
use Thyyppa\Wheatstone\Scene\Scene;

class RendererTest extends PHPUnit_Framework_TestCase {

    /**
     * @var
     */
    private $instance;

    /**
     * @var
     */
    private $scene;


    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        $this->scene = new Scene();

        $this->instance = new Renderer( $this->scene );
    }


    /**
     *
     */
    public function testRenderScene()
    {
        $this->instance->render( './tests/test.png', $style = null, $exporter = null );

        $this->assertFileExists( './tests/test.png' );

        unlink( './tests/test.png' );
    }


    /**
     *
     */
    public function testRenderObjects()
    {
        $object = new AsciiSTL( './tests/test.stl' );

        $this->scene->addObject( $object->asObject() );
        $this->scene->addObject( $object->asObject() );
        $this->scene->addObject( $object->asObject() );

        $this->instance->render( './tests/test.png', $style = null, $exporter = null );

        $this->assertFileExists( './tests/test.png' );

        unlink( './tests/test.png' );
    }

}
