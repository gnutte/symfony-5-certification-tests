<?php

declare(strict_types=1);

namespace App;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class UserConfiguration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('users');
        $treeBuilder->getRootNode()
            ->children()
            ->arrayNode('fields')
            ->useAttributeAsKey('key')
            ->arrayPrototype()
                ->children()
                    ->scalarNode('key')->end()
                    ->scalarNode('type')->end()
                    ->arrayNode('constraints')
                        ->arrayPrototype()
                        ->canBeEnabled()
                        ->children()
                            ->scalarNode('name')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
        return $treeBuilder;
    }
}