<?php

namespace App\Repositories;

use App\Facades\MenuRepository;
use ReflectionClass;

/**
 */
class PermissionRepository extends CommonRepository
{
    public function getAllMenusTreeByPermission($permission)
    {
        $data = [];
        $menus = MenuRepository::getAllMenusLists();
        $permissions = $permission->menus()->lists('id')->toArray();

        foreach ($menus as $key => $menu) {
            $data[$key]['id'] = $menu['id'];
            $data[$key]['pId'] = $menu['parent_id'];
            $data[$key]['name'] = $menu['name'];
            $data[$key]['open'] = true;
            $data[$key]['value'] = 1;
            if (in_array($menu['id'], $permissions)) {
                $data[$key]['checked'] = true;
            }
        }

        return $data;
    }

    public function getAllActionsByPermission($permission)
    {
        $dirs = [];
        foreach (config('cowcat.authorize-directory') as $path) {
            $dirs[] = app_path() . '/Http/Controllers/' . $path;
        }

        $files = [];
        foreach ($dirs as $dir) {
            $files = array_merge($files, get_dir_files($dir));
        }

        dump($dirs);
        dump($files);
//        dump($array);
//        $path = app_path() . '/Http/Controllers/backend';
//        $files = get_dir_files($path);
//        $app = [];
//        foreach ($files as $file) {
//            $app[] = explode('/app/', $file);
//        }

//        foreach ($app as $item) {
//            $tmp = "/App/" . $item[1];
//            $tmp = str_replace('/', "\\", $tmp);
//            $tmp = str_replace('.php', "", $tmp);
//            $controllers[] = $tmp;
//        }
//
//        foreach($controllers as $controller){
//            $item = new ReflectionClass($controller);
//            $methods = $item->getMethods();
//           foreach($methods as $method){
//               $doc = new \ReflectionMethod($controller,$method->name);
//           }
//        }
    }
}
