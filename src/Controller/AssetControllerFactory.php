<?php
namespace Asset\Controller;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Asset\Controller\AssetController;
use Zend\Log\Logger;
use Core\Controller\AbstractControllerFactory;

class AssetControllerFactory extends AbstractControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $controller = new AssetController(
            $container->get(Logger::class),
            $container->get('config')
        );

        return $this->forceHttps($controller, $container);
    }

}
