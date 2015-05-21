<?php namespace Thyyppa\Wheatstone\Export;

use Imagick;
use ImagickDraw;
use Thyyppa\Wheatstone\Object\Point;
use Thyyppa\Wheatstone\Object\Properties\Color;

class PngExporter implements ExporterInterface {

    /**
     * @var
     */
    private $image;

    /**
     * @var
     */
    private $buffer;


    /**
     * @param                                             $width
     * @param                                             $height
     * @param \Thyyppa\Wheatstone\Object\Properties\Color $background_color
     */
    public function __construct( $width, $height, Color $background_color = null )
    {
        $background_color = $background_color ? : new Color( 20, 20, 20 );

        $this->image = new Imagick();
        $this->image->newImage( $width, $height, $background_color->asPixel() );
        $this->image->setImageFormat( 'png' );

        $this->buffer = new ImagickDraw();
        $this->buffer->setFillColor( '#FFFFFF' );
    }


    /**
     * @param \Thyyppa\Wheatstone\Object\Point            $a
     * @param \Thyyppa\Wheatstone\Object\Point            $b
     * @param \Thyyppa\Wheatstone\Object\Properties\Color $color
     *
     * @return bool
     */
    public function line( Point $a, Point $b, Color $color = null )
    {
        $color = $color ? : new Color( 255, 255, 255 );

        $this->buffer->setFillColor( $color->asPixel() );

        return $this->buffer->line( $a->x, $a->y, $b->x, $b->y );
    }


    /**
     * @param $filename
     *
     * @return mixed
     */
    public function output( $filename )
    {
        $this->image->drawImage( $this->buffer );
        $this->image->writeImage( $filename );
    }
}
