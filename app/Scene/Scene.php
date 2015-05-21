<?php namespace Thyyppa\Wheatstone\Scene;

use Thyyppa\Wheatstone\Camera\Camera;
use Thyyppa\Wheatstone\Object\Object;
use Thyyppa\Wheatstone\Object\Point;

class Scene {

    /**
     * @var
     */
    public $camera;

    /**
     * @var array
     */
    public $objects = [ ];


    /**
     *
     */
    public function __construct()
    {
        $this->camera = new Camera();
    }


    /**
     * @param \Thyyppa\Wheatstone\Object\Object $object
     */
    public function addObject( Object $object )
    {
        $this->objects[ ] = $object;
    }


    /**
     * @param \Thyyppa\Wheatstone\Object\Point $point
     *
     * @return \Thyyppa\Wheatstone\Object\Point
     */
    public function project( Point $point )
    {
        $point = clone $point;

        $point->x = ( $this->camera->width / 2 ) + $point->x * $this->camera->fov / ( $point->z + $this->camera->fov );
        $point->y = ( $this->camera->height / 2 ) - $point->y * $this->camera->fov / ( $point->z + $this->camera->fov );

        return $point;
    }

}
