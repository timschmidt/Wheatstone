<?php

use Thyyppa\Wheatstone\Object\Object;
use Thyyppa\Wheatstone\Object\Point;
use Thyyppa\Wheatstone\Object\Polygon;
use Thyyppa\Wheatstone\Object\STL\AsciiSTL;

class AsciiSTLTest extends PHPUnit_Framework_TestCase {

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

        $this->instance = new AsciiSTL( './tests/test.stl' );
    }


    /**
     *
     */
    public function testCreatesObject()
    {
        $object = $this->instance->asObject();

        $this->assertInstanceOf( Object::class, $object );
        $this->assertInternalType( 'array', $object->polygons );
        $this->assertInstanceOf( Polygon::class, $object->polygons[ 0 ] );
        $this->assertInstanceOf( Point::class, $object->polygons[ 0 ]->points[ 0 ] );
    }

}
