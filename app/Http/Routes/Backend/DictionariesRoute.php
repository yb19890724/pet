<?php

namespace App\Http\Routes\Backend;

use Illuminate\Contracts\Routing\Registrar;

class DictionariesRoute
{
    public function map(Registrar $router)
    {
        $router->get('/dictionary/{page}/{size}','Backend\DictionaryController@dictionaries');
        $router->post('/dictionary/type','Backend\DictionaryController@dictionaryTypeCreate');
        $router->delete('/dictionary/type/{id}','Backend\DictionaryController@dictionaryTypeDestroy');
        $router->put('/dictionary/type/{id}','Backend\DictionaryController@dictionaryTypeUpdate');
    }
}


