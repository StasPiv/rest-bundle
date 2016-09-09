<?php
/**
 * Created by rest-bundle.
 * User: ssp
 * Date: 09.09.16
 * Time: 16:57
 */

namespace NorseDigital\Symfony\RestBundle\DependenceInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class RestBundleExtension  extends ConfigurableExtension
{
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(
            [__DIR__.'/../Resources/config/']
        ));

        $loader->load('services.yml');
    }

}