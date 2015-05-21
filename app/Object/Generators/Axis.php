<?php namespace Thyyppa\Wheatstone\Object\Generators;

use Thyyppa\Wheatstone\Object\Point;
use Thyyppa\Wheatstone\Object\Polygon;

class Axis extends Generator {

    /**
     * @return array
     */
    public function generate()
    {

        $axis = [ ];

        $axis[ ] = new Polygon( [
                                    new Point( 0, 0, 0 ),
                                    new Point( 10000, 0, 0 ),
                                ] );

        $axis[ ] = new Polygon( [
                                    new Point( 0, 0, 0 ),
                                    new Point( 0, 10000, 0 ),
                                ] );

        $axis[ ] = new Polygon( [
                                    new Point( 0, 0, 0 ),
                                    new Point( 0, 0, 10000 ),
                                ] );

        return $this->polygons = $axis;
    }

}
