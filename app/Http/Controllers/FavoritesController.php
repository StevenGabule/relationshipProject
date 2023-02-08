<?php

  namespace App\Http\Controllers;

  use App\Models\Favorite;
  use App\Models\Reply;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Http\RedirectResponse;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\DB;

  class FavoritesController extends Controller
  {
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function store(Reply $reply): RedirectResponse
    {
      $reply->favorite();
      return back();
    }
  }
