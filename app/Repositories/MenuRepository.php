<?php

namespace App\Repositories;

/**
* Menu Model Repository
*/
class MenuRepository extends CommonRepository
{
	public function getMenusPaginateByCondition($inputs)
	{
		foreach($inputs as $input){
			list($field,$condition,$value) = $input;

			if($condition === 'between'){
				$this->model = $this->model->whereBetween($field,$value);
			}else{
				$this->model = $this->model->where($field,$condition,$value);
			}
		}

		return $this->model->paginate(50);
	}
}
