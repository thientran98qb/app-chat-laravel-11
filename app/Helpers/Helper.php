<?php

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
