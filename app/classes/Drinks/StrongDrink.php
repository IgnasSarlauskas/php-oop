<?php

namespace App\Drinks;

class StrongDrink extends Drink {

	public function drink() {
		$this->setAmount($this->getAmount() - 50);
	}
	
	public function getImage(): ?string {
		if (parent::getImage() == null) {
			return 'https://southerncomfort-production.s3.amazonaws.com/uploads/recipe/image/3/old-fashioned_new.png';
		}
		
		return parent::getImage();
	}
	
}
