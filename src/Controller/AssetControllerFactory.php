<?php
namespace Boxspaced\CmsAssetModule\Controller;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Boxspaced\CmsAssetModule\Controller\AssetController;
use Zend\Log\Logger;

class AssetControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AssetController(
            $container->get(Logger::class),
            $container->get('config')
        );
    }

}
