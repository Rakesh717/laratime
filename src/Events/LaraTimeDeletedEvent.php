<?php

namespace rakeshthapac\LaraTime\Events;

use Illuminate\Support\Str;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class LaraTimeDeletedEvent implements ShouldBroadcastNow
{
    use InteractsWithSockets, Dispatchable, SerializesModels;

    public $model;
    private $table;

    public function __construct($model)
    {
        $this->table = $model->table ?? Str::snake(Str::pluralStudly(class_basename($model)));
        $this->model = $model;
    }

    public function broadcastOn()
    {
        return new Channel($this->table);
    }

    public function broadcastAs()
    {
        return 'laratime-deleted';
    }
}
