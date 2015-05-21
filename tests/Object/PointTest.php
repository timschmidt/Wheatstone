<?php

use Thyyppa\Wheatstone\Object\Point;

class PointTest extends PHPUnit_Framework_TestCase {

    /**
     *
     */
    public function testValid3DPoint()
    {
        $instance = new Point( 1, 2, 3 );

        $this->assertEquals( 1, $instance->x );
        $this->assertEquals( 2, $instance->y );
        $this->assertEquals( 3, $instance->z );
    }


    /**
     *
     */
    public function testValid2DPoint()
    {
        $instance = new Point( 1, 2 );

        $this->assertEquals( 1, $instance->x );
        $this->assertEquals( 2, $instance->y );
    }

}
