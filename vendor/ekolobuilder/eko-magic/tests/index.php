<?php
require __DIR__ . '/../vendor/autoload.php';

use Ekolo\EkoMagic\ParameterBag;

class Test extends ParameterBag
{

    public function __construct()
    {
        parent::__construct([
            'id' => '1',
            'nom' => 'Etokila',
            'prenom' => 'Diani',
            'sexe' => 'M'
        ]);
    }
}

$test = new Test;
$test->add([
    'professession' => 'Medecin'
]);

// echo $test->get('professession');
// print_r($test->keys());

// echo $test->get('professession');

echo $test->professession();
