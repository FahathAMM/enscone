<div>
    @section('title')
        {{ config('app.name') . '|' . $user->name }}
    @endsection

    @include('livewire.frontend.auth.login')

    <div>
        <i id="arrow" class="fa fa-arrow-circle-up"
            style="font-size:100px;position:fixed;width:100%;bottom:0;left:1465px;display:none;z-index:1500000">
        </i>
    </div>

    <div class="pt-table">
        <div class="pt-tablecell page-home relative"
            style="background-image: url('{{ asset('frontend/img/banner.jpg') }}');">
            <div class="overlay"></div>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                        <div class="page-title home text-center">
                            {{-- <img src="{{ asset('frontend/img/phantom.png') }}" alt=""> --}}
                            {{-- <p>A product designer from England, who focuses on interactive design &amp; A freelance
                                designer focusing on typography &amp; clean interfaces. Also works in Google.</p> --}}
                            <p>
                                <button class="btn btn-primary" onclick="copyToClipboard('#p1')" type="button">
                                    Generate Your Link
                                </button>
                            </p>
                            <p style="display: none" id="p1">{{ url()->current() }}</p>
                        </div>

                        <div class="hexagon-menu clear">
                            <div class="hexagon-item">
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <a id="ff" class="hex-content">
                                    <span class="hex-content-inner">
                                        <span class="icon">
                                            <i class="tf-dial"></i>
                                        </span>
                                        <span class="title">Welcome</span>
                                    </span>
                                    <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                            fill="#1e2530"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="hexagon-item">
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <a id="btnabout" class="hex-content">
                                    <span class="hex-content-inner">
                                        <span class="icon">
                                            <i class="tf-profile-male"></i>
                                        </span>
                                        <span class="title">About</span>
                                    </span>
                                    <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                            fill="#1e2530"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="hexagon-item">
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <a id="btnservice" class="hex-content">
                                    <span class="hex-content-inner">
                                        <span class="icon">
                                            <i class="tf-tools-2"></i>
                                        </span>
                                        <span class="title">Services</span>
                                    </span>
                                    <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                            fill="#1e2530"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="hexagon-item">
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <a id="btnresume" class="hex-content">
                                    <span class="hex-content-inner">
                                        <span class="icon">
                                            <i class="tf-tools"></i>
                                        </span>
                                        <span class="title">Resume</span>
                                    </span>
                                    <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                            fill="#1e2530"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="hexagon-item">
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <a id="btnworks" class="hex-content">
                                    <span class="hex-content-inner">
                                        <span class="icon">
                                            <i class="tf-briefcase2"></i>
                                        </span>
                                        <span class="title">Works</span>
                                    </span>
                                    <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                            fill="#1e2530"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="hexagon-item">
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <a href="#" class="hex-content">
                                    <span class="hex-content-inner">
                                        <span class="icon">
                                            <i class="tf-chat"></i>
                                        </span>
                                        <span class="title">Testimonials</span>
                                    </span>
                                    <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                            fill="#1e2530"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="hexagon-item">
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="hex-item">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <a id="btncontact" class="hex-content">
                                    <span class="hex-content-inner">
                                        <span class="icon">
                                            <i class="tf-envelope2"></i>
                                        </span>
                                        <span class="title">Contact</span>
                                    </span>
                                    <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z"
                                            fill="#1e2530"></path>
                                    </svg>
                                </a>
                            </div>
                        </div> <!-- /.hexagon-menu -->
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.pt-tablecell -->
    </div> <!-- /.pt-table -->


    {{-- =====================================About us=================================================================== --}}
    <div id="divabout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-offset-1 col-md-12 col-lg-offset-0 col-lg-12">
                    <div class="page-title text-center">
                        <h2>About <span class="primary">me</span>
                            <span class="title-bg">{{ $user->name }}</span>
                        </h2>
                        <p>{{ $user->about_me }}</p>
                    </div>
                </div>

                <div class="col-xs-12 col-md-12">
                    <div class="about-author">
                        <figure class="author-thumb profile-img-radius">
                            @if ($user->google_id)
                                <img src="{{ $user->avatar }}" class="profile-img-radius" height="150" width="200"
                                    alt="">
                            @else
                                <img src="{{ asset('storage/' . $user->avatar) }}" class="profile-img-radius"
                                    height="150" width="200" alt="">
                            @endif

                        </figure> <!-- /.author-bio -->
                        <div class="author-desc">
                            <table>
                                @forelse ($user->abouts as $about)
                                    <tr>
                                        <td>
                                            <span class="primary about-text"><b>{{ $about->keys }} </b></span>
                                        </td>
                                        <td>
                                            <p><b>&nbsp;:&nbsp;</b></p>
                                        </td>
                                        <td>
                                            <p> &nbsp;{{ $about->value }}</p>
                                        </td>
                                    </tr>
                                @empty
                                    <p>no data</p>
                                @endforelse
                            </table>

                        </div>
                        <!-- /.author-desc -->
                    </div> <!-- /.about-author -->
                    {{-- <p>I'm a multi-award winning designer that has been specialising in web design for the past three
                        years
                        although I have experience in branding and print.Projects.</p> --}}
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
        <div class="row m-size">
            <div class="col-xs-12 col-md-3">
                <div class="section-title clear">
                    <h3>Skills</h3>
                </div>
                <h5 class="text-center skill-head">WebApplication</h5>
                <div class="skill-wrapper">
                    @forelse ($user->skills->where('category', 'Web Application') as $skill)
                        <div class="progress clear">
                            <div class="skill-name">{{ $skill->name }}</div>
                            <div class="skill-bar">
                                <div class="bar"></div>
                            </div>
                            <div class="skill-lavel" data-skill-value="{{ $skill->level }}%"></div>
                        </div> <!-- /.progress -->
                    @empty
                        <div class="progress clear">
                            <div class="skill-name">no data</div>
                            <div class="skill-bar">
                                <div class="bar"></div>
                            </div>
                            <div class="skill-lavel" data-skill-value="0%"></div>
                        </div> <!-- /.progress -->
                    @endforelse
                </div> <!-- /.skill-wrapper -->
            </div> <!-- /.col -->

            <div class="col-xs-12 col-md-3">
                <div class="section-title clear">
                    <h3>Skills</h3>
                </div>
                <h5 class="text-center skill-head">Desktop Application</h5>
                <div class="skill-wrapper">
                    @forelse ($user->skills->where('category', 'Desktop Application') as $skill)
                        {{-- <p>{{ $skill->skip(1)}}</p> --}}
                        <div class="progress clear">
                            <div class="skill-name">{{ $skill->name }}</div>
                            <div class="skill-bar">
                                <div class="bar"></div>
                            </div>
                            <div class="skill-lavel" data-skill-value="{{ $skill->level }}%"></div>
                        </div> <!-- /.progress -->
                    @empty
                        <div class="progress clear">
                            <div class="skill-name">no data</div>
                            <div class="skill-bar">
                                <div class="bar"></div>
                            </div>
                            <div class="skill-lavel" data-skill-value="0%"></div>
                        </div> <!-- /.progress -->
                    @endforelse
                </div> <!-- /.skill-wrapper -->
            </div> <!-- /.col -->

            <div class="col-xs-12 col-md-3">
                <div class="section-title clear">
                    <h3>Skills</h3>
                </div>
                <h5 class="text-center skill-head">Database System</h5>
                <div class="skill-wrapper">
                    @forelse ($user->skills->where('category', 'Database System') as $skill)
                        <div class="progress clear">
                            <div class="skill-name">{{ $skill->name }}</div>
                            <div class="skill-bar">
                                <div class="bar"></div>
                            </div>
                            <div class="skill-lavel" data-skill-value="{{ $skill->level }}%"></div>
                        </div> <!-- /.progress -->
                    @empty
                        <div class="progress clear">
                            <div class="skill-name">no data</div>
                            <div class="skill-bar">
                                <div class="bar"></div>
                            </div>
                            <div class="skill-lavel" data-skill-value="0%"></div>
                        </div> <!-- /.progress -->
                    @endforelse

                </div> <!-- /.skill-wrapper -->
            </div> <!-- /.col -->

            <div class="col-xs-12 col-md-3">
                <div class="section-title clear">
                    <h3>Skills</h3>
                </div>
                <h5 class="text-center skill-head">Another Skills</h5>
                <div class="skill-wrapper">
                    @forelse ($user->skills->where('category', 'Another Skills') as $skill)
                        <div class="progress clear">
                            <div class="skill-name">{{ $skill->name }}</div>
                            <div class="skill-bar">
                                <div class="bar"></div>
                            </div>
                            <div class="skill-lavel" data-skill-value="{{ $skill->level }}%"></div>
                        </div> <!-- /.progress -->
                    @empty
                        <div class="progress clear">
                            <div class="skill-name">no data</div>
                            <div class="skill-bar">
                                <div class="bar"></div>
                            </div>
                            <div class="skill-lavel" data-skill-value="0%"></div>
                        </div> <!-- /.progress -->
                    @endforelse
                </div> <!-- /.skill-wrapper -->
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div>
    {{-- =====================================end About us=================================================================== --}}


    <hr style="width:80%;border-color:{{ $user->color }};">
    {{-- =====================================Service=================================================================== --}}
    <div id="divservice">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-offset-1 col-lg-10">
                    <div class="page-title text-center">
                        <h2>Awesome <span class="primary">Services</span>
                            <span class="title-bg">{{ $user->name }}</span>
                        </h2>
                        <p>{{ $user->about_me }}.</p>
                    </div>
                    <div class="hexagon-menu services clear">
                        @foreach ($user->services as $service)
                            <div class="service-hex" style="width:25%">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 372 424.5"
                                    style="enable-background:new 0 0 372 424.5;" xml:space="preserve">
                                    <g>
                                        <polygon class="st0"
                                            points="359.9,314.1 186.9,414 14,314.1 14,114.4 186.9,14.6 359.9,114.4" />
                                        <polygon class="st1"
                                            points="331.2,297.6 186.9,380.9 42.6,297.6 42.6,131 186.9,47.6 331.2,131" />
                                    </g>
                                </svg>
                                <div class="content" style="padding:25px;">
                                    <div class="icon">
                                        <i class="et-line icon-lightbulb"></i>
                                    </div>
                                    <h4>{{ $service->name }}</h4>
                                    <p style="f6ont-size: 8px">{{ $service->description }}.</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>

    {{-- =====================================end Service=================================================================== --}}


    <hr style="width:80%;border-color:{{ $user->color }};">
    {{-- =====================================Resume=================================================================== --}}
    <div id="divresume" class="container">
        <div class="row">
            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                <div class="page-title text-center">
                    <h2>My <span class="primary">history</span> <span
                            class="title-bg">{{ $user->name }}</span>
                    </h2>
                    <p>{{ $user->about_me }}</p>
                </div>
            </div>
        </div> <!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="history-block">
                    <div class="section-title light clear">
                        <h3>Education</h3>
                    </div>
                    <!-- /.section-title -->
                    <div class="history-scroller">
                        @foreach ($user->educations()->orderBy('start', 'DESC')->get()
    as $education)
                            <div class="history-item">
                                <div class="history-icon">
                                    <span class="history-hex"></span>
                                    <i class="tf-documents5"></i>
                                </div>
                                <div class="history-text">
                                    <h5>{{ $education->institute }}</h5>
                                    <span style="color:white">{{ $education->name }}</span> -
                                    <span>{{ $education->start }} - {{ $education->end }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> <!-- /.history-block -->
            </div> <!-- /.col -->
            <div class="col-xs-12 col-sm-6">
                <div class="history-block">
                    <div class="section-title light clear">
                        <h3>Experiences</h3>
                    </div>
                    <!-- /.section-title -->
                    <div class="history-scroller">
                        @foreach ($user->experiences()->orderBy('start', 'DESC')->get()
    as $experience)
                            <div class="history-item">
                                <div class="history-icon">
                                    <span class="history-hex"></span>
                                    <i class="tf-documents5"></i>
                                </div>
                                <div class="history-text">
                                    <h5>{{ $experience->name }}</h5>
                                    <span style="color: white;font-size:14px">{{ $experience->position }}</span> -
                                    <span>{{ $experience->start }} - {{ $experience->end }}</span><br>
                                    <label style="font-size:12px;line-height:1;color:white"
                                        for="">{{ $experience->description }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> <!-- /.history-block -->
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->

    {{-- =====================================end Resume=================================================================== --}}

    {{-- =====================================works=================================================================== --}}
    <hr style="width:80%;border-color:{{ $user->color }};">
    <div id="divworks" class="container  mt-5">
        <div class="row">
            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                <div class="page-title text-center">
                    <h2>My <span class="primary">works</span> <span class="title-bg">works</span></h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                        tincidunt
                        ut laoreet dolore magna aliquam erat volutpat.
                    </p>
                </div>
            </div>
        </div> <!-- /.row -->

        <div class="row">
            <div class="col-xs-12">
                <ul class="filter list-inline">
                    <li><a href="#" class="active" data-filter="*">All</a></li>
                    @forelse ($user->projects()->distinct('type')->get(['type']) as $project)
                        <li><a href="#" data-filter=".{{ $project->type }}">
                                {{ str_replace('_', ' ', strtoupper($project->type)) }}
                            </a>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="row isotope-gutter">
            @forelse ($user->projects as $project)
                <div class="col-xs-12 col-sm-6 col-md-4 {{ $project->type }}">
                    <figure class="works-item">
                        <h4 class="text-center">{{ $project->name }}</h4>
                        <img src="https://www.publichealthnotes.com/wp-content/uploads/2020/03/project-planning-header@2x.png"
                            alt="">
                        <div class="overlay"></div>
                        <figcaption class="works-inner">
                            <h4>{{ $project->name }}</h4>
                            <h6>
                                <a href='{{ $project->link }}' target="blank">
                                    {{ $project->link != '' ? ' Click to Link' : '' }}
                                </a>
                            </h6>
                            <p title="{{ $project->description }}">
                                {{ Str::limit($project->description, 40, '...') }}</p>
                        </figcaption>
                    </figure>
                </div>
            @empty
            @endforelse
        </div> <!-- /.row -->
    </div> <!-- /.container -->



    {{-- =====================================end works=================================================================== --}}


    <hr style="width:80%;border-color:{{ $user->color }};">
    {{-- =====================================contact us=================================================================== --}}
    <div id="divcontact">
        <div class="container mt-5">
            <div class="row">
                <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                    <div class="page-title text-center">
                        <h2>Get in <span class="primary">touch</span> <span
                                class="title-bg">Contact</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                            tincidunt
                            ut laoreet dolore magna aliquam erat volutpat.</p>
                    </div>
                </div>
            </div> <!-- /.row -->

            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-12 col-lg-4">
                    @forelse ($user->contacts->take(3) as $contact)
                        <div class="contact-block">
                            <div class="media">
                                <div class="media-left">
                                    <i class="{{ $contact->icon }}"></i>
                                </div>
                                <div class="media-body">
                                    <h4>{{ $contact->name }}</h4>
                                    @if ($contact->icon == 'fa fa-fw fa-mobile' || $contact->icon == 'fa fa-skype')
                                        <p><a>{{ $contact->value }}</a></p>
                                    @else
                                        <p><a href="{{ $contact->value }}">{{ $contact->value }}</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                    <ul class="contact-social">
                        @forelse ($user->contacts->skip(3) as $contact)
                            <li>
                                <span class="contact-social-hex"></span>
                                @if ($contact->icon == 'fa fa-fw fa-mobile' || $contact->icon == 'fa fa-skype')
                                    <a><i class="{{ $contact->icon }}"></i></a>
                                @else
                                    <a href="{{ $contact->value }}"><i class="{{ $contact->icon }}"></i></a>
                                @endif
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
                <livewire:frontend.message.messages-livewire :username="$username" :userid="$userid" />
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>
    {{-- =====================================end contact us=================================================================== --}}



    <script>
        $('document').ready(function() {

            $("#btnabout").click(function() {
                $('#arrow').css('display', 'block');
                $('html, body').animate({
                    scrollTop: $("#divabout").offset().top
                }, 1000);
            });

            $("#btnservice").click(function() {
                $('#arrow').css('display', 'block');
                $('html, body').animate({
                    scrollTop: $("#divservice").offset().top
                }, 1000);
            });

            $("#btnresume").click(function() {
                $('#arrow').css('display', 'block');
                $('html, body').animate({
                    scrollTop: $("#divresume").offset().top
                }, 1000);
            });

            $("#btncontact").click(function() {
                $('#arrow').css('display', 'block');
                $('html, body').animate({
                    scrollTop: $("#divcontact").offset().top
                }, 1000);
            });

            $("#btnworks").click(function() {
                $('#arrow').css('display', 'block');
                $('html, body').animate({
                    scrollTop: $("#divworks").offset().top
                }, 1000);
            });

            $("#arrow").click(function() {
                $('#arrow').css('display', 'none');
                $('html, body').animate({
                    scrollTop: $(".pt-table").offset().top
                }, 1000);
            });
        })

        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();

            alert('Successfully Generated');
        }
    </script>
</div>
