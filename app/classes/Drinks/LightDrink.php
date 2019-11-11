<?php

namespace App\Drinks;

class LightDrink extends Drink {
	
	public function drink() {
		$this->setAmount($this->getAmount() - 100);
	}
	
	public function getImage(): ?string {
		if (parent::getImage() == null) {
			return 'http://www.mainyk.lt/img/items/90/73/34/4cf2a5242c174.jpg';
		}
		
		return parent::getImage();
	}
}