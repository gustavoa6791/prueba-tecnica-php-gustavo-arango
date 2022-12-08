<?php

namespace App;

class User {
    private $username;
    private $password;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;

    public function __construct(string $username, string $password, string $first_name,string $last_name,string $email, int $phone) {
        $this->username = $username;
        $this->password = $password;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function setUserName($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setFirstName($first_name){
        $this->first_name = $first_name;
    }
    public function setLastName($last_name){
        $this->last_name = $last_name;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function getUserName(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getFirstName(){
        return $this->first_name;
    }
    public function getLastName(){
        return $this->last_name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPhone(){
        return $this->phone;
    }

}