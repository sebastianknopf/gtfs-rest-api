<?php
declare(strict_types=1);

namespace Google\Transit\RealtimeAlert;

use Atlas\Mapper\MapperRelationships;
use Google\Transit\RealtimeAlertEntity\RealtimeAlertEntity;
use Google\Transit\RealtimeAlertTimerange\RealtimeAlertTimerange;

class RealtimeAlertRelationships extends MapperRelationships
{
    protected function define()
    {
        $this->oneToMany('time_ranges', RealtimeAlertTimerange::class, [
            'alert_id' => 'alert_id'
        ]);

        $this->oneToMany('entities', RealtimeAlertEntity::class, [
            'alert_id' => 'alert_id'
        ]);
    }
}
