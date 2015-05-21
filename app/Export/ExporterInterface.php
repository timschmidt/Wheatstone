<?php namespace Thyyppa\Wheatstone\Export;

use Thyyppa\Wheatstone\Object\Properties\Color;
use Thyyppa\Wheatstone\Object\Point;

interface ExporterInterface {

    /**
     * @param                                             $width
     * @param                                             $height
     * @param \Thyyppa\Wheatstone\Object\Properties\Color $background_color
     */
    public function __construct( $width, $height, Color $background_color = null );


    /**
     * @param \Thyyppa\Wheatstone\Object\Point            $a
     * @param \Thyyppa\Wheatstone\Object\Point            $b
     * @param \Thyyppa\Wheatstone\Object\Properties\Color $color
     *
     * @return mixed
     */
    public function line( Point $a, Point $b, Color $color );


    /**
     * @param $filename
     *
     * @return mixed
     */
    public function output( $filename );

}
