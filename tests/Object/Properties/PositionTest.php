<?php

use Thyyppa\Wheatstone\Object\Properties\Position;

class PositionTest extends PHPUnit_Framework_TestCase {

    /**
     *
     */
    public function testValidPosition()
    {
        $instance = new Position( 1, 2, 3 );

        $this->assertEquals( 1, $instance->x );
        $this->assertEquals( 2, $instance->y );
        $this->assertEquals( 3, $instance->z );
    }

}
