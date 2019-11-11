<?php

namespace App\Users;

class Model {
	
	protected $table_name = 'users';

	public function __construct() {
		\App\App::$db->createTable($this->table_name);
	}

	public function insert(User $user) {
		return \App\App::$db->insertRow($this->table_name, $user->getData());
	}

	/**
	 * @param array $conditions
	 * @return array
	 */
	public function get(array $conditions = []): array {
		$users = [];

		$rows = \App\App::$db->getRowsWhere($this->table_name, $conditions);

		foreach ($rows as $row) {
			$row['id'] = $row['row_id'];
			$users[] = new User($row);
		}
		
		return $users;
	}

	/**
	 * Update selected user
	 * @param \App\Users\User $user
	 * @return bool
	 */
	public function update(User $user): bool {
		return \App\App::$db->updateRow($this->table_name, $user->getID(), $user->getData());
	}

	/**
	 * Delete selected user
	 * @param \App\Users\User $user
	 * @return bool
	 */
	public function delete(User $user): bool {
		return \App\App::$db->deleteRow($this->table_name, $user->getID());
	}
	
	/**
	 * Delete all users
	 * @return bool
	 */
	public function deleteAll(): bool {
		return \App\App::$db->truncateTable($this->table_name);
	}

}