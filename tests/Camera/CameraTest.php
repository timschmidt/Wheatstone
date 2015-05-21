<?php


class CameraTest extends PHPUnit_Framework_TestCase {

    /**
     * @var
     */
    private $camera;


    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        $this->camera = new Thyyppa\Wheatstone\Camera\Camera();
    }


    /**
     *
     */
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


    /**
     *
     */
    public function testPosition()
    {
        $this->camera->position( 10, 10, 10 );
        $this->assertEquals( 10, $this->camera->position->x );
        $this->assertEquals( 10, $this->camera->position->y );
        $this->assertEquals( 10, $this->camera->position->z );

        $this->camera->position( 10, 0, 0 );
        $this->assertEquals( 20, $this->camera->position->x );
        $this->assertEquals( 10, $this->camera->position->y );
        $this->assertEquals( 10, $this->camera->position->z );

        $this->camera->position( 0, 0, 10 );
        $this->assertEquals( 20, $this->camera->position->x );
        $this->assertEquals( 10, $this->camera->position->y );
        $this->assertEquals( 20, $this->camera->position->z );

        $this->camera->position( 0, 20, 0 );
        $this->assertEquals( 20, $this->camera->position->x );
        $this->assertEquals( 30, $this->camera->position->y );
        $this->assertEquals( 20, $this->camera->position->z );

        $this->camera->position( -100, -100, -100 );
        $this->assertEquals( -80, $this->camera->position->x );
        $this->assertEquals( -70, $this->camera->position->y );
        $this->assertEquals( -80, $this->camera->position->z );
    }


    /**
     *
     */
    public function testHasResolution()
    {
        $this->assertNotNull( $this->camera->width );
        $this->assertNotNull( $this->camera->height );
    }

}
