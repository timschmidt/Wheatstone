<?php namespace Thyyppa\Wheatstone\Object\Properties;

use ImagickPixel;

class Color {

    /**
     * @var \ImagickPixel
     */
    private $pixel;

    /**
     * @var
     */
    private $r;

    /**
     * @var
     */
    private $g;

    /**
     * @var
     */
    private $b;

    /**
     * @var float
     */
    private $a;


    /**
     * @param       $r
     * @param       $g
     * @param       $b
     * @param float $a
     */
    public function __construct( $r, $g = null, $b = null, $a = 1.0 )
    {
        if ( ! $g ) {
            return $this->pixel = new ImagickPixel( $r );
        }

        $this->r = $r;
        $this->g = $g;
        $this->b = $b;
        $this->a = $a;
        $this->pixel = new ImagickPixel(
            sprintf( 'rgba(%d,%d,%d,%d)',
                     $this->r,
                     $this->g,
                     $this->b,
                     $this->a
            )
        );
    }


    /**
     * @return \ImagickPixel
     */
    public function asPixel()
    {
        return $this->pixel;
    }

}
