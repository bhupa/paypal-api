<?php

namespace App\Repositories;


//use Your Model

/**
 * Class BaseRepository.
 */
class BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    protected $model;


    public function getAll()
    {
        return $this->query()->get();
    }

    /**
     * Get Paginated.
     *
     * @param $per_page
     * @param string $active
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getPaginated($per_page, $active = '', $order_by = 'id', $sort = 'asc')
    {
        if ($active) {
            return $this->query()->where('status', $active)
                ->orderBy($order_by, $sort)
                ->paginate($per_page);
        } else {
            return $this->query()->orderBy($order_by, $sort)
                ->paginate($per_page);
        }
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->query()->count();
    }

    /**
     * @param $id
     *
     * @return mixed
     */


    /**
     * @return mixed
     */
    public function query()
    {
        return call_user_func(static::MODEL.'::query');
    }



    public function with($with=[])
    {
        return $this->model->with($with);
    }

    public function all() {
        return $this->model->all();
    }

    public function allWith($with=[]) {
        return $this->with($with)->get();
    }

    public function paginate($paginate) {
        return $this->model->paginate($paginate);
    }

    public function where($field, $comparator, $value=null) {
        if(is_null($value)) {
            return $this->model->where($field, $comparator);
        }
        return $this->model->where($field, $comparator, $value);
    }


    public function count() {
        return $this->model->count();
    }

    public function find($id) {
        return $this->model->find($id);
    }

    public function findWith($id, $with=[]) {
        return $this->with($with)->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }



    public function update($id, $data)
    {
        $record = $this->model->findOrFail($id);
//        $data['updated_by'] = auth()->id();
        $record->fill($data)->save();
        return $record;
    }

    public function destroy($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function findByField($field, $value = null, $columns = ['*'])
    {
        return $this->model->where($field, '=', $value)->first($columns);
    }

    public function orderBy($field, $type='ASC')
    {
        return $this->model->orderBy($field, $type);
    }


    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function firstOrFail()
    {
        return $this->model->firstOrFail();
    }

    public function whereNotNull($field)
    {
        return $this->model->whereNotNull($field);
    }

    /*public function lists($field1, $field2)
    {
        return $this->model->lists($field1, $field2);
    }*/

    public function get($data = [])
    {
        return $this->model->get($data);
    }

    public function save()
    {
        return $this->model->save();
    }

    public function max($field)
    {
        return $this->model->max($field);
    }
    public function changeStatus($id, $status)
    {
        $update = $this->model->findOrFail($id);
        $inputs['is_active'] = (int)$status;
        $update->fill($inputs)->save();
        return $update;
    }
    public function firstOrCreate($data){
        return $this->model->firstOrCreate($data);
    }
    public function firstOrNew($data){
        return $this->model->firstOrNew($data);
    }
    public function insert($data){
        return $this->model->insert($data);
    }
    public function updateOrCreate($data){
        return $this->model->updateOrCreate($data);
    }
    public function latest($data){
        return $this->model->latest()->take($data)->get();
    }

    public function latestFirst(){
        return $this->model->latest()->first();
    }
    public function orWhere($column, $operator, $value)
    {
        return $this->model->orWhere($column, $operator, $value);
    }

    public function orWhereBetween($column, $range)
    {
        return $this->model->orWhereBetween($column, $range);
    }

    public function whereBetween($column, $range)
    {
        return $this->model->whereBetween($column, $range);
    }

    public function where_array($array)
    {
        return $this->model->where($array);
    }

    public function whereIn($column, $array)
    {
        return $this->model->whereIn($column, $array);
    }
    public function whereNotIn($column, $array)
    {
        return $this->model->whereNotIn($column, $array);
    }

    public function whereNull($column)
    {
        return $this->model->whereNull($column);
    }
    public function whereMonth($column,$date)
    {
        return $this->model->whereMonth($column,$date);
    }



}
