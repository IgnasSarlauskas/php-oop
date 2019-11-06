<?php

namespace App\Users;

class User {

    private $data = [];

    public function __construct(array $data = null) {

        if ($data == null) {
            return $this->data = [
                'name' => null,
                'email' => null,
                'password' => null,
            ];
        } else {
            return $this->setData($data);
        }
    }

    public function getData() {
        return [
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
        ];
    }

    public function setData(array $data) {
        if (isset($data['name'])) {
            $this->setName($data['name']);
        } else {
            $this->data['name'] = null;
        }

        if (isset($data['email'])) {
            $this->setEmail($data['email']);
        } else {
            $this->data['email'] = null;
        }

        if (isset($data['password'])) {
            $this->setPassword($data['password']);
        } else {
            $this->data['password'] = null;
        }
    }
    
    public function setName(string $name) {
        $this->data['name'] = $name;
    }

    public function getName() {
        return $this->data['name'];
    }
    
    public function setEmail(string $email) {
        $this->data['email'] = $email;
    }

    public function getEmail() {
        return $this->data['email'];
    }
    
    public function setPassword(string $password) {
        $this->data['password'] = $password;
    }

    public function getPassword() {
        return $this->data['password'];
    }

}
