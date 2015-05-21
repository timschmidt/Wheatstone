<?php

use Thyyppa\Wheatstone\Object\Generators\Axis;
use Thyyppa\Wheatstone\Object\Object;
use Thyyppa\Wheatstone\Object\Point;
use Thyyppa\Wheatstone\Object\Polygon;

class AxisGeneratorTest extends PHPUnit_Framework_TestCase {

    /**
     * @var
     */
    private $object;


    /**
     *
     */
    public function setUp()
    {
        $this->object = new Axis();

        parent::setUp();
    }


    /**
     *
     */
    public function testGeneratesPolygons()
    {
        $output = $this->object->generate();

        $this->assertInternalType( 'array', $output );
        $this->assertInstanceOf( Polygon::class, $output[ 0 ] );
        $this->assertInstanceOf( Point::class, $output[ 0 ]->points[ 0 ] );
    }


    /**
     *
     */
    public function testGeneratesObject()
    {
        $this->assertInstanceOf( Object::class, $this->object->asObject() );
    }

}
