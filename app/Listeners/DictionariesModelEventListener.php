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
        $dictionariesAll=$event->dictionaries->dictionariesAll('dictionaries_all')->toArray();
        $fileStringNumber=create_config('dictionary.php',$this->createDictionariesContent($dictionariesAll));
    }

    //生成字典字符串
    private function createDictionariesContent($dictionariesAll)
    {
        $result="[]";
        $dictionariesContent=generateTree($dictionariesAll);
        if(!empty($dictionariesContent)){
            $result="[";
            foreach($dictionariesContent as $key=>$value){
                $result.="\n\t'{$value['code']}'=>[";
                $subArray="";
                if(!empty($value['sub'])){//如果有下一级
                    foreach($value['sub'] as $k=>$v){
                        $subArray.="\n\t\t'{$v['code']}'=>'{$v['name']}',";
                    }
                }
                $result.=$subArray."\n\t],";
            }
            $result.="\n]";
        }
        return $result;
    }

    //是否,号拼接
    /*private function isComma()
    {
        return
    }*/
}
