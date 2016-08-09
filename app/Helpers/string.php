<?php
if ( ! function_exists('startsWith')) {
    function startsWith($haystack, $needle)
    {
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
    }
}

if ( ! function_exists('endsWith')) {
    function endsWith($haystack, $needle)
    {
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle,
                $temp) !== false);
    }
}

