<?php namespace Thyyppa\Wheatstone\Command;

use Thyyppa\Wheatstone\Object\Generators\Axis;
use Thyyppa\Wheatstone\Object\Generators\Grid;
use Thyyppa\Wheatstone\Object\Properties\Color;
use Thyyppa\Wheatstone\Object\STL\AsciiSTL;
use Thyyppa\Wheatstone\Render\Renderer;
use Thyyppa\Wheatstone\Scene\Scene;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RenderCommand extends Command {

    /**
     *
     */
    protected function configure()
    {
        $this->setName( 'render' );
        $this->setDescription( 'Render an STL file' );

        $this->addArgument( 'stl', InputArgument::REQUIRED, 'STL File' );
        $this->addArgument( 'output', InputArgument::OPTIONAL, 'Output Filename', 'output.png' );
    }


    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    protected function execute( InputInterface $input, OutputInterface $output )
    {

        $stl = new AsciiSTL( $input->getArgument( 'stl' ) );


        $scene = new Scene();

        $scene->addObject(
            ( new Grid() )->asObject( new Color( '#1F1F1F' ) )
        );

        $scene->addObject(
            ( new Axis() )->asObject( new Color( '#00FF00' ) )
        );

        $scene->addObject(
            $stl->asObject()->position( 0, 7000, 0 )
        );


        $scene->camera->position( -15000, -15000, 20000 )
                      ->rotate( rand( -20, -10 ), rand( -60, 10 ), 0 );


        ( new Renderer( $scene ) )->render( $input->getArgument( 'output' ) );
    }

}
