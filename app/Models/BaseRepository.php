<?php

namespace App\Models;

use App\helpers\Media;
use App\Models\Category\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Models\baseinterface\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaseRepository  implements BaseRepositoryInterface
{

    public function __construct()
    {
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function search($q, $page = null, $orderBy = null, $categoryBy = null)
    {
        if (!is_null($page)) {
            $items = $this->model;
        } else {
            $items = $this->model->query();
        }

        if (!is_null($q)) {
            $items =  $items->where('name', 'Like', '%' . $q . '%');
        }

        if (!is_null($orderBy)) {
            $items =  $items->orderBy(isset($orderby) ? $orderby : 'id', $orderBy);
        }

        if (!is_null($categoryBy)) {
            $items = $items->whereHas('category', function ($query) use ($categoryBy) {
                $query->where('id', $categoryBy);
            });
        }

        if (!is_null($page)) {
            return $items->paginate($page)->withQueryString();
        } else {
            return $items->get();
        }


        // if (is_null($page)) {
        //     return $this->model->where('name', 'Like', '%' . $request->q . '%')->get();
        // } else if (!is_null($orderBy)) {
        //     return $this->model->where('name', 'Like', '%' . $request->q . '%')->orderBy(isset($request->orderby) ? $request->orderby : 'id', $orderBy)->paginate($page)->withQueryString();
        // } else if (!is_null($categoryBy)) {
        //     return $this->model->where('name', 'Like', '%' . $request->q . '%')->orderBy(isset($request->orderby) ? $request->orderby : 'id', $orderBy)->paginate($page)->withQueryString();
        // } else {
        //     return $this->model->where('name', 'Like', '%' . $request->q . '%')->paginate($page)->withQueryString();
        //     // return $this->model->where('name', 'Like', '%' . $request->q . '%')->get();
        // }
    }

    public function paginate($page = 20)
    {
        return $this->model->paginate($page)->withQueryString();
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail();
    }


    public function create($collection)
    {
        return  $this->model->create($collection);
    }

    public function orderBy($request, $collection)
    {

        return  $collection->orderBy('id', 'desc')->get();

        $orderBy = $request->orderBy;

        if ($orderBy == 'sortBy') {
            return $collection->$orderBy($request->shortBy);
        } else if ($orderBy == 'sortDesc') {
            return $collection->$orderBy();
        }
    }


    public function createWithAlertMessage($collection = [], $alertMessage = [])
    {
        if ($alertMessage != []) {
            request()->session()->flash($alertMessage[0], $alertMessage[1]);
        }
        return $this->model->create($collection);
    }

    public function imageUpload($items, $folder, $fileName)
    {
        if (!is_null($fileName)) {
            Media::imageUpload($folder, $items, $fileName);
        }
    }

    public function createOrUpdate($id = null, $collection = [])
    {
        ddd($this->model);

        if (is_null($id)) {
            $user = new User;
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->password = Hash::make('password');
            return $user->save();
        }
        $user = User::find($id);
        $user->name = $collection['name'];
        $user->email = $collection['email'];
        return $user->save();
    }
}
