<?php

namespace Ahlin\Bundle\MailerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class AhlinMailerExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);

        $fileLocator = new FileLocator(__DIR__.'/../Resources/config');

        $loader = new Loader\XmlFileLoader($container, $fileLocator);
        $loader->load('services.xml');
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'ahlin_mailer';
    }
}
