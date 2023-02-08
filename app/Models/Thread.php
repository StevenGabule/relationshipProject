<?php

  namespace App\Models;

  use App\Traits\RecordsActivity;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Database\Eloquent\Relations\HasMany;

  class Thread extends Model
  {
    use HasFactory, RecordsActivity;

    protected $with = ['creator', 'channel'];

    protected static function boot()
    {
      parent::boot();

      static::addGlobalScope('replyCount', function ($builder) {
        $builder->withCount('replies');
      });

      static::deleting(function ($thread) {
        $thread->replies->each->delete();
      });

    }

    protected $guarded = [];

    public function path(): string
    {
      return '/threads' . $this->channel->slug . '/' . $this->id;
    }

    public function replies(): HasMany
    {
      return $this->hasMany(Reply::class);
    }

    public function creator(): BelongsTo
    {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function channel(): BelongsTo
    {
      return $this->belongsTo(Channel::class);
    }

    public function addReply($reply)
    {
      $this->replies()->create($reply);
    }

    public function scopeFilter($query, $filters)
    {
     return $filters->apply($query);
    }

    public function getReplyCountAttribute(): int
    {
      return $this->replies()->count();
    }
  }
