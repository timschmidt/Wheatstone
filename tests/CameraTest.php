<?php


class CameraTest extends PHPUnit_Framework_TestCase {

    private $camera;


    public function setUp()
    {
        parent::setUp();

        $this->camera = new Thyyppa\Wheatstone\Camera\Camera();
    }


    public function testRotation()
    {
        $this->camera->rotate( 10, 10, 10 );
        $this->assertEquals( 10, $this->camera->rotation->x );
        $this->assertEquals( 10, $this->camera->rotation->y );
        $this->assertEquals( 10, $this->camera->rotation->z );

        $this->camera->rotate( 10, 0, 0 );
        $this->assertEquals( 20, $this->camera->rotation->x );
        $this->assertEquals( 10, $this->camera->rotation->y );
        $this->assertEquals( 10, $this->camera->rotation->z );

        $this->camera->rotate( 0, 0, 10 );
        $this->assertEquals( 20, $this->camera->rotation->x );
        $this->assertEquals( 10, $this->camera->rotation->y );
        $this->assertEquals( 20, $this->camera->rotation->z );

        $this->camera->rotate( 0, 20, 0 );
        $this->assertEquals( 20, $this->camera->rotation->x );
        $this->assertEquals( 30, $this->camera->rotation->y );
        $this->assertEquals( 20, $this->camera->rotation->z );
    }

}
