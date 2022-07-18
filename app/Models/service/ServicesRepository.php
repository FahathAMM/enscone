<?php

namespace App\Models\service;

use App\Models\BaseRepository;
use App\Models\customer\Customer;
use App\Models\service\services;

class ServicesRepository  extends BaseRepository
{
    protected $model;

    public function __construct(services $model)
    {
        $this->model = $model;
    }
}
