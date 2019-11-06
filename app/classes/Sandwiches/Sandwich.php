<?php

namespace App\Sandwiches;

class Sandwich {

    private $data = [];
    /**
     * constructor method
     * @param array $data
     * @return type array
     */
    public function __construct(array $data = null) {
        if ($data == null) {
            return $this->data = [
                'name' => null,
                'price' => null,
                'vegan' => null,
                'image' => null,
                'id' => null,
            ];
        } else {
            return $this->setData($data);
        }
    }
    
    /**
     * 
     * function that gets the array with all indexes that calls their methods
     * @return array
     */
    public function getData(): array {
        return [
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'vegan' => $this->getType(),
            'image' => $this->getImage(),
        ];
    }

    /**
     * function that sets $data array values if the key exists
     * @param array $data
     */
    public function setData(array $data) {
        if (isset($data['name'])) {
            $this->setName($data['name']);
        } else {
            $this->data['name'] = null;
        }

        if (isset($data['price'])) {
            $this->setPrice($data['price']);
        } else {
            $this->data['price'] = null;
        }
        
        if (isset($data['vegan'])) {
            $this->setType($data['vegan']);
        } else {
            $this->data['vegan'] = null;
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

    public function getName(): ?string {
        return $this->data['name'];
    }

    public function setPrice(float $price) {
        $this->data['price'] = $price;
    }

    public function getPrice(): ?float {
        return $this->data['price'];
    }

    public function setType(bool $vegan) {
        $this->data['vegan'] = $vegan;
    }

    public function getType(): ?bool {
        return $this->data['vegan'];
    }

    public function setImage(string $url) {
        $this->data['image'] = $url;
    }
    
    public function getImage(): ?string {
        return $this->data['image'];
    }
    
    public function setId(int $id) {
        $this->data['id'] = $id;
    }
    
    public function getId(int $id): ?int {
        return $this->data['id'];
    }

}
