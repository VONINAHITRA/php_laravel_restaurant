<?php namespace App\Repositories;

use App\Restaurant;
use App\Repositories\RestaurantRepository;

class RestaurantRepository {

	protected $model;

	public function __construct(Restaurant $restaurant)
	{
		$this->model = $restaurant;
	}

    public function getPaginate($n)
	{
		return $this->model->paginate($n);
	}

    public function getByIdWithDays($id)
	{
		return $this->model->with('days')->find($id);
	}
}