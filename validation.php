<?php

require_once 'vendor/autoload.php';

$rules = [
    'email' => 'required|email',
    'name' => 'required|string|min:2|max:30',
    'count' => 'required|numeric|size:3',
    'msg' => 'string|max:200'
];

$messages = [
    'email' => [
        'required' => 'Die Email ist Pflicht!',
        'email' => 'Das ist keine E-Mail-Adresse!'
    ]
];

if(count($_POST)) {
    $data = $_POST;
    $tpl = 'data.tpl.php';
}
else {
    $tpl = 'form.tpl.php';
}

include 'templates/standard.tpl.php';