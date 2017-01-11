<?php
namespace Boxspaced\CmsAssetModule;

use Zend\Router\Http\Segment;
use Zend\Permissions\Acl\Acl;

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
    'acl' => [
        'resources' => [
            [
                'id' => Controller\AssetController::class,
            ],
        ],
        'roles' => [
            [
                'id' => 'asset-manager',
                'parents' => 'authenticated-user',
            ],
        ],
        'rules' => [
            [
                'type' => Acl::TYPE_ALLOW,
                'roles' => 'asset-manager',
                'resources' => Controller\AssetController::class,
            ],
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
