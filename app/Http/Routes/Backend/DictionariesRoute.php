<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

class DictionariesRoute
{
    public function map(Registrar $router)
    {
        $router->get('/dictionaries/{page}/{size}','DictionariesController@dictionaries');
        $router->post('/dictionary/type','DictionariesController@dictionaryCreate');
        $router->delete('/dictionary/type/{id}','DictionariesController@dictionaryDestroy');
        $router->put('/dictionary/type/{id}','DictionariesController@dictionaryUpdate');
    }
}


