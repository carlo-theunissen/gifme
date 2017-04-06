<?php
namespace VideoUploadBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('video_upload');

        $rootNode
            ->children()
                ->variableNode("ffprobe_command")
                    ->defaultValue('ffprobe')
                ->end()
                ->variableNode("accepted_formats")
            ->end();
        ;

        return $treeBuilder;
    }
}