<?php

use PHPUnit\Framework\TestCase;
use App\User;
use App\UserRepository;

class UserRepositoryTest extends TestCase{

    public function test_user_repository_empty()
    {
        $userRepository = new UserRepository();

        $this->assertInstanceOf(UserRepository::class, $userRepository);
        $this->assertEmpty($userRepository->listUser());
    
        return $userRepository;
    }

    /**
     * @depends test_user_repository_empty
    */
    public function test_add_user(UserRepository $userRepository)
    {
        $user = new User('gustavoa6791','password' ,'gustavo','arango' ,'gustavo@email.com',5554433);

        $userRepository->saveUser($user);

        $this->assertInstanceOf(User::class, $user);
        $this->assertInstanceOf(User::class, $userRepository->listUser()[0]);
        $this->assertNotEmpty($userRepository->listUser());
        $this->assertEquals('gustavoa6791', $userRepository->listUser()[0]->getUserName());
        $this->assertEquals('gustavo', $userRepository->listUser()[0]->getFirstName());
        $this->assertEquals('arango', $userRepository->listUser()[0]->getLastName());
        $this->assertEquals('password', $userRepository->listUser()[0]->getPassword());
        $this->assertEquals('gustavo@email.com', $userRepository->listUser()[0]->getEmail());
        $this->assertEquals(5554433, $userRepository->listUser()[0]->getPhone());

        return $userRepository;
    }

    /**
     * @depends test_add_user
    */
    public function test_update_user(UserRepository $userRepository)
    {
        $params = [
            'username'    => 'pedroPerez',
            'password'    => 'passwordPP',
            'first_name'  => 'Pedro',
            'last_name'   => 'Perez',
            'email'       => 'pedroP@email.com',
            'phone'       => 5552211,
        ];

        $userRepository->updateUser(0, $params);

        $this->assertInstanceOf(User::class, $userRepository->listUser()[0]);
        $this->assertNotEmpty($userRepository->listUser());
        $this->assertEquals('pedroPerez', $userRepository->listUser()[0]->getUserName());
        $this->assertEquals('Pedro', $userRepository->listUser()[0]->getFirstName());
        $this->assertEquals('Perez', $userRepository->listUser()[0]->getLastName());
        $this->assertEquals('passwordPP', $userRepository->listUser()[0]->getPassword());
        $this->assertEquals('pedroP@email.com', $userRepository->listUser()[0]->getEmail());
        $this->assertEquals(5552211, $userRepository->listUser()[0]->getPhone());

        return $userRepository;

    }
    /**
     * @depends test_update_user
    */
    public function test_delete_user(UserRepository $userRepository)
    {
        $userQty = $userRepository->userQuantity();

        $userRepository->deleteUser(0);

        $userQtyAfter = $userRepository->userQuantity();

        $this->assertEquals($userQtyAfter, ($userQty - 1) );
    }
}