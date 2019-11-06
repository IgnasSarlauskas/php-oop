<?php

namespace App\Drinks;

class LightDrink extends Drink {

    public function drink() {
        return parent::setAmount(parent::getAmount() - 100);
    }

    public function getImage(): ?string {
        if (parent::getImage() == null) {
            return 'https://cdn.pixabay.com/photo/2018/05/31/16/51/glass-of-beer-3444480__340.jpg';
        } else {
            return parent::getImage();
        }
    }

}
