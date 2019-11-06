<?php

function html_attr($form_array) {
    $new_print_array = [];
    foreach ($form_array as $key => $value) {
        $new_print_array[] = "$key = \"$value\"";
    }
    return $string = implode(' ', $new_print_array);
}
