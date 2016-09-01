<?php
if( ! function_exists('starts_with')){
    function starts_with($haystack, $needle)
    {
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
    }
}

if( ! function_exists('ends_with')){
    function ends_with($haystack, $needle)
    {
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
    }
}

if( ! function_exists('get_diff_time')){
    function get_diff_time($timestamp)
    {
        $datetime = new DateTime(date('Y-m-d H:i:s', $timestamp));
        $datetime_now = new DateTime();
        $interval = $datetime_now->diff($datetime);
        list($y, $m, $d, $h, $i, $s) = explode('-', $interval->format('%y-%m-%d-%h-%i-%s'));
        if((($result = $y) && ($suffix = '年前')) ||
            (($result = $m) && ($suffix = '月前')) ||
            (($result = $d) && ($suffix = '天前')) ||
            (($result = $h) && ($suffix = '小时前')) ||
            (($result = $i) && ($suffix = '分钟前')) ||
            (($result = $s) && ($suffix = '刚刚'))
        ){
            return $suffix != '刚刚' ? $result . $suffix : $suffix;
        }
    }
}
