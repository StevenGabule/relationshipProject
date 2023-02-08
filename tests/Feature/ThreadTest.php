<?php

  namespace Tests\Feature;

  use Illuminate\Foundation\Testing\DatabaseMigrations;
  use Illuminate\Foundation\Testing\RefreshDatabase;
  use Tests\TestCase;

  class ThreadTest extends TestCase
  {
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_browse_threads()
    {
      $response = $this->get('/threads');

      $response->assertStatus(200);
    }
  }
