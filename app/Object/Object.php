<?php namespace Thyyppa\Wheatstone\Object;

use Thyyppa\Wheatstone\Object\Properties\Color;
use Thyyppa\Wheatstone\Object\Properties\Position;
use Thyyppa\Wheatstone\Object\Properties\Rotation;

/**
 * Class Object
 *
 * @package Thyyppa\Wheatstone\Object
 */
class Object {

    /**
     * @var array
     */
    public $polygons;

    /**
     * @var \Thyyppa\Wheatstone\Object\Rotation
     */
    public $rotation;

    /**
     * @var \Thyyppa\Wheatstone\Object\Position
     */
    public $position;

    /**
     * @var
     */
    public $color;


    /**
     * @param array $polygons
     * @param Color $color
     */
    public function __construct( $polygons = [ ], Color $color = null )
    {
        $this->polygons = unserialize( serialize( $polygons ) ); // Break references
        $this->rotation = new Rotation( 0, 0, 0 );
        $this->position = new Position( 0, 0, 0 );
        $this->color = $color ? : new Color( '#FFFFFF' );
    }


    /**
     * Set Rotation
     *
     * @param $x
     * @param $y
     * @param $z
     *
     * @return self
     */
    public function rotate( $x, $y, $z )
    {
        $this->rotation->x = deg2rad( $x );
        $this->rotation->y = deg2rad( $y );
        $this->rotation->z = deg2rad( $z );
        $this->applyRotation();
        return $this;
    }


    /**
     *  Apply object rotation
     */
    private function applyRotation()
    {
        foreach ( $this->polygons as $polygon ) {
            foreach ( $polygon->points as $point ) {
                $this->rotate_y( $point, $this->rotation->y );
                $this->rotate_x( $point, $this->rotation->x );
                $this->rotate_z( $point, $this->rotation->z );
            }
        }
    }


    /**
     * Set position
     *
     * @param $x
     * @param $y
     * @param $z
     *
     * @return self
     */
    public function position( $x, $y, $z )
    {
        $this->position->x = $x;
        $this->position->y = $y;
        $this->position->z = $z;
        $this->applyPosition();
        return $this;
    }


    /**
     * Apply object position
     */
    public function applyPosition()
    {
        foreach ( $this->polygons as $polygon ) {
            foreach ( $polygon->points as $point ) {
                $point->x -= $this->position->x;
                $point->y -= $this->position->y;
                $point->z -= $this->position->z;
            }
        }
    }


    /**
     * Rotate on x axis
     *
     * @param $point
     * @param $angle
     */
    private function rotate_x( $point, $angle )
    {
        $matrix = [
            [ 1.0, 0.0, 0.0 ],
            [ 0.0, cos( $angle ), -sin( $angle ) ],
            [ 0.0, sin( $angle ), cos( $angle ) ],
        ];

        $this->rotate_matrix( $point, $matrix );
    }


    /**
     * Rotate on y axis
     *
     * @param $point
     * @param $angle
     */
    private function rotate_y( $point, $angle )
    {
        $matrix = [
            [ cos( $angle ), 0.0, sin( $angle ) ],
            [ 0.0, 1.0, 0.0 ],
            [ -sin( $angle ), 0.0, cos( $angle ) ],
        ];

        $this->rotate_matrix( $point, $matrix );
    }


    /**
     * Rotate on z axis
     *
     * @param $point
     * @param $angle
     */
    private function rotate_z( $point, $angle )
    {
        $matrix = [
            [ cos( $angle ), -sin( $angle ), 0.0 ],
            [ sin( $angle ), cos( $angle ), 0.0 ],
            [ 0.0, 0.0, 1.0 ],
        ];

        $this->rotate_matrix( $point, $matrix );
    }


    /**
     * Apply rotation matrix
     *
     * @param $point
     * @param $matrix
     */
    private function rotate_matrix( $point, $matrix )
    {
        $orig = clone $point;
        $point->x = ( $matrix[ 0 ][ 0 ] * $orig->x ) + ( $matrix[ 1 ][ 0 ] * $orig->y ) + ( $matrix[ 2 ][ 0 ] * $orig->z );
        $point->y = ( $matrix[ 0 ][ 1 ] * $orig->x ) + ( $matrix[ 1 ][ 1 ] * $orig->y ) + ( $matrix[ 2 ][ 1 ] * $orig->z );
        $point->z = ( $matrix[ 0 ][ 2 ] * $orig->x ) + ( $matrix[ 1 ][ 2 ] * $orig->y ) + ( $matrix[ 2 ][ 2 ] * $orig->z );
    }

}
