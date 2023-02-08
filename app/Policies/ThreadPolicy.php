<?php

  namespace App\Policies;

  use App\Models\Thread;
  use App\Models\User;
  use Illuminate\Auth\Access\HandlesAuthorization;
  use Illuminate\Auth\Access\Response;

  class ThreadPolicy
  {
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
      //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Thread $thread
     * @return Response|bool
     */
    public function view(User $user, Thread $thread)
    {
      //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
      //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Thread $thread
     * @return bool
     */
    public function update(User $user, Thread $thread): bool
    {
      return $user->id == $thread->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Thread $thread
     * @return Response|bool
     */
    public function delete(User $user, Thread $thread)
    {
      //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Thread $thread
     * @return Response|bool
     */
    public function restore(User $user, Thread $thread)
    {
      //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Thread $thread
     * @return Response|bool
     */
    public function forceDelete(User $user, Thread $thread)
    {
      //
    }
  }
