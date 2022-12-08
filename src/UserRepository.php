<?php

namespace App;


class UserRepository {

    private $userRepository = []; 

    public function listUser(){
        return $this->userRepository;
    }

    public function saveUser(User $user){
        array_push($this->userRepository, $user )  ;
    }

    public function updateUser($index, $params){

        $user =  $this->userRepository[$index];
        
        if (isset($params['username'])) {
            $user->setUsername($params['username']);
        }
        if (isset($params['password'])) {
            $user->setPassword($params['password']);
        }
        if (isset($params['first_name'])) {
            $user->setFirstName($params['first_name']);
        }
        if (isset($params['last_name'])) {
            $user->setLastName($params['last_name']);
        }
        if (isset($params['email'])) {
            $user->setEmail($params['email']);
        }
        if (isset($params['phone'])) {
            $user->setPhone($params['phone']);
        }
    }
    public function deleteUser(int $index){
        unset($this->userRepository[$index]);
    }
    public function userQuantity(){
        return count($this->userRepository);
    }



}