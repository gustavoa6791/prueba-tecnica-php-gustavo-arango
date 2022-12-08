<?php

use PHPUnit\Framework\TestCase;
use App\User;


class UserTest extends TestCase{

    public function test_create_object_user()
    {
        $user = new User('gustavoa6791','password' ,'gustavo','arango' ,'gustavo@email.com',5554433);

        $this->assertInstanceOf(User::class, $user);

        return $user;
    }

    /**
     * @depends test_create_object_user
    */

    public function test_get_info_object_user(User $user){

        $this->assertInstanceOf(User::class, $user);

        $this->assertEquals('gustavoa6791', $user->getUserName());
        $this->assertEquals('password', $user->getPassword());
        $this->assertEquals('gustavo', $user->getFirstName());
        $this->assertEquals('arango', $user->getLastName());
        $this->assertEquals('gustavo@email.com', $user->getEmail());
        $this->assertEquals(5554433, $user->getPhone());
    }

    /**
     * @depends test_create_object_user
    */

    public function test_set_info_object_user(User $user){

        $this->assertInstanceOf(User::class, $user);

        $user->setUserName('pedroPerez');
        $user->setPassword('passwordPP');
        $user->setFirstName('pedro');
        $user->setLastName('perez');
        $user->setEmail('pedroP@email.com');
        $user->setPhone(5552211);

        $this->assertEquals('pedroPerez', $user->getUserName());
        $this->assertEquals('passwordPP', $user->getPassword());
        $this->assertEquals('pedro', $user->getFirstName());
        $this->assertEquals('perez', $user->getLastName());
        $this->assertEquals('pedroP@email.com', $user->getEmail());
        $this->assertEquals(5552211, $user->getPhone());
    }
}