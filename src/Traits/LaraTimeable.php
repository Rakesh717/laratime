<?php

namespace rakeshthapac\LaraTime\Traits;

use Illuminate\Database\Eloquent\Model;
use rakeshthapac\LaraTime\Events\LaraTimeAddedEvent;
use rakeshthapac\LaraTime\Events\LaraTimeDeletedEvent;
use rakeshthapac\LaraTime\Events\LaraTimeUpdatedEvent;

trait LaraTimeable
{
    public static function bootLaraTime()
    {
        static::created(function (Model $model) {
            broadcast(new LaraTimeAddedEvent($model));
        });

        static::updated(function (Model $model) {
            broadcast(new LaraTimeUpdatedEvent($model));
        });

        static::deleted(function (Model $model) {
            broadcast(new LaraTimeDeletedEvent($model));
        });
    }
}
