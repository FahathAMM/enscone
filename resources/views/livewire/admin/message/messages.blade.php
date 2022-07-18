<ul wifre:poll.keep-alive>
    <div>{{ $gg }}</div>
    @forelse ($messages as $message )
        <li>
            <a href="{{ route('Portfolio.message', ['message' => $message->id]) }}">
                <img class="float-left mr-3 avatar-img"
                    src="https://www.pngitem.com/pimgs/m/570-5702670_message-icon-circle-teal-hd-png-download.png"
                    alt="">
                <div class="notification-content">
                    <div class="notification-heading">{{ $message->name }}</div>
                    <div class="notification-timestamp">
                        {{ Carbon\Carbon::createFromTimeString($message->created_at)->diffForHumans('') }}
                    </div>
                    <div class="notification-text">
                        {{ Str::limit($message->message, 40, '...') }}
                    </div>
                </div>
            </a>
        </li>
    @empty
    @endforelse
</ul>
