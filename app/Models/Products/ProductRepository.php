<?php

namespace App\Models\products;

use App\Models\BaseRepository;

class ProductRepository extends BaseRepository
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}
