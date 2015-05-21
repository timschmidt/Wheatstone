<?php

use Thyyppa\Wheatstone\Config\AppConfig;

class ConfigTest extends PHPUnit_Framework_TestCase {

    /**
     * @var
     */
    private $instance;


    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        $this->instance = new AppConfig( './tests/test.yaml' );
    }


    /**
     *
     */
    public function testAccessConfig()
    {
        $this->assertNotNull( $this->instance->name );
        $this->assertNotNull( $this->instance->version );
        $this->assertNotNull( $this->instance->author );
    }

}
