@extends('layouts.admin')
@section('content')
<style type="text/css">
tr {
    line-height: 25px;
    min-height: 25px;
    height: 25px;
}

<style>#desc {
    width: 20% !important;
}

nav {
    background-color: transparent !important;
}

.dt-buttons {
    margin-top: 10px;

}

.dt-buttons {
    background: #167ee6 !important;
    font-weight: bold;

}

.buttons-html5 {
    background: #167ee6 !important;
    font-weight: bold;

}

.buttons-print {
    background: #167ee6 !important;
    font-weight: bold;

}
</style>

</style>
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{asset('/admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="{{route('view.add.event',['action'=>'addEvent'])}}"> Add New Event</a>
            </li>
            <li class="active-bre"><a href="{{route('view.all.events')}}"> All Events</a>
            </li>



        </ul>
    </div>
    <div class="sb2-2-1">
        <h2>All Events</h2>
        <div class="table-responsive">
            <table class="table" id="Event_Table">
                <thead>
                    <tr>
                        <th class="text-center font-weight-bold text-primary">Event Type</th>
                        <th class="text-center font-weight-bold text-primary">Activity Name</th>
                        <th class="text-center font-weight-bold text-primary">City</th>
                        <th class="text-center font-weight-bold text-primary">Category</th>
                        <th class="text-center font-weight-bold text-primary" style="width: 200px;">Image</th>
                        <th class="text-center font-weight-bold text-primary">Tour Code</th>
                        <th class="text-center font-weight-bold text-primary">Discount</th>
                        {{-- <th class="text-center font-weight-bold text-primary">Location</th> --}}
                        <th class="text-center font-weight-bold text-primary">Price</th>

                        {{-- <th class="text-center font-weight-bold text-primary">Date</th> --}}
                        <th class="text-center font-weight-bold text-primary">Operations</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($All_Events as $key=>$item)
                    <tr>
                        <td class="text-center" style="vertical-align:middle;">{{$item->event_type}}</td>
                        <td class="text-center" style="vertical-align:middle;">{{$item->event_name}}</td>
                        <td class="text-center" style="vertical-align:middle;">
                            @foreach($item->Event_Cities as $key=>$city)
                            {{$city->name}}<br>
                            @endforeach
                        </td>
                        <td class="text-center" style="vertical-align:middle;"> @foreach($item->Event_Categories as
                            $key=>$cat)
                            {{$cat->name}}<br>
                            @endforeach</td>
                        <td class="text-center" style="vertical-align:middle;"><img
                                src="{{str_replace('http://localhost:8000/public/','http://localhost:8000/',$item->banner)}}"
                                alt="{{$item->event_name}}" class="img" style="width: 100%;height: 120px"></td>
                        {{-- <td class="text-center"style="vertical-align:middle;">{{$item->country}}</td> --}}
                        <td class="text-center" style="vertical-align:middle;">{{$item->tour_code}}</td>
                        <td class="text-center" style="vertical-align:middle;">{{$item->discount}}</td>
                        {{-- <td class="text-center"style="vertical-align:middle;">{{$item->loc}}</td> --}}
                        <td class="text-center" style="vertical-align:middle;">{{$item->price}}</td>
                        {{-- <td class="text-center"style="vertical-align:middle;">{{$item->date}}</td> --}}
                        <td class="text-center" style="vertical-align:middle;"><a
                                href="{{ url('view_update_event/updateEvent')}}/{{$item->id}}" class="sb2-2-1-edit"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <i onclick="confirm_delete('{{$item->id}}')"
                                href="{{  url('delete_event') }}/{{ $item->id }}" class="sb2-2-1-edit"><i
                                    class="fa fa-trash-o" aria-hidden="true"></i></i>
                            <a href="{{  url('event_detail') }}/{{ $item->id }}" target="_blank" class="sb2-2-1-edit"><i
                                    class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>





                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">

                <div class="col-md-12">
                    {{$All_Events->links()}}
                </div>

            </div>
        </div>
    </div>
</div>
<script>
function confirm_delete(id) {
    let c = confirm("Do you want to delete this Event?");
    if (c === true) {
        window.location.href = "{{url('delete_event')}}/" + id;
    }
}
</script>
@endsection