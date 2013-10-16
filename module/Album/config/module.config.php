<?php

return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'album' => "Album\Controller\AlbumController"
            ),
            'Zend\View\Resolver\TemplatePathStack' => array(
                'parameters' => array(
                    'path' => array(
                        'album' => __DIR__ . "/../view"
                    )
                )
            )
        )
    )
);