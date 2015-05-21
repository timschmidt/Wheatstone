<?php namespace Thyyppa\Wheatstone\Render;

use Thyyppa\Wheatstone\Export\PngExporter;
use Thyyppa\Wheatstone\Scene\Scene;

class Renderer {

    /**
     * @var \Thyyppa\Wheatstone\Scene\Scene
     */
    private $scene;

    /**
     * @var
     */
    private $image;


    /**
     * @var
     */
    private $style;


    /**
     * @param \Thyyppa\Wheatstone\Scene\Scene $scene
     */
    public function __construct( Scene $scene = null )
    {
        return $this->scene = $scene ? : new Scene();
    }


    /**
     * @param      $filename
     * @param null $style
     * @param null $exporter
     */
    public function render( $filename, $style = null, $exporter = null )
    {
        $this->style = $this->getRenderStyleMethod( $style );

        $exporter = $this->getExporterClass( $exporter );

        $this->image = new $exporter( $this->scene->camera->width, $this->scene->camera->height );

        $this->renderObjects();

        $this->image->output( $filename );
    }


    /**
     * @param $style
     *
     * @return string
     */
    private function getRenderStyleMethod( $style )
    {
        return 'render' . ucfirst( $style ? : 'wireframe' );
    }


    /**
     *
     */
    private function renderObjects()
    {
        foreach ( $this->scene->objects as $object ) {

            $this->applyCameraTransforms( $object );

            $this->{$this->style}( $object );

        }
    }


    /**
     * @param $object
     */
    private function applyCameraTransforms( $object )
    {
        $object->position(
            $this->scene->camera->position->x,
            $this->scene->camera->position->y,
            $this->scene->camera->position->z
        );

        $object->rotate(
            -$this->scene->camera->rotation->x,
            $this->scene->camera->rotation->y,
            -$this->scene->camera->rotation->z
        );
    }


    /**
     * @param $object
     */
    private function renderWireframe( $object )
    {
        foreach ( $object->polygons as $polygon ) {

            $point_count = count( $polygon->points );

            for ( $n = 0; $n < $point_count; $n++ ) {

                $a = $this->scene->project( $polygon->points[ $n ] );
                $b = $this->scene->project( $polygon->points[ ( $n + 1 ) % $point_count ] );

                if ( -$a->z > 1 && -$b->z > 1 ) {
                    $this->image->line( $a, $b, $object->color );
                }

            }

        }
    }


    /**
     * @param $exporter
     *
     * @return mixed
     */
    private function getExporterClass( $exporter )
    {
        $exporter = $exporter ? : PngExporter::class;

        return $exporter;
    }

}
