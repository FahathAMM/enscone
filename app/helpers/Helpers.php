<?php

namespace App\helpers;

use App\Models\Category\Category;

function get_categories()
{
    return Category::select('name', 'id')->get();
}
