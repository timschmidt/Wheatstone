<?php namespace Thyyppa\Wheatstone\Object\Properties;

class Rotation {

    /**
     * @var
     */
    public $x;

    /**
     * @var
     */
    public $y;

    /**
     * @var
     */
    public $z;


    /**
     * @param $x
     * @param $y
     * @param $z
     */
    public function __construct( $x, $y, $z )
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

}
