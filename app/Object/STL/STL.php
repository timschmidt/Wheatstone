<?php namespace Thyyppa\Wheatstone\Object\STL;

abstract class STL {

    /**
     * @var string
     */
    protected $raw;

    /**
     * @var
     */
    public $headers;

    /**
     * @var
     */
    public $polygon_count;

    /**
     * @var
     */
    public $polygons;


    /**
     * @param $stl_data
     */
    public function __construct( $stl_data )
    {
        $this->raw = file_get_contents( $stl_data );

        $this->getHeaders();

        return $this;
    }


    /**
     * @return mixed
     */
    abstract protected function getHeaders();


    /**
     * @return mixed
     */
    abstract public function asObject();

}
