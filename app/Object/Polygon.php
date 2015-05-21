<?php namespace Thyyppa\Wheatstone\Object;

class Polygon {

    /**
     * @var array
     */
    public $points;

    /**
     * @var
     */
    public $normal;

    /**
     * @var null
     */
    public $attributes;


    /**
     * @param array $points
     * @param null  $normal
     * @param null  $attributes
     */
    public function __construct( $points = [ ], $normal = null, $attributes = null )
    {
        $this->points = $points;
        $this->normal = $normal;
        $this->attributes = $attributes;
    }

}
