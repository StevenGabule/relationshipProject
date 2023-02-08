<?php


	namespace App\Traits;


	use App\Models\Favorite;
  use App\Models\Reply;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\MorphMany;

  trait Favoritable
	{

    public function getFavoritesCountAttribute()
    {
      return $this->favorites->count();
    }

    public function isFavorited(): bool
    {
      return !!$this->favorites->where('user_id', auth()->id())->count();
    }

    /**
     * @return Model
     */
    public function favorite(): Model
    {
      $attributes = ['user_id' => auth()->id()];
      if (!$this->favorites()->where($attributes)->exists()) {
        return $this->favorites()->create($attributes);
      }
    }

    public function favorites(): MorphMany
    {
      return $this->morphMany(Favorite::class, 'favorited');
    }
  }
