'use strict';

const formData = new FormData();

formData.append('name', 'Testas');
formData.append('amount_ml', '500');
formData.append('abarot', '10');
formData.append('image', 'freepngdownload.com\/image\/thumb\/sprite-png-free-download-10.png');
formData.append('action', 'insert');

console.log('formData');

//fetch('api.php')
//        .then(response => response.json())
//        .then(data => console.log(data));


fetch('index.php', {
    method: 'POST',
    body: formData
})
        .then(response => response.text());


