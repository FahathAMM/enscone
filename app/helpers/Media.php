<?php

namespace App\helpers;

class Media
{

    public static function imageUpload($folder, $items, $fileName)
    {
        $path = $fileName->store($folder, 'public');
        $items->img = $path;
        $items->save();
    }

    public static function viewImage($path = null, $w = null, $h = null, $alt = null, $id = null, $class = null)
    {
        if (!is_null($path)) {
            $path =  asset('storage/' . $path);
            return  " <img src='$path' width='$w' height='$h' height='$id' height='$class'  alt='$alt'>";
        } else {
            return 'no image';
        }
    }
}
