<?php

  namespace App\Models;

  use App\Traits\{Favoritable, RecordsActivity};
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\{BelongsTo, MorphMany};

  class Reply extends Model
  {
    use HasFactory, Favoritable, RecordsActivity;

    protected $guarded = [];

    protected $with = ['owner', 'favorites'];

    public function owner() : BelongsTo
    {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function thread(): BelongsTo
    {
      return $this->belongsTo(Thread::class);
    }

    public function path(): string
    {
      return $this->thread->path() . "#reply-{$this->id}";
    }
  }
