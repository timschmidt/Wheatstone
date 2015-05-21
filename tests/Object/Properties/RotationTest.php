<?php

use Thyyppa\Wheatstone\Object\Properties\Rotation;

class RotationTest extends PHPUnit_Framework_TestCase {

    /**
     *
     */
    public function testValidRotation()
    {
        $instance = new Rotation( 1, 2, 3 );

        $this->assertEquals( 1, $instance->x );
        $this->assertEquals( 2, $instance->y );
        $this->assertEquals( 3, $instance->z );
    }

}
