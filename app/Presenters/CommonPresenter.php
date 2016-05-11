<?php

namespace App\Presenters;

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
     * 格式化版权归属
     *
     * @param  string $param
     *
     * @return string
     */
    public function showCopyright()
    {
        return ' <strong>Copyright © ' . date('Y') . ' <a href="#">CowCat</a>.</strong> All rights reserved.';
    }
}
