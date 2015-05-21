<?php namespace Thyyppa\Wheatstone\Config;

use Symfony\Component\Yaml\Yaml;

class AppConfig {


    /**
     * @var
     */
    private $config;


    /**
     * @param string $config_filename
     */
    public function __construct( $config_filename = './config.yaml' )
    {
        $this->load( $config_filename );
    }


    /**
     * @param $config_filename
     *
     * @return string
     */
    private function load( $config_filename )
    {
        $config = file_get_contents( $config_filename );

        $this->config = ( new Yaml() )->parse( $config );

        return $config;
    }


    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get( $name )
    {
        return $this->config[ 'application' ][ $name ];
    }

}
