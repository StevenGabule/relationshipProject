<?php

  namespace App\Http\Controllers;

  use App\Filters\ThreadFilters;
  use App\Models\{Channel, Thread, User};
  use Illuminate\Contracts\Foundation\Application;
  use Illuminate\Contracts\View\{Factory, View};
  use Illuminate\Http\{Request, Response};

  class ThreadController extends Controller
  {
    public function __construct()
    {
      $this->middleware('auth')->only('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Channel $channel, ThreadFilters $filters)
    {
      $threads = $this->getThreads($filters, $channel);
      return view('threads.index', compact('threads'));
    }


    public function create()
    {

    }

    public function store(Request $request)
    {
      $thread = Thread::create([
        'user_id' => auth()->id(),
        'channel_id' => request('channel_id'),
        'title' => request('title'),
        'body' => request('body'),
      ]);
      return redirect($thread->path());
    }

    public function show($channel, Thread $thread)
    {
      return view('threads.show', compact('thread'));
    }

    public function edit(Thread $thread)
    {
      //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Thread $thread
     * @return Response
     */
    public function update(Request $request, Thread $thread)
    {
      //
    }

    public function destroy($channel, Thread $thread)
    {
      $this->authorize('update', $thread);

      $thread->delete();

      if (request()->wantsJson()) {
        return response([], 204);
      }

      return redirect('/threads');
    }

    /**
     * @param ThreadFilters $filters
     * @param Channel $channel
     * @return mixed
     */
    protected function getThreads(ThreadFilters $filters, Channel $channel)
    {
      $threads = Thread::latest()->filter($filters);

      if ($channel->exists) {
        $threads->where('channel_id', $channel->id);
      }

      return $threads->get();
    }
  }
