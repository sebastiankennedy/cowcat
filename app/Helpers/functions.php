<?php
if (!function_exists('two_dimensional_array_unique')) {
    /**
     * 移除二维数组中指定键名重复的值
     * @param [array]   $array
     * @param [string]  $key
     *
     * @return [array]
     */
    function two_dimensional_array_unique($array, $key)
    {
        $i = 0;
        $key_array = array();
        $temp_array = array();

        foreach ($array as $value) {
            if (!in_array($value[$key], $key_array)) {
                $key_array[$i] = $value[$key];
                $temp_array[$i] = $value;
            }
            $i++;
        }

        return $temp_array;
    }
}

if (!function_exists('array_random')) {
    /**
     * 随机返回数组中的值
     * @param [array] $array
     *
     * @return mixed
     */
    function array_random($array)
    {
        return $array[array_rand($array)];
    }
}

if (!function_exists('two_dimensional_array_sort')) {
    /**
     * 二维数组排序
     * @param  [array]  $array
     * @param  [string] $on
     * @param  [string] $order
     *
     * @return [array]
     */
    function two_dimensional_array_sort($array, $on, $order = SORT_ASC)
    {
        $new_array = array();
        $sortable_array = array();
        $on = (string)$on;
        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                break;
                case SORT_DESC:
                    arsort($sortable_array);
                break;
            }

            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }
}

function create_level_tree($data, $parent_id = 0, $level = 0, $html = '-')
{
    $tree = [];
    foreach ($data as $key => $value) {
        $value['html'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level);
        $value['html'].= $level === 0 ? "" : '|';
        $value['html'].= str_repeat($html, $level);

        if ($value['parent_id'] == $parent_id) {
            $tree[] = $value;
            $tree = array_merge($tree, create_level_tree($data, $value['id'], $level+1));
        }
    }

    return $tree;
}
