<?php namespace Thyyppa\Wheatstone\Camera;

use Thyyppa\Wheatstone\Object\Properties\Position;
use Thyyppa\Wheatstone\Object\Properties\Rotation;

class Camera {

    /**
     * @var \Thyyppa\Wheatstone\Scene\Position
     */
    public $position;

    /**
     * @var \Thyyppa\Wheatstone\Scene\Rotation
     */
    public $rotation;

    /**
     * @var int
     */
    public $width;

    /**
     * @var int
     */
    public $height;


    /**
     *
     */
    public function __construct()
    {
        $this->position = new Position( 0, 0, 0 );
        $this->rotation = new Rotation( 0, 0, 0 );
        $this->width = 800;
        $this->height = 400;
    }


    /**
     * @param $x
     * @param $y
     * @param $z
     *
     * @return self
     */
    public function rotate( $x, $y, $z )
    {
        $this->rotation->x += $x;
        $this->rotation->y += $y;
        $this->rotation->z += $z;
        return $this;
    }


    /**
     * @param $x
     * @param $y
     * @param $z
     *
     * @return self
     */
    public function position( $x, $y, $z )
    {
        $this->position->x += $x;
        $this->position->y += $y;
        $this->position->z += $z;
        return $this;
    }

}
