<?php

namespace App\Presenters;

use Cache;

/**
* Menu View Presenters
*/
abstract class CommonPresenter
{
    /**
     * 格式化时间
     *
     * @param  int $unixTime
     *
     * @return string
     */
    public function showDateFormat($unixTime)
    {

    }

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

    /**
     * 格式化版权归属
     *
     * @param  string $param
     *
     * @return string
     */
    public function showCopyright()
    {
        return ' <strong>Copyright © '.date('Y').' <a href="#">CowCat</a>.</strong> All rights reserved.';
    }
}
