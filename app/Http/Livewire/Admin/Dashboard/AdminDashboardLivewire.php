<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Message;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AdminDashboardLivewire extends Component
{
    public function render()
    {
        $numberOfUsers    = User::count();
        $numberOfProjects = Project::count();
        $numberOfMessage  = Message::count();
        $numberOfRoles    = Role::count();
        $PeopleVisited    = DB::table('devices')->distinct('latest_ip_address')->get();

        return view('livewire.admin.dashboard.admin-dashboard-livewire', [
            'numberOfUsers'    => $numberOfUsers,
            'numberOfMessage'  => $numberOfMessage,
            'numberOfRoles'    => $numberOfRoles,
            'title'            => config('app.name') . '|' . 'Admin-Dashboard',
            'numberOfProjects' => $numberOfProjects,
            'PeopleVisited'    => $PeopleVisited,
        ]
        )->extends('layouts.app');
    }
}
