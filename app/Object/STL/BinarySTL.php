<?php namespace Thyyppa\Wheatstone\Object\STL;

use Thyyppa\Wheatstone\Object\Object;

class BinarySTL extends STL {

    /**
     * TODO: Rework binary STL support
     */
    protected function getHeaders()
    {
        $this->headers = unpack( 'C80/N1/', $this->raw );

        $this->polygon_count = array_pop( $this->headers );

        return;
    }


    /**
     *
     */
    protected function getPolygons()
    {
        $polygons = substr(
            $this->raw,
            84,
            strlen( $this->raw ) - 84
        );

        array_walk( str_split( $polygons, 50 ), function ( $chunk ) {

            $this->polygons[ ] = new Polygon( $chunk );

        } );

        return;
    }


    /**
     * @return mixed
     */
    public function asObject()
    {
        return new Object( [ ] );
    }
}
