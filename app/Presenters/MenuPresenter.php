<?php

namespace App\Presenters;

use App\Traits\Presenter\BasePresenterTrait;

/**
* Menu View Presenters
*/
class MenuPresenter extends CommonPresenter
{
    use  BasePresenterTrait;

    /**
     * 格式化显示隐藏状态
     *
     * @param  int $status
     *
     * @return string
     */
    public function showDisplayFormat($status)
    {
        if($status){
            return "隐藏";
        }else{
            return "显示";
        }
    }
}
