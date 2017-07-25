<?php
namespace Boxspaced\CmsAssetModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Log\Logger;
use Zend\EventManager\EventManagerInterface;

class AssetController extends AbstractActionController
{

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var ViewModel
     */
    protected $view;

    /**
     * @param Logger $logger
     * @param array $config
     */
    public function __construct(
        Logger $logger,
        array $config
    )
    {
        $this->logger = $logger;
        $this->config = $config;

        $this->view = new ViewModel();
    }

    /**
     * @param EventManagerInterface $events
     * @return void
     */
    public function setEventManager(EventManagerInterface $events)
    {
        parent::setEventManager($events);
        $controller = $this;
        $events->attach('dispatch', function ($e) use ($controller) {
            $controller->layout('layout/admin');
        }, 100);
    }

    /**
     * @return void
     */
    public function indexAction()
    {
        return $this->view;
    }

}
