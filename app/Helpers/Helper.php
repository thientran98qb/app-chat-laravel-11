<?php

use Carbon\Carbon;

if (!function_exists('fetch_static_attributes')) {
    function fetch_static_attributes($class, array $attributes)
    {
        $results = [];
        $reflection = new ReflectionClass($class);
        foreach ($attributes as $attribute => $default) {
            if ($reflection->hasProperty($attribute)) {
                $property = $reflection->getProperty($attribute);
                $property->setAccessible(true);
                if ($property && $property->isStatic()) {
                    $results[] = $property->getValue();
                }
            } else {
                $results[] = $default;
            }
        }

        return $results;
    }
}

if (!function_exists('get_time_range')) {
    function get_time_range(string $startTime, string $endTime)
    {
        $start = Carbon::parse($startTime);
        $end = Carbon::parse($endTime);

        $intervals = [];
        $current = $start;

        while ($current->lt($end)) {
            $interval = [
                $current->toTimeString(),
                $current->addHours(2)->toTimeString()
            ];

            $intervals[] = $interval;
        }

        return $intervals;
    }
}
