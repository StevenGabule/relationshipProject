<?php


  namespace App\Traits;


  use App\Models\Activity;
  use App\Models\Thread;

  trait RecordsActivity
  {

    protected static function bootRecordsActivity()
    {
      if (auth()->guest()) return;

      foreach (static::getRecordEvents() as $event) {
        static::$event(function ($model) use ($event) {
          $model->recordActivity($event);
        });
      }

      static::deleting(function($model) {
        $model->activity()->delete();
      });
    }

    protected static function getRecordEvents(): array
    {
      return ['created'];
    }

    public function recordActivity($event)
    {
      $this->activity()->create([
        'user_id' => auth()->id(),
        'type' => $this->getActivityType($event),
      ]);
    }

    public function activity()
    {
      return $this->morphMany(Activity::class, 'subject');
    }

    protected function getActivityType($event): string
    {
      return $event . '_' . strtolower((new \ReflectionClass($this))->getShortName());
    }
  }
