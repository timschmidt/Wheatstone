<?php

use Thyyppa\Wheatstone\Object\Object;
use Thyyppa\Wheatstone\Object\Point;
use Thyyppa\Wheatstone\Object\Polygon;
use Thyyppa\Wheatstone\Object\Properties\Color;

class ObjectTest extends PHPUnit_Framework_TestCase {

    /**
     * @var
     */
    private $instance;

    /**
     * @var
     */
    private $polygons;


    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        $this->polygons = [
            new Polygon( [
                             new Point( 1, 0, 0 ),
                             new Point( 1, 1, 0 ),
                             new Point( 0, 1, 0 ),
                             new Point( 0, 0, 1 ),
                         ] ),
            new Polygon( [
                             new Point( 1, 0, 0 ),
                             new Point( 1, 1, 0 ),
                             new Point( 0, 1, 0 ),
                             new Point( 0, 0, 1 ),
                         ] ),
            new Polygon( [
                             new Point( 1, 0, 0 ),
                             new Point( 1, 1, 0 ),
                             new Point( 0, 1, 0 ),
                             new Point( 0, 0, 1 ),
                         ] ),
        ];

        $this->instance = new Object( $this->polygons );
    }


    /**
     *
     */
    public function testRotation()
    {
        $this->instance->rotate( 0, 0, 0 );
        $this->assertEquals( 1, $this->instance->polygons[ 0 ]->points[ 0 ]->x );
        $this->assertEquals( 0, $this->instance->polygons[ 0 ]->points[ 0 ]->y );
        $this->assertEquals( 0, $this->instance->polygons[ 0 ]->points[ 0 ]->z );

        $this->instance->rotate( 90, 0, 0 );
        $this->assertEquals( 1, $this->instance->polygons[ 0 ]->points[ 0 ]->x );
        $this->assertEquals( 0, $this->instance->polygons[ 0 ]->points[ 0 ]->y );
        $this->assertEquals( 0, $this->instance->polygons[ 0 ]->points[ 0 ]->z );

        $this->instance->rotate( 0, 90, 0 );
        $this->assertEquals( 0, $this->instance->polygons[ 0 ]->points[ 0 ]->y );
        $this->assertEquals( 1, $this->instance->polygons[ 0 ]->points[ 0 ]->z );

        $this->instance->rotate( 0, 0, 90 );
        $this->assertEquals( 1, $this->instance->polygons[ 0 ]->points[ 0 ]->z );
    }


    /**
     *
     */
    public function testPosition()
    {
        $this->instance->position( 0, 0, 0 );
        $this->assertEquals( 1, $this->instance->polygons[ 0 ]->points[ 0 ]->x );
        $this->assertEquals( 0, $this->instance->polygons[ 0 ]->points[ 0 ]->y );
        $this->assertEquals( 0, $this->instance->polygons[ 0 ]->points[ 0 ]->z );

        $this->instance->position( 10, 0, 0 );
        $this->assertEquals( 11, $this->instance->polygons[ 0 ]->points[ 0 ]->x );
        $this->assertEquals( 0, $this->instance->polygons[ 0 ]->points[ 0 ]->y );
        $this->assertEquals( 0, $this->instance->polygons[ 0 ]->points[ 0 ]->z );

        $this->instance->position( 0, 10, 0 );
        $this->assertEquals( 11, $this->instance->polygons[ 0 ]->points[ 0 ]->x );
        $this->assertEquals( 10, $this->instance->polygons[ 0 ]->points[ 0 ]->y );
        $this->assertEquals( 0, $this->instance->polygons[ 0 ]->points[ 0 ]->z );

        $this->instance->position( 0, 0, 10 );
        $this->assertEquals( 11, $this->instance->polygons[ 0 ]->points[ 0 ]->x );
        $this->assertEquals( 10, $this->instance->polygons[ 0 ]->points[ 0 ]->y );
        $this->assertEquals( 10, $this->instance->polygons[ 0 ]->points[ 0 ]->z );
    }


    /**
     *
     */
    public function testColorProperty()
    {
        $instance = new Object( $this->polygons, new Color( '#FFFFFF' ) );
    }

}
