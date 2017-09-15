<?php

namespace App\Listeners;

use App\Events\DictionariesModelEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DictionariesModelEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DictionariesModelEvent  $event
     * @return void
     */
    public function handle(DictionariesModelEvent $event)
    {
        $dictionariesAll=$event->dictionaries->fetchALL('dictionaries_all')->toArray();
        $fileStringNumber=create_config('dictionary.php',generateTree($dictionariesAll));
    }
}
