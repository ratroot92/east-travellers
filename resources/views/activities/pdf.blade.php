<p>{{ $Event->event_type }}</p>
<p>{{ $Event->event_name }}</p>
<p>{{$Event->description }}</p>
<p>{{ $Event->banner}}</p>

<img src="{{ $Event->banner }}" style="width: 200px; height: 200px">

<div class="banner_book_1">
    <ul>
        <li class="dl2">Location :@if ($Event->Event_Cities->count() > 1)
                Multiple Cities
            @else
                @foreach ($Event->Event_Cities as $item)
                    {{ $item->name }}
                @endforeach
            @endif
        </li>
        <li class="dl2">Price : €{{ $Event->price }}</li>
        <li class="dl2">Duration : {{ $Event->duration }}</li>
    </ul>
</div>
