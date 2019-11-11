<?php

namespace Core;

class Cookie extends Abstracts\Cookie {

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function exists(): bool {
        if (isset($_COOKIE[$this->name])) {
            return true;
        }

        return false;
    }

    public function save(array $data, int $expires_in = 3600): void {
        setcookie($this->name, json_encode($data), time() + $expires_in, '/');
    }

    public function read(): array {
        if ($this->exists()) {
            $array = json_decode($_COOKIE[$this->name], true);

            if (is_array($array)) {
                return $array;
            }

            trigger_error('BAD COOKIE', E_USER_WARNING); // ismeta warning lentele
        }

        return [];
    }

    public function delete(): void {
        setcookie($this->name, null, -1, '/');
        unset($_COOKIE[$this->name]);
    }

}
