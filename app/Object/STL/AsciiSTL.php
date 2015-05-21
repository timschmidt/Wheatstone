<?php namespace Thyyppa\Wheatstone\Object\STL;

use Thyyppa\Wheatstone\Object\Normal;
use Thyyppa\Wheatstone\Object\Object;
use Thyyppa\Wheatstone\Object\Point;
use Thyyppa\Wheatstone\Object\Polygon;

class AsciiSTL extends STL {

    /**
     *
     */
    protected function getHeaders()
    {
        return;
    }


    /**
     * @return \Thyyppa\Wheatstone\Object\Object
     */
    public function asObject()
    {
        $this->getPolygons();

        return new Object( $this->polygons );
    }


    /**
     *
     */
    private function getPolygons()
    {
        $output = [ ];

        $matches = explode( 'endfacet', $this->raw );

        foreach ( $matches as $match ) {

            $output[ ] = sscanf( $match, '  facet normal %s %s %s
            outer loop
              vertex   %s %s %s
              vertex   %s %s %s
              vertex   %s %s %s
            endloop
          endfacet' );

        }

        array_shift( $output );

        array_walk( $output, function ( &$value ) {

            array_walk( $value, function ( &$item ) {

                $item = pack( 'l', $item );

            } );

            $this->polygons[ ] = $this->createPolygon(
                implode( '', $value ) . "\000\000"
            );

        } );
    }


    /**
     * @param $data
     *
     * @return \Thyyppa\Wheatstone\Object\Polygon
     */
    private function createPolygon( $data )
    {
        $data = str_split( $data, 12 );

        $normal = $this->createPoint( array_shift( $data ) );
        $normal = new Normal( $normal->x, $normal->y, $normal->z );

        $attribute = array_pop( $data );

        $points = [ ];

        foreach ( $data as $point ) {

            $points[ ] = $this->createPoint( $point );

        }

        return new Polygon( $points, $normal, $attribute );
    }


    /**
     * @param $data
     *
     * @return \Thyyppa\Wheatstone\Object\Point
     */
    private function createPoint( $data )
    {
        $data = str_split( $data, 4 );
        $x = unpack( 'l', $data[ 0 ] )[ 1 ] * 300;
        $y = unpack( 'l', $data[ 1 ] )[ 1 ] * 300;
        $z = unpack( 'l', $data[ 2 ] )[ 1 ] * 300;

        return new Point( $x, $y, $z );
    }

}
