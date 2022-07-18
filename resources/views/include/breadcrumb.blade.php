<ul class="breadcrumb">
    <li><a href="#">Dashboard</a></li>
    @if (isset($previousPage))
        @for ($i = 0; $i < count($previousPage); $i++)
            <li> <a href="{{ route($previousPage[$i][$i]) }}">{{ $previousPage[$i][1] }}</a></li>
        @endfor
    @endif
    <li> {{ $currentPage[0] }}</li>

</ul>
