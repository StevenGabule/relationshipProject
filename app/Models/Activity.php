<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\MorphTo;

  class Activity extends Model
  {
    use HasFactory;

    protected $guarded = [];

    public function subject(): MorphTo
    {
      return $this->morphTo();
    }

    public static function feed($user, $take = 50)
    {
      return static::where('user_id', $user->id)
                  ->latest()
                  ->with('subject')
                  ->take($take)
                  ->get()
                  ->groupBy(function ($activity) {
              return $activity->created_at->format('Y-m-d');
      });
    }
}
