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
        $key_array = [];
        $temp_array = [];

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
        $new_array = [];
        $sortable_array = [];
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
if (!function_exists('create_level_tree')) {
    function create_level_tree($data, $parent_id = 0, $level = 0, $html = '-')
    {
        $tree = [];
        foreach ($data as $item) {
            $item['html'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level);
            $item['html'].= $level === 0 ? "" : '|';
            $item['html'].= str_repeat($html, $level);

            if ($item['parent_id'] == $parent_id) {
                $tree[] = $item;
                $tree = array_merge($tree, create_level_tree($data, $item['id'], $level+1));
            }
        }

        return $tree;
    }
}
if (!function_exists('create_node_tree')) {
    function create_node_tree($data, $parent_id = 0, $name = 'child')
    {
        $tree = [];

        foreach ($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $item[$name] = create_node_tree($data, $item['id']);
                $tree[] = $item;
            }
        }

        return $tree;
    }
}
if (!function_exists('getParentsByChildId')) {
    function getParentsByChildId($data, $child_id)
    {
        $arr = [];
        foreach ($data as $item) {
            if ($data['id'] == $child_id) {
                $arr[] = $item;
                $arr = array_merge($arr, getParentsByChildId($data, $item['parent_id']));
            }
        }

        return $arr;
    }
}
if (!function_exists('getChildsByParentId')) {
    function getChildsByParentId($data, $parent_id)
    {
        $arr = [];
        foreach ($data as $item) {
            if ($data['parent_id'] == $parent_id) {
                $arr[] = $item;
                $arr = array_merge($arr, getChildsByParentId($data, $item['parent_id']));
            }
        }
        return $arr;
    }
}
