<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        //$this->post('/auth/login', ['email' => 'sittipong_108@hotmail.com','password'=>'sittipong'])->seePageIs('/home');;
        $this->visit('/');
    }
}
