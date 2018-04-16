<?php

use Zend\Log\Logger;

return [
    'log' => [
        'writers' => [
            [
                'name' => 'stream',
                'priority' => Logger::DEBUG,
                'options' => [
                    'stream' => 'php://output',
                    // 'formatter' => [
                    //     'name' => 'MyFormatter',
                    // ],
                    // 'filters' => [
                    //     [
                    //         'name' => 'MyFilter',
                    //     ],
                    // ],
                ],
            ],
        ],
    ],    
];
