<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class AdminTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function GuestUnauthorizedTest()
    {
        $new_User = factory(\App\User::class)->create();
        $this->assertDatabaseHas('Users', [
            'firstname' => 'Montijn',
        ]);
    }
}
