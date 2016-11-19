<?php

namespace App\Traits\Repository;

trait BaseRepositoryTrait
{
    public function validate(array $data, $rules = null, $custom = false)
    {
        if( ! $custom){
            $rules = $this->rules($rules);
        }

        return $this->validator->make($data, $rules);
    }

    public function create(array $input)
    {
        $model = $this->model;

        return $model::create($input);
    }

    public function saveById($id, array $data)
    {
        $item = self::find($id);

        foreach ($data as $key => $value) {
            $item->$key = $value;
        }

        return $item->save();
    }

    public function find($id, array $columns = ['*'])
    {
        $model = $this->model;

        return $model::find($id, $columns);
    }

    public function updateById($id, array $input)
    {
        $model = $this->model;

        return $model::where($this->model->getKeyName(), $id)->update($input);
    }

    public function all(array $columns = ['*'])
    {
        $model = $this->model;

        return $model::all($columns);
    }

    public function index()
    {
        $model = $this->model;

        if(property_exists($model, 'order')){
            return $model::orderBy($model::$order, $model::$sort)->get($model::$index);
        }

        return $model::get($model::$index);
    }

    public function count()
    {
        $model = $this->model;

        return $model::where($this->model->getKeyName(), '>=', 1)->count();
    }

    public function paginate($limit, array $columns = ['*'])
    {
        $model = $this->model;

        return $model::paginate($limit, $columns);
    }

    public function updateByWhere(array $where, $data)
    {
        $model = $this->model;
        try {
            if( ! empty($where)){
                foreach ($where as $field => $value) {
                    if(is_array($value)){

                        if(count($value) == 3){
                            list($field, $condition, $val) = $value;
                        } else {
                            list($condition, $val) = $value;
                        }

                        if(in_array($condition, ['=', '>', '<', '>=', '<=', '<>', '!=', 'like'])){
                            $model = $model->where($field, $condition, $val);
                        } elseif($condition == 'null') {
                            $condition = 'where' . ucfirst($condition);
                            $model = $model->$condition($field);
                        } elseif($condition == 'not null') {
                            $map = explode(' ', $condition);
                            $condition = 'where' . ucfirst($map[0]) . ucfirst($map[1]);
                            $model = $model->$condition($field);
                        } elseif(in_array($condition, ['between', 'in'])) {
                            $condition = 'where' . ucfirst($condition);
                            $model = $model->$condition($field, $val);
                        } elseif(in_array($condition, ['not between', 'not in'])) {
                            $map = explode(' ', $condition);
                            $condition = 'where' . ucfirst($map[0]) . ucfirst($map[1]);
                            $model = $model->$condition($field, $value);
                        } else {
                            throw new Exception("请输入正确的查询条件");
                        }
                    } else {
                        $model = $model->where($field, '=', $value);
                    }
                }
            }

            return $model->update($data);
        }
        catch (\Exception $e) {
            dump($e->getMessage());
            exit;
        }
    }

    public function firstByWhere(array $where, $columns = ['*'])
    {
        $model = $this->model;
        try {
            if( ! empty($where)){
                foreach ($where as $field => $value) {
                    if(is_array($value)){

                        if(count($value) == 3){
                            list($field, $condition, $val) = $value;
                        } else {
                            list($condition, $val) = $value;
                        }

                        if(in_array($condition, ['=', '>', '<', '>=', '<=', '<>', '!=', 'like'])){
                            $model = $model->where($field, $condition, $val);
                        } elseif($condition == 'null') {
                            $condition = 'where' . ucfirst($condition);
                            $model = $model->$condition($field);
                        } elseif($condition == 'not null') {
                            $map = explode(' ', $condition);
                            $condition = 'where' . ucfirst($map[0]) . ucfirst($map[1]);
                            $model = $model->$condition($field);
                        } elseif(in_array($condition, ['between', 'in'])) {
                            $condition = 'where' . ucfirst($condition);
                            $model = $model->$condition($field, $val);
                        } elseif(in_array($condition, ['not between', 'not in'])) {
                            $map = explode(' ', $condition);
                            $condition = 'where' . ucfirst($map[0]) . ucfirst($map[1]);
                            $model = $model->$condition($field, $value);
                        } else {
                            throw new Exception("请输入正确的查询条件");
                        }
                    } else {
                        $model = $model->where($field, '=', $value);
                    }
                }
            }

            return $model->first($columns);
        }
        catch (\Exception $e) {
            dump($e->getMessage());
            exit;
        }
    }

    public function getByWhere(array $where, $columns = ['*'])
    {
        $model = $this->model;
        try {
            if( ! empty($where)){
                foreach ($where as $field => $value) {
                    if(is_array($value)){

                        if(count($value) == 3){
                            list($field, $condition, $val) = $value;
                        } else {
                            list($condition, $val) = $value;
                        }

                        if(in_array($condition, ['=', '>', '<', '>=', '<=', '<>', '!=', 'like'])){
                            $model = $model->where($field, $condition, $val);
                        } elseif($condition == 'null') {
                            $condition = 'where' . ucfirst($condition);
                            $model = $model->$condition($field);
                        } elseif($condition == 'not null') {
                            $map = explode(' ', $condition);
                            $condition = 'where' . ucfirst($map[0]) . ucfirst($map[1]);
                            $model = $model->$condition($field);
                        } elseif(in_array($condition, ['between', 'in'])) {
                            $condition = 'where' . ucfirst($condition);
                            $model = $model->$condition($field, $val);
                        } elseif(in_array($condition, ['not between', 'not in'])) {
                            $map = explode(' ', $condition);
                            $condition = 'where' . ucfirst($map[0]) . ucfirst($map[1]);
                            $model = $model->$condition($field, $value);
                        } else {
                            throw new Exception("请输入正确的查询条件");
                        }
                    } else {
                        $model = $model->where($field, '=', $value);
                    }
                }
            }

            return $model->get($columns);
        }
        catch (\Exception $e) {
            dump($e->getMessage());
            exit;
        }
    }

    public function getByWhereIn($field, array $value, $columns = ['*'])
    {
        $model = $this->model;

        return $model->whereIn($field, $value)->get($columns);
    }

    public function getByWhereNotIn($field, array $value, $columns = ['*'])
    {
        $model = $this->model;

        return $model->whereIn($field, $value)->get($columns);
    }

    public function paginateWhere($where, $limit, $columns = ['*'])
    {
        $model = $this->model;
        try {
            if( ! empty($where)){
                foreach ($where as $field => $value) {
                    if(is_array($value)){

                        if(count($value) == 3){
                            list($field, $condition, $val) = $value;
                        } else {
                            list($condition, $val) = $value;
                        }

                        if(in_array($condition, ['=', '>', '<', '>=', '<=', '<>', '!=', 'like'])){
                            $model = $model->where($field, $condition, $val);
                        } elseif($condition == 'null') {
                            $condition = 'where' . ucfirst($condition);
                            $model = $model->$condition($field);
                        } elseif($condition == 'not null') {
                            $map = explode(' ', $condition);
                            $condition = 'where' . ucfirst($map[0]) . ucfirst($map[1]);
                            $model = $model->$condition($field);
                        } elseif(in_array($condition, ['between', 'in'])) {
                            $condition = 'where' . ucfirst($condition);
                            $model = $model->$condition($field, $val);
                        } elseif(in_array($condition, ['not between', 'not in'])) {
                            $map = explode(' ', $condition);
                            $condition = 'where' . ucfirst($map[0]) . ucfirst($map[1]);
                            $model = $model->$condition($field, $value);
                        } else {
                            throw new Exception("请输入正确的查询条件");
                        }
                    } else {
                        $model = $model->where($field, '=', $value);
                    }
                }
            }

            return $model->paginate($limit, $columns);
        }
        catch (\Exception $e) {
            dump($e->getMessage());
            exit;
        }
    }

    public function lists($value, $key)
    {
        $model = $this->model;

        return $model->lists($value, $key);
    }

    public function destroy($id)
    {
        $model = $this->model;

        return $model::destroy($id);
    }


}
