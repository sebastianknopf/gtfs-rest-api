<?php
declare(strict_types=1);

namespace App\Google\Transit\RealtimeAlert;

use App\Google\Transit\RealtimeAlertEntity\RealtimeAlertEntity;
use App\Google\Transit\RealtimeAlertTimerange\RealtimeAlertTimerange;
use Atlas\Mapper\MapperRelationships;

class RealtimeAlertRelationships extends MapperRelationships
{
    protected function define()
    {
        $this->oneToMany('time_ranges', RealtimeAlertTimerange::class, [
            'alert_id' => 'alert_id'
        ]);

        $this->oneToMany('informed_entities', RealtimeAlertEntity::class, [
            'alert_id' => 'alert_id'
        ]);
    }
}
