<?php

namespace App\Models\customer;

use App\Models\BaseRepository;
use App\Models\customer\Customer;

class CustomerRepository  extends BaseRepository
{
    protected $model;

    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    // public function imageUpload($request, $items)
    // {
    //     if ($request->has('category_image')) {
    //         $folder = 'category';
    //         Media::imageUpload($request, $folder, $items);
    //     }
    // }
}
