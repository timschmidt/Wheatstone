<?php namespace Thyyppa\Wheatstone\Object;

class Normal {

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
