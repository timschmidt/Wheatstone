<?php

use Thyyppa\Wheatstone\Object\Normal;
use Thyyppa\Wheatstone\Object\Point;
use Thyyppa\Wheatstone\Object\Polygon;

class PolygonTest extends PHPUnit_Framework_TestCase {

    /**
     *
     */
    public function testValid3DPolygon()
    {
        $points = [
            Mockery::mock( Point::class ),
            Mockery::mock( Point::class ),
            Mockery::mock( Point::class )
        ];

        $normal = Mockery::mock( Normal::class );

        $attributes = [ 1, 2, 3 ];

        $instance = new Polygon( $points, $normal, $attributes );
        $this->assertInternalType( 'array', $instance->points );
        $this->assertInstanceOf( Normal::class, $instance->normal );
        $this->assertInternalType( 'array', $instance->attributes );

        $instance = new Polygon( $points, $normal );
        $this->assertInternalType( 'array', $instance->points );
        $this->assertInstanceOf( Normal::class, $instance->normal );
        $this->assertNull( $instance->attributes );

        $instance = new Polygon( $points );
        $this->assertInternalType( 'array', $instance->points );
        $this->assertNull( $instance->normal );
        $this->assertNull( $instance->attributes );
    }

}
