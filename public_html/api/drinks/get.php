<?php

require '../../../bootloader.php';

$modelDrinks = new \App\Drinks\Model();

$response_array = $modelDrinks->get($_POST);

if (is_array($response_array)) {
    $result_array['status'] = 'success';
    foreach ($response_array as $value) {
        $result_array['data'][] = $value->getData();
    }
} else {
    $result_array['status'] = 'failed';
}

//var_dump($result_array);

$response = json_encode($result_array);

print $response;

//var_dump($result_array);
//$response_array = [
//    
//    'satus' => 'success/fail',
//    'data' => [
//        [
//            'name' => 'vodka',
//            'amount_ml' => 700,
//            'abarot' => 40,
//            'image' => 'urlvodka',
//        ],
//        
//        [
//            'name' => 'beer',
//            'amount_ml' => 500,
//            'abarot' => 4,
//            'image' => 'urlbeer',
//        ],
//        
//    ]
//];



