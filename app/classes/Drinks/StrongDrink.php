<?php

namespace App\Drinks;

class StrongDrink extends Drink {
    public function drink() {
       return parent::setAmount(parent::getAmount() - 50); 
    }
    
    public function getImage() {
        if (parent::getImage() == null) {
            return 'https://us.123rf.com/450wm/differentnata/differentnata1706/differentnata170600041/79491744-strong-alcohol-drinks-tequila-glass-shots-in-the-bar-with-salt-and-lime-slices-.jpg?ver=6';
        } else {
            return parent::getImage();
        }
    }
}




