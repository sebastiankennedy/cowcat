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

			if($condition !== '='){
				$condition = 'where'.ucfirst($condition);
				$this->model = $this->model->$condition($field,$value);
			}else{
				$this->model = $this->model->where($field,$condition,$value);
			}
		}

		return $this->model->paginate(50);
	}
}
