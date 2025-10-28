<?php

use BlakvGhost\PHPValidator\Validator;
use BlakvGhost\PHPValidator\ValidatorException;

$validator = new Validator($data, $rules, $messages);

try{
    if($validator->isValid()) {
        echo 'Alle Daten sind in Ordnung...<br>';
    }
    else {
        $errors = $validator->getErrors();
        echo '<pre>';
        print_r($errors);
        echo '</pre>';
    }
}
catch(ValidatorException $e) {
    echo $e->getMessage().'<br>';
}