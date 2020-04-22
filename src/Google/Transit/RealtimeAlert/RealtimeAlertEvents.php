<?php
declare(strict_types=1);

namespace App\Google\Transit\RealtimeAlert;

use Atlas\Mapper\Mapper;
use Atlas\Mapper\MapperEvents;
use Atlas\Mapper\Record;
use Atlas\Query\Insert;
use PDOStatement;

class RealtimeAlertEvents extends MapperEvents
{
    public function afterInsert(Mapper $mapper, Record $record, Insert $insert, PDOStatement $pdoStatement): void
    {
        parent::afterInsert($mapper, $record, $insert, $pdoStatement);
        $record->set(['alert_id' => $insert->getLastInsertId()]);
    }
}
