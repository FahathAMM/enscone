<div class="container-fluid mt-3">
    @section('title')
        {{ $title }}
    @endsection
    <div>
        {{-- <div class="container-fluid"> --}}
            <div class="row">
                <div class="col-lg-4 col-xl-3 p-0" >
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center mb-4">
                                @if ($avatar)
                                    <img class="mr-3" src="{{ $avatar->temporaryUrl() }}" width="80"
                                        height="80" alt="" style="border-radius: 50px;">
                                @else
                                    @if ($user->google_id)
                                        <img class="mr-3" src="{{ $user->avatar }}" width="80" height="80"
                                            alt="" style="border-radius: 50px;">
                                    @else
                                        <img class="mr-3" src="{{ asset('storage/' . $user->avatar) }}"
                                            width="80" height="80" alt="" style="border-radius: 50px;">
                                    @endif
                                @endif

                                <div class="media-body">
                                    <h3 class="mb-0" style="text-transform: uppercase">{{ $user->name }}
                                    </h3>
                                    <p class="text-muted mb-0">{{ $user->address }}</p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col">
                                    <div class="card card-profile text-center">
                                        <span class="mb-1 text-primary"><i class="icon-people"></i></span>
                                        <h3 class="mb-0">{{ $numberOfProfileViewed }}</h3>
                                        <p class="text-muted px-4">Viewers</p>
                                    </div>
                                </div>
                                {{-- <div class="col">
                                    <div class="card card-profile text-center">
                                        <span class="mb-1 text-warning"><i class="icon-user-follow"></i></span>
                                        <h3 class="mb-0">263</h3>
                                        <p class="text-muted">Followers</p>
                                    </div>
                                </div> --}}
                                <div class="col-12 text-center">
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-danger px-5">Dashboard</a>
                                </div>
                            </div>

                            <h4>About Me</h4>
                            <p class="text-muted" style="text-align: justify;">{{ $user->about_me }}</p>
                            <ul class="card-profile__info">
                                <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong>
                                    <span>{{ $user->mobile }}</span>
                                </li>
                                <li><strong class="text-dark mr-4">Email</strong> <span>{{ $user->email }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">

                    <div class="card">
                        <div class="card-body">
                            <h2>Personal Information</h2>
                            <div class="form-group">
                                <input wire:model.defer="name" class="form-control form-control-sm" type="text"
                                    placeholder="Name">
                                @error('name') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <input wire:model.defer="email" class="form-control form-control-sm" type="text"
                                    placeholder="Email">
                                @error('email') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <input wire:model.defer="mobile" class="form-control form-control-sm" type="text"
                                    placeholder="Mobile">
                                @error('mobile') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input wire:model.defer="avatar" type="file" class="custom-file-input">
                                    <label class="custom-file-label" style="z-index: 0;">Profile Image</label>
                                    @error('avatar') <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="progress mt-3" style="height: 10px">
                                    <div class="progress-bar gradient-1" style="width:{{ $width }}%;"
                                        role="progressbar">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input wire:model.defer="address" class="form-control form-control-sm" type="text"
                                    placeholder="Address">
                                @error('address') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="form-group">
                                <textarea wire:model.defer="about_me" class="form-control form-control-sm" type="text"
                                    placeholder="About" style="height: 100px"></textarea>
                                @error('about_me') <label class="text-danger">{{ $message }}</label> @enderror
                            </div>
                            <div class="d-flex align-items-center">
                                <button wire:click="changePersonal" type="button"
                                    class="btn btn-primary px-3 ml-4">Change</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form class="form-profile">
                                <h2>Change Password</h2>
                                <div class="form-group">
                                    <input wire:model.defer="old_password" class="form-control form-control-sm"
                                        type="password" placeholder="old Password" required>
                                </div>
                                <div class="form-group">
                                    <input wire:model.defer="new_password" class="form-control form-control-sm"
                                        type="password" placeholder="New Password" required>
                                    <label class="text-danger">{{ $errorMessage }}</label>

                                </div>
                                <div class="d-flex align-items-center">
                                    <button wire:click="changePassword" type="button"
                                        class="btn btn-primary px-3 ml-4">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        {{-- </div> --}}
    </div>
    <x-alert />
</div>
