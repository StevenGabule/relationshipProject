<?php

  namespace App\Http\Controllers;

  use App\Models\{Activity, User};
  use Illuminate\Database\Eloquent\Collection;

  class ProfilesController extends Controller
  {
    public function show(User $user)
    {
      return view('profiles.view', [
        'profileUser' => $user,
        'activities' => Activity::feed($user)
      ]);
    }
  }
