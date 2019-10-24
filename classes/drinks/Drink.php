<?php

declare(strict_types = 1);

class Drink {
    
    private $data = [];
    
    public function setName(string $name) {
        $this->data['name'] = $name;
    }
    
    public function getName() {
        if (isset($this->data['name'])) {
            return $this->data['name'];
        } else {
            throw new Exception("Error");
        }
    }
     
     
    
    public function setAmount_ml(int $amount_ml) {
        $this->data['amount_ml'] = $amount_ml;
    }
      
    public function getAmount_ml() {
        if (isset($this->data['amount_ml'])) {
            return $this->data['amount_ml'];
        } else {
            throw new Exception("Error");
        }
    }
    
    
    
    public function setAbarot(float $abarot) {
        $this->data['abarot'] = $abarot;
    }
    
    public function getAbarot() {
        if (isset($this->data['abarot'])) {
            return $this->data['abarot'];
        } else {
            throw new Exception("Error");
        }
    }
     
     
    
    public function setImage(string $image) {
        $this->data['image'] = $image;
    }
    
    public function getImage() {
        if (isset($this->data['image'])) {
            return $this->data['image'];
        } else {
            throw new Exception("Error");
        }
    }
       
}

