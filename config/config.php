<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

return [
    'config' => [
        'orm' => [
            'pdo' => [
                'sqlite:' . dirname(__FILE__) . '/../data/' . APP_DATABASE . '.db3'
            ],
            'database' => dirname(__FILE__) . '/../data/' . APP_DATABASE . '.db3',
            'namespace' => 'App\\Data\\',
            'directory' => dirname(__FILE__) . '/../src/Data'
        ]
    ]
];
