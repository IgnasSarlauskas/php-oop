<?php

namespace App\Users;

class User {

	private $data = [];

	public function __construct($data = null) {
		if ($data) {
			$this->setData($data);
		} else {
			$this->data = [
				'email' => null,
				'name' => null,
				'password' => null
			];
		}
	}

	/**
	 * Sets all data from array
	 * @param array $array
	 */
	public function setData(?array $array) {
		$this->setEmail($array['email'] ?? null);
		$this->setName($array['name'] ?? null);
		$this->setPassword($array['password'] ?? null);
	}

	/**
	 * Gets all data as array
	 * @return array
	 */
	public function getData(): array {
		return [
			'name' => $this->getName(),
			'email' => $this->getEmail(),
			'password' => $this->getPassword()
		];
	}

	/**
	 * Set email
	 * @param string $email
	 */
	public function setEmail(?string $email) {
		$this->data['email'] = $email;
	}

	/**
	 * Set name
	 * @param string $name
	 */
	public function setName(?string $name) {
		$this->data['name'] = $name;
	}

	/**
	 * Set password
	 * @param string $password
	 */
	public function setPassword(?string $password) {
		$this->data['password'] = $password;
	}

	/**
	 * Returns email
	 * @return string|null
	 */
	public function getEmail(): ?string {
		return $this->data['email'];
	}

	/**
	 * Returns name
	 * @return string|null
	 */
	public function getName(): ?string {
		return $this->data['name'];
	}

	/**
	 * Returns password
	 * @return string|null
	 */
	public function getPassword(): ?string {
		return $this->data['password'];
	}

}
