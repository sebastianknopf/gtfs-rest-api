<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace Google\Transit\RealtimeAlert;

use Atlas\Table\Row;

/**
 * @property mixed $alert_id INTEGER
 * @property mixed $alert_cause TEXT
 * @property mixed $alert_effect TEXT
 * @property mixed $alert_url TEXT
 * @property mixed $alert_header_text TEXT
 * @property mixed $alert_description_text TEXT
 */
class RealtimeAlertRow extends Row
{
    protected $cols = [
        'alert_id' => null,
        'alert_cause' => null,
        'alert_effect' => null,
        'alert_url' => null,
        'alert_header_text' => null,
        'alert_description_text' => null,
    ];
}
