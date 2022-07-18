<?php

namespace App\Http\Controllers\frontend\manage;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('frontend.home.index');
    }

}
