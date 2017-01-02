<?php
namespace Asset;

use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            // LIFO
            'asset' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/asset[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\AssetController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            // LIFO
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\AssetController::class => Controller\AssetControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
