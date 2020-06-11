<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class UserTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function DatabaseHasUser()
    {
        $new_User = factory(\App\User::class)->create();
        $this->assertDatabaseHas('Users', [
            'firstname' => 'Montijn',
        ]);
    }
}
