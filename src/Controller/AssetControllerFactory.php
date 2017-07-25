<?php
namespace Boxspaced\CmsAssetModule\Controller;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Boxspaced\CmsAssetModule\Controller\AssetController;
use Zend\Log\Logger;
use Boxspaced\CmsCoreModule\Controller\AbstractControllerFactory;

class AssetControllerFactory extends AbstractControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $controller = new AssetController(
            $container->get(Logger::class),
            $container->get('config')
        );

        $this->adminNavigationWidget($controller, $container);

        return $this->forceHttps($controller, $container);
    }

}
