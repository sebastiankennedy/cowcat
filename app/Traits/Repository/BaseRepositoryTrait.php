<?php

namespace App\Traits\Repository;

trait BaseRepositoryTrait
{
    /**
     * Create a new model.
     *
     * @param array $input
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $input)
    {
        $model = $this->model;

        return $model::create($input);
    }

    /**
     * Update the model By id.
     *
     * @param int   $id
     * @param array $input
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateById($id, array $input)
    {
        $model = $this->model;

        return $model::whereId($id)->update($input);
    }

    /**
     * Find an existing model.
     *
     * @param int      $id
     * @param string[] $columns
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id, array $columns = ['*'])
    {
        $model = $this->model;

        return $model::find($id, $columns);
    }

    /**
     * Find all models.
     *
     * @param string[] $columns
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(array $columns = ['*'])
    {
        $model = $this->model;

        return $model::all($columns);
    }

    /**
     * Get a list of the models.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $model = $this->model;

        if (property_exists($model, 'order')) {
            return $model::orderBy($model::$order, $model::$sort)->get($model::$index);
        }

        return $model::get($model::$index);
    }


    /**
     * Get the number of rows.
     *
     * @return int
     */
    public function count()
    {
        $model = $this->model;

        return $model::where('id', '>=', 1)->count();
    }

    /**
     * Validate the data.
     *
     * @param array           $data
     * @param string|string[] $rules
     * @param bool            $custom
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validate(array $data, $rules = null, $custom = false)
    {
        if ( ! $custom) {
            $rules = $this->rules($rules);
        }

        return $this->validator->make($data, $rules);
    }

    public function paginate($limit, array $columns = ['*'])
    {
        $model = $this->model;

        return $model::paginate($limit, $columns);
    }

    public function getByWhere(array $where, $columns = ['*'])
    {
        $model = $this->model;

        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                $this->model = $this->model->where($field, $condition, $val);
            } else {
                $this->model = $this->model->where($field, '=', $value);
            }
        }

        return $model->get($columns);
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

        if ( ! empty($where)) {
            foreach ($where as $field => $value) {
                if (is_array($value)) {
                    list($field, $condition, $val) = $value;
                    if ($condition !== '=') {
                        $condition = 'where' . ucfirst($condition);
                        $model = $model->$condition($field, $val);
                    } else {
                        $model = $model->where($field, $condition, $val);
                    }
                } else {
                    $model = $model->where($field, '=', $value);
                }
            }
        }

        return $model->paginate($limit,$columns);
    }

    public function lists($value,$key){

    }


    public function destroy($id)
    {
        $model = $this->model;

        return $model::destroy($id);
    }
}
