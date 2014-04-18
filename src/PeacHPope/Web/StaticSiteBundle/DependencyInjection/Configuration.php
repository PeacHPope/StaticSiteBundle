<?php

namespace PeacHPope\Web\StaticSiteBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('peachpope_static_site');

        $rootNode->children()
            ->scalarNode('bundle')
                ->cannotBeEmpty()
                ->isRequired()
                ->treatNullLike('PeachpopeStaticSiteBundle')
                ->info('The shortName of the bundle housing the static site')
                ->example('PeachpopeStaticSiteBundle')
            ->end()
            ->scalarNode('folder')
                ->cannotBeEmpty()
                ->isRequired()
                ->treatNullLike('Site')
                ->info('The folder contain the static site files')
                ->example('Site')
            ->end()
        ->end();



        return $treeBuilder;
    }
}
