<?php

namespace App\Http\Filters;

class AttendanceFilter extends QueryFilter {

    public function event($value)
    {
        return $this->builder->where('event_id', $value)->whereNotNull('used_at');
    }

}
