<?php

/**
 * 
 * @param string $field_input
 * @param array $field
 * @return bool
 */
function validate_email_exists(string $field_input, array &$field): bool {
	$modelUser = new \App\Users\Model();

	if (empty($modelUser->get(['email' => $field_input]))) {
		$field['error'] = 'Toks vartotojas neegzistuoja';
		return false;
	}
	
	return true;
}

/**
 * 
 * @param string $field_input
 * @param array $field
 * @return bool
 */
function validate_email_unique(string $field_input, array &$field): bool {
	$modelUser = new \App\Users\Model();
	
	if (!empty($modelUser->get(['email' => $field_input]))) {
		$field['error'] = 'Email užimtas';
		
		return false;
	}
	
	return true;
}

/**
 * 
 * @param array $filtered_input
 * @param array $form
 * @return bool
 */
function validate_login(array $filtered_input, array &$form): bool {
	$modelUser = new \App\Users\Model();
	$user = $modelUser->get(['email' => $filtered_input['email'], 'password' => $filtered_input['password']]);
	
	if ($user == false) {
		$form['fields']['password']['error'] = 'Neteisingas slaptažodis';
		
		return false;
	}
	
	return true;
}