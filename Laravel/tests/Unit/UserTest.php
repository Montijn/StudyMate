<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Gate;
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
    /** @test */
    public function AdminUnauthorizedTest(){
        // 1. Arrange
        $Admin = factory(\App\User::class)->create();
        // 2. Act
        $bool = Gate::forUser($Admin)->denies('CheckStudent');
        // 3. Assert
        $this->assertEquals(true, $bool);
    }
    /** @test */
    public function StudentUnauthorizedTest(){
        // 1. Arrange
        $Student = new User([
            'firstname' => 'Montijn',
            'lastname' => 'Bennik',
            'email' => 'ms.bennik@student.avans.nl',
            'role' => 'Student',
            'password' => Hash::make('test1234')
        ]);

        // 2. Act
        $bool = Gate::forUser($Student)->denies('CheckAdmin');
        // 3. Assert
        $this->assertEquals(true, $bool);
    }
}
