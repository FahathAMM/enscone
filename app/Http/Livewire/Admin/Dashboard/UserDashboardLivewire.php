<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserDashboardLivewire extends Component
{
    public function render()
    {
//         $value = 58;
// dd(round($value, 2));
   
        $user                = User::find(Auth::user()->id);
        $orders    = DB::table('orders')->count();
        $allGrantTotals    = DB::table('orders')->sum('grand_total');
        $customers     = DB::table('customers')->count();
        $services      = DB::table('services')->count();
 
        // ->distinct('type')->get(['type'])

        $numberOfProfileViewed = DB::table('devices')->where('user_id', $user->id)->distinct('latest_ip_address')->count();

        return view(
            'livewire.admin.dashboard.user-dashboard-livewire',
            [
                'customers'       => $customers,
                'orders'      => $orders,
                'services'        => $services,
                'allGrantTotals'   => $allGrantTotals,
                // 'numberOfProfileViewed' => $numberOfProfileViewed,
                'title'                 => config('app.name') . '|' . 'User-Dashboard',
            ]
        )->extends('layouts.app');
    }
}
