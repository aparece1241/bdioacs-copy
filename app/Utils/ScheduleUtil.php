<?php

namespace App\Utils;

use App\Models\Schedule;

class ScheduleUtil {
    static function getStatusColor(string $status): string
    {
        switch($status) {
            case Schedule::PENDING:
                return 'warning';
            case Schedule::ACCEPTED:
                return 'success';
            case Schedule::DECLINED:
                return 'danger';
            case Schedule::APPROVED:
                return 'info';
        }
    }
}
