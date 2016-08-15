<?php
if ( ! function_exists('is_image')) {

    /**
     *  判断文件的MIME类型是否为图片
     *
     * @param $mimeType
     *
     * @return bool
     */
    function is_image($mimeType)
    {
        return starts_with($mimeType, 'image/');
    }
}
