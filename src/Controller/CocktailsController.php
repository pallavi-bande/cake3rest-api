<?php
namespace App\Controller;

use App\Controller\AppController;

class CocktailsController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        
        'sortWhitelist' => [
            'id', 'name', 'description'
        ]
    ];
}