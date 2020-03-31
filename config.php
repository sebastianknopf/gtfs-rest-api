<?php
/**
 * This file remains to the GTFS-REST-API - Copyright (c) 2020.
 *
 * @author Sebastian Knopf
 * @license http://opensource.org/licenses/MIT MIT
 */


/**
 * Enables the debug mode - NOT FOR PRODUCTION USE!
 */
define('APP_DEBUG',    true);

/**
 * Application base directory - Set to a specific sub-dir of your document root. Currently auto-detecting the sub-dir.
 */
define('APP_BASE', str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', dirname(__FILE__))));

/**
 * Name of the database containing the GTFS data. Change here to use a custom database file.
 */
define('APP_DATABASE', 'GTFS');