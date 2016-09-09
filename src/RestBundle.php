<?php
/**
 * Created by rest-bundle.
 * User: ssp
 * Date: 07.09.16
 * Time: 17:13.
 */
namespace NorseDigital\Symfony\RestBundle;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class RestBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $loader = new YamlFileLoader($container, new FileLocator(
            [__DIR__.'/Resources/config/']
        ));

        $loader->load('services.yml');
    }
}
