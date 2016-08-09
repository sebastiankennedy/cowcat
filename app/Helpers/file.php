<?php
if ( ! function_exists('get_dir_files')) {

    /**
     * 遍历文件目录,获取所有的文件路径
     *
     * @param $dir
     *
     * @return array
     */
    function get_dir_files($dir)
    {
        $files = [];

        if ( ! is_dir($dir)) {
            return $files;
        }

        $handle = opendir($dir);
        if ($handle) {
            while (false !== ($file = readdir($handle))) {
                if ($file != '.' && $file != '..') {
                    $filename = $dir . "/" . $file;
                    if (is_file($filename)) {
                        $files[] = $filename;
                    }
                    else {
                        $files = array_merge($files, get_dir_files($filename));
                    }
                }
            }   //  end while
            closedir($handle);
        }

        return $files;
    }
}

if ( ! function_exists('format_file_size')) {

    /**
     * 格式化文件尺寸
     *
     * @param     $bytes
     * @param int $decimals
     *
     * @return string
     */
    function format_file_size($bytes, $decimals = 2)
    {
        $size = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[ $factor ];
    }
}