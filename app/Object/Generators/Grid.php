<?php namespace Thyyppa\Wheatstone\Object\Generators;

use Thyyppa\Wheatstone\Object\Point;
use Thyyppa\Wheatstone\Object\Polygon;

class Grid extends Generator {

    /**
     * @return array
     */
    public function generate()
    {
        $grid = [ ];

        $width = 40000;

        for ( $x = -$width; $x < $width; $x += 2000 ) {

            $grid[ ] = new Polygon( [
                                        new Point( $x, 0, -$width ),
                                        new Point( $x, 0, $width ),
                                    ] );

            $grid[ ] = new Polygon( [
                                        new Point( $width, 0, $x ),
                                        new Point( -$width, 0, $x ),
                                    ] );

        }

        return $this->polygons = $grid;
    }

}
