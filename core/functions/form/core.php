<?php

require('validators.php');

function get_filtered_input($array) {
    $filter_parameters = [];
    foreach ($array['fields'] as $field_key => $field) { // jei true, su tuo masyvu, daryk tai:print $inner_array['filter'];
        $filter_parameters[$field_key] = $field['filter'] ?? FILTER_SANITIZE_SPECIAL_CHARS; // ideda filtra (konstantą) kokia nurodyta masyve.
    };
    return filter_input_array(INPUT_POST, $filter_parameters); // sitoj eilutej vyskta sanitation pagal default f-ja
}

function get_form_action() {
    return filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
}

/**
 * function that validates form by checking if input field is empty then error occures above the empty input field 
 * @param $form
 * @return null 
 */
function validate_form($filtered_input, &$form) {
    $success = true;
    // All the iput info stays in the field after submitting
//    var_dump($form['fields']);
    foreach ($form['fields'] as $field_id => &$field) {
        $field_input = $filtered_input[$field_id];
        // makes input field to stay filled after refershing page
        $field['value'] = $field_input;
        // if validate array has functions then calling function to check if the field is empty
        foreach (($field['validate'] ?? []) as $validator) {
            $is_valid = $validator($filtered_input[$field_id], $field); // same as => validate_not_empty($field_input, $field);
            // $is_valid will be false, if validator returns false
            if (!$is_valid) {
                $success = false;
                break;
            }
        }
    }

//    var_dump($success);
    if ($success) {
        foreach (($form['validators'] ?? []) as $validator_id => $validator) {
            if (is_array($validator)) {
                $is_valid = $validator_id($filtered_input, $form, $validator);
            } else {
                $is_valid = $validator($filtered_input, $form);
            }
            if (!$is_valid) {
                $success = false;
                break;
            }
        }
    }

//    var_dump($success);

    if ($success) {
        if (isset($form['callbacks']['success'])) {
            $form['callbacks']['success']($filtered_input, $form);
        }
    } else {
        if (isset($form['callbacks']['fail'])) {
            $form['callbacks']['fail']($filtered_input, $form);
        }
    }

    return $success;
}
