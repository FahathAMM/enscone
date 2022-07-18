<div>
    @section('title')
        {{ $title }}
    @endsection
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Orders</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $orders }}</h2>
                        <a href="#" class="text-white mb-0">Number of Details Single View</a>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-reorder"></i></span>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">All Totals</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $allGrantTotals }}.00</h2>
                        <a href="#" class="text-white mb-0">Number of Details Single View</a>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-dollar"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Customers</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $customers }}</h2>
                        <a href="#" class="text-white mb-0">Number of Details Single View</a>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">services </h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $services }}</h2>
                        <a href="#" class="text-white mb-0">Number of Details Single View</a>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-truck"></i></span>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white"> Number Of Viewed Your Profile </h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $numberOfProfileViewed }}</h2>
                        <a href="#" class="text-white mb-0">Profile Viewers in the Past days</a>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>


        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Number of Place Work </h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $numberOfProfileViewed }}</h2>
                        <a href="#" class="text-white mb-0">Number of Details Single View</a>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-briefcase"></i></span>
                </div>
            </div>
        </div>
    </div> --}}
</div>
