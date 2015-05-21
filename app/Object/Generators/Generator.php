<?php namespace Thyyppa\Wheatstone\Object\Generators;

use Thyyppa\Wheatstone\Object\Object;
use Thyyppa\Wheatstone\Object\Properties\Color;

abstract class Generator implements GeneratorInterface {

    /**
     * @var
     */
    protected $polygons;


    /**
     *
     */
    public function __construct()
    {
        return $this->generate();
    }


    /**
     * @param mixed $color
     *
     * @return \Thyyppa\Wheatstone\Object\Object
     */
    public function asObject( Color $color = null )
    {
        $color = $color ? : new Color( '#FFFFFF' );

        return new Object( $this->polygons, $color );
    }

}
