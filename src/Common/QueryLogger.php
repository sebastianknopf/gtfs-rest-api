<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace App\Common;

/**
 * Query logger class to log SQL queries into a log file to review.
 *
 * @package App\Common
 */
class QueryLogger
{

    /**
     * Invoke method.
     *
     * @param $logEntry The query log entry
     */
    public function __invoke($logEntry) {
        $queryLogFile = dirname(__FILE__) . '/../../logs/queries.log';

        $queryLogContent = '';
        if (file_exists($queryLogFile)) {
            $queryLogContent = file_get_contents($queryLogFile);
        }

        $queryLogContent .= print_r($logEntry['statement'], true) . PHP_EOL . '================================================================================' . PHP_EOL;
        @file_put_contents($queryLogFile, $queryLogContent);
    }

}