<div>
    @section('title')
        {{ $title }}
    @endsection
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Users</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $numberOfUsers }}</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Messages</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $numberOfMessage }}</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-envelope"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Projects</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $numberOfProjects }}</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Roles</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $numberOfRoles }}</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="active-member">
                        <div class="table-responsive">
                            <table class="table table-xs mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>device_type</th>
                                        <th>browser</th>
                                        <th>platform</th>
                                        <th>platform_version</th>
                                        <th>latest_ip_address</th>
                                        <th>Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($PeopleVisited as $key => $People )
                                        <tr>

                                            <td>{{ ++$key }}</td>
                                            <td>{{ $People->device_type }}</td>
                                            <td>
                                                <span>{{ $People->browser }}</span>
                                            </td>
                                            <td>
                                                {{ $People->platform }}
                                            </td>
                                            <td>
                                                {{ $People->platform_version }}
                                            </td>
                                            <td>
                                                {{ $People->latest_ip_address }}
                                            </td>
                                            <td>
                                                <span>Last Active</span>
                                                <span class="m-0 pl-3">
                                                    {{ Carbon\Carbon::createFromTimeString($People->created_at)->diffForHumans() }}
                                            </td>

                                        </tr>
                                    @empty

                                    @endforelse

                                    {{-- <tr>
                                        <td><img src="./images/avatar/2.jpg" class=" rounded-circle mr-3" alt="">Walter R.</td>
                                        <td>Pixel 2</td>
                                        <td><span>Canada</span></td>
                                        <td>
                                            <div>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-success" style="width: 50%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                        <td>
                                            <span>Last Login</span>
                                            <span class="m-0 pl-3">50 sec ago</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/3.jpg" class=" rounded-circle mr-3" alt="">Andrew D.</td>
                                        <td>OnePlus</td>
                                        <td><span>Germany</span></td>
                                        <td>
                                            <div>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-warning" style="width: 50%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                        <td>
                                            <span>Last Login</span>
                                            <span class="m-0 pl-3">10 sec ago</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/6.jpg" class=" rounded-circle mr-3" alt=""> Megan S.</td>
                                        <td>Galaxy</td>
                                        <td><span>Japan</span></td>
                                        <td>
                                            <div>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-success" style="width: 50%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                        <td>
                                            <span>Last Login</span>
                                            <span class="m-0 pl-3">10 sec ago</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/4.jpg" class=" rounded-circle mr-3" alt=""> Doris R.</td>
                                        <td>Moto Z2</td>
                                        <td><span>England</span></td>
                                        <td>
                                            <div>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-success" style="width: 50%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><i class="fa fa-circle-o text-success  mr-2"></i> Paid</td>
                                        <td>
                                            <span>Last Login</span>
                                            <span class="m-0 pl-3">10 sec ago</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="./images/avatar/5.jpg" class=" rounded-circle mr-3" alt="">Elizabeth W.</td>
                                        <td>Notebook Asus</td>
                                        <td><span>China</span></td>
                                        <td>
                                            <div>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar bg-warning" style="width: 50%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><i class="fa fa-circle-o text-warning  mr-2"></i> Pending</td>
                                        <td>
                                            <span>Last Login</span>
                                            <span class="m-0 pl-3">10 sec ago</span>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
