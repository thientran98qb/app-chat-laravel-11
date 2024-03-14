<?php

namespace App\Models\Traits;
use App\Models\Activity;

trait CaptureActivity {

    /**
     * Listen for events on model and capture the
     * appropriate activities.
     *
     * @return void
     */
    protected static function bootCaptureActivity(): void
    {
        foreach (static::getModelEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $model->captureActivity($event);
            });
        }
    }

    /**
     * Capture the activity.
     *
     * @param $event
     * @return \App\Models\Activity
     */
    public function captureActivity($event): Activity
    {
        $attributes = fetch_static_attributes(static::class, static::mapAttributes());

        list($userId, $targetId, $targetType) = $attributes;

        $data = [
            'user_id' => $this->$userId,
            'targetable_id' => $this->$targetId,
            'targetable_type' => $targetType,
            'action' => $this->getActivityName($this, $event),
        ];

        if (in_array($event, $this->getRefreshEvents())) {
            $data = [
                ...$data,
                'is_refresh' => true,
            ];
        }

        return Activity::create($data);
    }

    /**
     * Get the activity name.
     *
     * @param $model
     * @param $action
     * @return string
     */
    public function getActivityName($model, $action): string
    {
        $name = strtolower(class_basename($model));

        return "{$action}_{$name}";
    }

    /**
     * Which events on the model should be captured?
     * Default events are: created, updated, and deleted.
     *
     * @return array
     */
    protected static function getModelEvents(): array
    {
        if (isset(static::$capturedEvents)) {
            return static::$capturedEvents;
        }

        return ['created', 'updated', 'deleted'];
    }

    protected static function getRefreshEvents(): array
    {
        if (isset(static::$refreshEvents)) {
            return static::$refreshEvents;
        }

        return ['created', 'updated', 'deleted'];
    }

    /**
     * Get activity attributes mapping.
     *
     * @return array
     */
    protected static function mapAttributes(): array
    {
        return [
            'activityUserId' => 'user_id',
            'activityTargetId' => 'id',
            'activityTargetType' => static::class,
        ];
    }
}
