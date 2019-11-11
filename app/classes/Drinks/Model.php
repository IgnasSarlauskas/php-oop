<?php

namespace App\Drinks;

class Model {

	protected $table_name = 'drinks';

	public function __construct() {
		\App\App::$db->createTable($this->table_name);
	}

	public function insert(Drink $drink) {
		return \App\App::$db->insertRow($this->table_name, $drink->getData());
	}

	public function get(array $conditions = []): array {
		$drinks = [];

		$rows = \App\App::$db->getRowsWhere($this->table_name, $conditions);

		foreach ($rows as $row) {
			$row['id'] = $row['row_id'];

			if ($row['abarot'] > 20) {
				$drinks[] = new StrongDrink($row);
			} else {
				$drinks[] = new LightDrink($row);
			}

		}

		return $drinks;
	}

	/**
	 * Update selected drink
	 * @param \App\Drinks\Drink $drink
	 * @return bool
	 */
	public function update(Drink $drink): bool {
		return \App\App::$db->updateRow($this->table_name, $drink->getID(), $drink->getData());
	}

	/**
	 * Delete a drink
	 * @param \App\Drinks\Drink $drink
	 * @return bool
	 */
	public function delete(Drink $drink): bool {
		return \App\App::$db->deleteRow($this->table_name, $drink->getID());
	}

	/**
	 * Delete all drinks
	 * @return bool
	 */
	public function deleteAll(): bool {
		return \App\App::$db->truncateTable($this->table_name);
	}
	
}