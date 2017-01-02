<?php
namespace Asset\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Log\Logger;

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
        $this->view->setTerminal(true);
    }

    /**
     * @return void
     */
    public function indexAction()
    {
        $adminNavigation = $this->adminNavigationWidget();
        if (null !== $adminNavigation) {
            $this->view->addChild($adminNavigation, 'adminNavigation');
        }

        return $this->view;
    }

}
