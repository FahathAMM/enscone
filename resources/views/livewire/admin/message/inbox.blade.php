<div>


    <div class="email-list m-t-15 mt-4">

        @forelse ($messages as $message)
            <div class="message">
                <a href="{{ route('Portfolio.message', ['message' => $message->id]) }}">
                    <div class="col-mail col-mail-1">
                        <div class="email-checkbox">
                            <input type="checkbox" id="chk2">
                            <label class="toggle" for="chk2"></label>
                        </div><span class="star-toggle ti-star"></span>
                    </div>
                    <div class="col-mail col-mail-2">
                        @if ($message->isRead == 0)
                            <div class="subject"><strong>{{ $message->title }}, {{ $message->message }}</strong></div>
                            <div class="date" style="width:270px">
                                <strong>{{ $message->created_at->toDayDateTimeString() }}</strong></div>
                        @else
                            <div class="subject">{{ $message->title }}, {{ $message->message }}</div>
                            <div class="date" style="width:270px">
                                {{ $message->created_at->toDayDateTimeString() }}</div>
                        @endif
                    </div>
                </a>
            </div>
        @empty
        @endforelse

    </div>
</div>
