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
        // 1. Arrange
        $new_User = factory(\App\User::class)->create();
        // 2/3. Act/Assert
        $this->assertDatabaseHas('Users', [
            'firstname' => 'Montijn',
        ]);
    }
    /** @test */
    public function AdminUnauthorizedTest(){
        // 1. Arrange
        $admin = factory(\App\User::class)->create();
        auth()->login($admin);
        // 2. Act
        $bool = Gate::forUser($admin)->denies('CheckStudent');
        // 3. Assert
        $this->assertEquals(true, $bool);
    }
    /** @test */
    public function StudentUnauthorizedTest(){
        // 1. Arrange
        $student = new User([
            'firstname' => 'Montijn',
            'lastname' => 'Bennik',
            'email' => 'ms.bennik@student.avans.nl',
            'role' => 'Student',
            'password' => Hash::make('test1234')
        ]);
        auth()->login($student);

        // 2. Act
        $bool = Gate::forUser($student)->denies('CheckAdmin');
        // 3. Assert
        $this->assertEquals(true, $bool);
    }
    /** @test */
    public function GuestStudentUnauthorizedTest(){
        // 1. Arrange
        $admin = factory(\App\User::class)->create();
        // 2. Act
        $bool = Gate::forUser($admin)->denies('CheckStudent');
        // 3. Assert
        $this->assertEquals(true, $bool);
    }
    /** @test */
    public function GuestAdminUnauthorizedTest(){
        // 1. Arrange
        $admin = factory(\App\User::class)->create();
        // 2. Act
        $bool = Gate::forUser($admin)->denies('CheckAdmin');
        // 3. Assert
        $this->assertEquals(true, $bool);
    }

}
