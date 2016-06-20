<?php

namespace App\Repositories;

use App\Facades\MenuRepository;


/**
 * Action Model Repository
 */
class ActionRepository extends CommonRepository
{
    public function getActionsByRoutes($routes)
    {
        $menus = MenuRepository::lists('route', 'id')->toArray();

        $actions = $this->getAllActions()->toArray();
        foreach ($routes as $route) {
            if (in_array($route->getActionName(), config('cowcat.without-verification-actions'))) {
                continue;
            }

            if (array_key_exists('as', $route->getAction())) {
                if (in_array($route->getAction()['as'], $menus)) {
                    continue;
                }
            };

            $actions[] = $route->getActionName();
        }

        return array_unique($actions);
    }

    public function getAllActions()
    {
        return $this->model->lists('action', 'id');
    }
}
