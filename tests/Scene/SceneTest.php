<?php

use Thyyppa\Wheatstone\Camera\Camera;
use Thyyppa\Wheatstone\Object\Object;
use Thyyppa\Wheatstone\Object\Point;
use Thyyppa\Wheatstone\Object\STL\AsciiSTL;
use Thyyppa\Wheatstone\Scene\Scene;

class SceneTest extends PHPUnit_Framework_TestCase {

    /**
     * @var
     */
    private $instance;


    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        $this->instance = new Scene();
    }


    /**
     *
     */
    public function testAddObject()
    {
        $object = new AsciiSTL( './tests/test.stl' );

        $this->instance->addObject( $object->asObject() );
        $this->instance->addObject( $object->asObject() );

        $this->assertInstanceOf( Object::class, $this->instance->objects[ 1 ] );
    }


    /**
     *
     */
    public function testHasCamera()
    {
        $this->assertInstanceOf( Camera::class, $this->instance->camera );
    }


    /**
     *
     */
    public function testProjection()
    {
        $point = new Point( 10, 10, 10 );

        $projected = $this->instance->project( $point );

        $this->assertInternalType( 'double', $projected->x );
        $this->assertInternalType( 'double', $projected->y );
    }

}
