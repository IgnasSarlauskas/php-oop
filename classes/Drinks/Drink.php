<?php

declare(strict_types = 1);

class Drink {

    private $data = [];

    public function __construct(array $data = null) {
        if ($data == null) {
            return $this->data = [
                'name' => null,
                'amount' => null,
                'abarot' => null,
                'image' => null,
                'id' => null,
            ];
        } else {
            return $this->setData($data);
        }
    }

    public function getData() {
        return [
            'name' => $this->getName(),
            'amount' => $this->getAmount(),
            'abarot' => $this->getAbarot(),
            'image' => $this->getImage(),
        ];
    }

    public function setData(array $data) {
        if (isset($data['name'])) {
            $this->setName($data['name']);
        } else {
            $this->data['name'] = null;
        }

        if (isset($data['amount'])) {
            $this->setAmount($data['amount']);
        } else {
            $this->data['amount'] = null;
        }

        if (isset($data['abarot'])) {
            $this->setAbarot($data['abarot']);
        } else {
            $this->data['abarot'] = null;
        }

        if (isset($data['image'])) {
            $this->setImage($data['image']);
        } else {
            $this->data['image'] = null;
        }
        
        if (isset($data['id'])) {
            $this->setId($data['id']);
        } else {
            $this->data['id'] = null;
        }
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
    
    public function setId(int $id) {
        $this->data['id'] = $id;
    }
    
    public function getId(int $id) {
        return $this->data['id'];
    }

}
