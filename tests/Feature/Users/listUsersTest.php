<?php

namespace Tests\Feature\Users;

use http\Client\Curl\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class listUsersTest extends TestCase
{

    use RefreshDatabase;
    /**
     * @test
     */
    public function can_fetch_single_user()
    {
        $this->withoutExceptionHandling();

        $user = \App\Models\User::find(1);

        $response = $this->getJson( 'api/v1/users/1');

        $response->assertSee($user->email);
    }
}
