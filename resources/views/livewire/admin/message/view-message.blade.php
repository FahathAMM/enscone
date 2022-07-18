<div>
    @section('title')
        {{ $title }}
    @endsection
    <style>
        .load-spinner {
            position: absolute;
            top: 300px;
            right: 167px;
            left: 800px;
            z-index: 1500;
            width: 100px;
            height: 100px;
        }

    </style>

    <div wire:loading class="spinner-border load-spinner text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="email-left-box">
                        <a href="email-compose.html" class="btn btn-primary btn-block">Compose</a>
                        <div class="mail-list mt-4"><a id="btn-inbox" style="cursor:pointer;"
                                class="list-group-item border-0 text-primary p-r-0">
                                <i class="fa fa-inbox font-18 align-middle mr-2"></i>
                                <b>Inbox</b>
                                <span class="badge badge-primary badge-sm float-right m-t-5" style=" height: 21px;">
                                    <livewire:admin.message.message-counts />
                                </span>
                            </a>
                            <a class="btn-other" href="#" class="list-group-item border-0 p-r-0">
                                <i class="fa fa-paper-plane font-18 align-middle mr-2"></i>Sent</a> <a  class="btn-other" href="#"
                                class="list-group-item border-0 p-r-0">
                                <i class="fa fa-star-o font-18 align-middle mr-2"></i>Important <span
                                    class="badge badge-danger badge-sm float-right m-t-5">47</span> </a>
                            <a  class="btn-other" href="#" class="list-group-item border-0 p-r-0"><i
                                    class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft</a><a  class="btn-other" href="#"
                                class="list-group-item border-0 p-r-0"><i
                                    class="fa fa-trash font-18 align-middle mr-2"></i>Trash</a>
                        </div>
                        <h5 class="mt-5 m-b-10">Categories</h5>
                        <div  class="btn-other" class="list-group mail-list">
                            <a href="#" class="list-group-item border-0">
                                <span class="fa fa-briefcase f-s-14 mr-2"> </span>
                                Work
                            </a>
                            <a href="#" class="list-group-item border-0">
                                <span class="fa fa-sellsy f-s-14 mr-2"> </span>
                                Private
                            </a>
                            <a href="#" class="list-group-item border-0">
                                <span class="fa fa-ticket f-s-14 mr-2"> </span>
                                Support
                            </a>
                            <a href="#" class="list-group-item border-0">
                                <span class="fa fa-tags f-s-14 mr-2"> </span>
                                Social
                            </a>
                        </div>
                    </div>
                    <div class="email-right-box">
                        <div class="toolbar" role="toolbar">
                            <div class="btn-group m-b-20">
                                <button type="button" class="btn btn-light"><i class="fa fa-archive"></i>
                                </button>
                                <button type="button" class="btn btn-light"><i class="fa fa-exclamation-circle"></i>
                                </button>
                                <button wire:click="delete('{{ $messages->id }}')" type="button"
                                    class="btn btn-light">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                            <div class="btn-group m-b-20">
                                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i
                                        class="fa fa-folder"></i> <b class="caret m-l-5"></b>
                                </button>
                                <div class="dropdown-menu"><a class="dropdown-item"
                                        href="javascript: void(0);">Social</a> <a class="dropdown-item"
                                        href="javascript: void(0);">Promotions</a> <a class="dropdown-item"
                                        href="javascript: void(0);">Updates</a>
                                    <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                </div>
                            </div>
                            <div class="btn-group m-b-20">
                                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i
                                        class="fa fa-tag"></i> <b class="caret m-l-5"></b>
                                </button>
                                <div class="dropdown-menu"><a class="dropdown-item"
                                        href="javascript: void(0);">Updates</a> <a class="dropdown-item"
                                        href="javascript: void(0);">Promotions</a>
                                    <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                </div>
                            </div>
                            <div class="btn-group m-b-20">
                                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">More
                                    <span class="caret m-l-5"></span>
                                </button>
                                <div class="dropdown-menu"><a class="dropdown-item" href="javascript: void(0);">Mark
                                        as Unread</a> <a class="dropdown-item" href="javascript: void(0);">Add to
                                        Tasks</a> <a class="dropdown-item" href="javascript: void(0);">Add Star</a> <a
                                        class="dropdown-item" href="javascript: void(0);">Mute</a>
                                </div>
                            </div>
                        </div>
                        <div class="read-content">

                            <div id="view-message" style=" display: {{ $type == 1 }}? 'block' : none ">
                                <div class="media pt-5">
                                    <img class="mr-3 rounded-circle"
                                        src="https://cdn3.iconfinder.com/data/icons/glypho-generic-icons/64/user-man-circle-invert-512.png"
                                        style="  width: 90px; margin-top:-20px; ">
                                    <div class="media-body">
                                        <h5 class="m-b-3">{{ $messages->name }}</h5>
                                        <p class="m-b-2">{{ $messages->created_at }}</p>
                                    </div>

                                </div>
                                <hr>
                                <div class="media mb-4 mt-1">
                                    <div class="media-body">
                                        <span class="float-right">
                                            {{ Carbon\Carbon::createFromTimeString($messages->created_at)->diffForHumans('') }}
                                        </span>
                                        <h4 class="m-0 text-primary">{{ $messages->title }}</h4><small
                                            class="text-muted">To:Me,{{ $messages->email }}</small>
                                    </div>
                                </div>
                                <h5 class="m-b-15">Hi,{{ $user->name }},</h5>
                                {{ $messages->message }}
                                <h5 class="m-b-5 mt-4 p-t-15">Kind Regards</h5>
                                <p>{{ $messages->name }}</p>
                                <hr>
                                <h6 class="p-t-15"><i class="fa fa-download mb-2"></i> Attachments
                                    <span>(3)</span>
                                </h6>
                                <div class="row m-b-30">
                                    <div class="col-auto"><a href="#" class="text-muted">My-Photo.png</a>
                                    </div>
                                    <div class="col-auto"><a href="#" class="text-muted">My-File.docx</a>
                                    </div>
                                    <div class="col-auto"><a href="#" class="text-muted">My-Resume.pdf</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group p-t-15">
                                    <textarea class="w-100 p-20 l-border-1" name="" id="" cols="30" rows="5"
                                        placeholder="It's really an amazing.I want to know more about it..!"></textarea>
                                </div>
                            </div>

                            <div id="inbox" style="display:none">
                                <livewire:admin.message.inbox />
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primaryw-md m-b-30" type="button">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            $('document').ready(function() {
                $('#btn-inbox').click(function() {
                    // alert('d');
                    $('#view-message').css("display", "none");
                    $('#inbox').css("display", "block");
                })

                $('.btn-other').click(function() {
                    alert('coming soon');

                })

            });
        </script>
    @endpush

</div>
