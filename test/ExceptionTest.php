<?php

use PHPUnit\Framework\TestCase;
use App\User;
use App\UserRepository;

class ExceptionTest extends TestCase{

    public function test_exception_create_user(){

        $this->expectException(ErrorException::class);
        $this->expectExceptionMessage('Faltan campos obligatorios');

        $user = new User('gustavoa6791','','');
    }

    public function test_set_user(){

        $user = new User('gustavoa6791','password','gustavo', 'arango');

        $this->expectException(ErrorException::class);
        $this->expectExceptionMessage('Username es obligatorio');

        $user->setUserName('');

    }

    public function test_edit_user_repository(){

        $user = new User('gustavoa6791','password','gustavo', 'arango');
        $userRepository = new UserRepository();
        $userRepository->saveUser($user);

        $params = [
            'username'    => 'pedroPerez',
            'password'    => 'passwordPP',
            'first_name'  => 'Pedro',
            'last_name'   => 'Perez',
            'email'       => 'pedroP@email.com',
            'phone'       => 5552211,
        ];

        $this->expectException(ErrorException::class);
        $this->expectExceptionMessage('No existe Usuario para editar');

        $userRepository->updateUser(5, $params);
    }


    public function test_delete_user_repository(){

        $user = new User('gustavoa6791','password','gustavo', 'arango');
        $userRepository = new UserRepository();
        $userRepository->saveUser($user);

        $this->expectException(ErrorException::class);
        $this->expectExceptionMessage('No existe Usuario para borrar');

        $userRepository->deleteUser(5);
    }

   
}