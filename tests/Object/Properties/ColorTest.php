<?php

use Thyyppa\Wheatstone\Object\Properties\Color;

class ColorTest extends PHPUnit_Framework_TestCase {

    /**
     *
     */
    public function testCreatesColorFromHex()
    {
        $this->assertInstanceOf( Color::class, new Color( '#ffffff' ) );
    }


    /**
     *
     */
    public function testCreatesColorFromRGB()
    {
        $this->assertInstanceOf( Color::class, new Color( 255, 255, 255 ) );
    }


    /**
     *
     */
    public function testCreatesColorWithAlpha()
    {
        $this->assertInstanceOf( Color::class, new Color( 255, 255, 255, 0.5 ) );
    }

}
