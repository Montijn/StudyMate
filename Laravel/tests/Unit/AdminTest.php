<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function GuestUnauthorizedTest()
    {

        $response = $this->get("/");
        $response->assertStatus(200);
    }
}
