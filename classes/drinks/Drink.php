<?php

declare(strict_types = 1);

class Drink {

    private $data = [];

    public function getData() {
        return $array = [
            'name' => $this->getName(),
            'amount' => $this->getAmount(),
            'abarot' => $this->getAbarot(),
            'image' => $this->getImage(),
        ];
    }

    public function setName(string $name) {
        $this->data['name'] = $name;
    }

    public function getName() {
        return $this->data['name'];
    }

    public function setAmount(int $amount_ml) {
        $this->data['amount'] = $amount_ml;
    }

    public function getAmount() {
        return $this->data['amount'];
    }

    public function setAbarot(float $abarot) {
        $this->data['abarot'] = $abarot;
    }

    public function getAbarot() {
        return $this->data['abarot'];
    }

    public function setImage(string $url) {
        $this->data['image'] = $url;
    }

    public function getImage() {
        return $this->data['image'];
    }

}
