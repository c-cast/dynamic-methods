<?php

namespace LaravelEnso\DynamicMethods\app\Traits;

trait Relations
{
    use Methods;

    public function getRelationValue($key)
    {
        if ($this->relationLoaded($key)) {
            return $this->relations[$key];
        }

        if (isset(static::$dynamicMethods[$key]) || method_exists($this, $key)) {
            return $this->getRelationshipFromMethod($key);
        }
    }
}
