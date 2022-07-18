<?php

namespace App\Models\Category;

use App\helpers\Media;
use App\Models\BaseRepository;
use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryRepository  extends BaseRepository
{
    protected $model;

    public function __construct(Category $model)
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
