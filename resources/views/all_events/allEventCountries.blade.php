@extends('layouts.admin')

@section('content')


<style>
#desc {
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


<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{asset('/admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>

            <li class="active-bre"><a href="{{route('view.add.country',['action'=>'add'])}}"> <b>Add Event Country</b>
                </a></li>
            <li class="active-bre"><a href="{{route('view.all.countries')}}">All Event Countries </a></li>


        </ul>
    </div>
    <div class="sb2-2-1">
        <h2>All Event Countries</h2>
        <table class="table" id="Country_Table">
            <thead>
                <tr>
                    <th style="width: 2%" class="text-primary text-center font-weight-bold">#</th>
                    <th style="width: 20%" class="text-primary text-center font-weight-bold"> Name</th>
                    {{-- <th>Visible For </th> --}}
                    <th style="width: 20%" class="text-primary text-center font-weight-bold">Icon</th>
                    <th style="width: 20%" class="text-primary text-center font-weight-bold">Image</th>
                    <th class="text-primary text-center font-weight-bold">Created at</th>
                    <th class="text-primary text-center font-weight-bold">Edit</th>
                    <th class="text-primary text-center font-weight-bold">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Event_Country as $key=>$item)
                <tr>
                    <td class="text-center" style="vertical-align:middle;">{{++$key}}</td>
                    <td class="text-center" style="vertical-align:middle;">{{$item->name}}</td>
                    {{--
                        <td>
                            @if($item->for == '0')
                             All Events
                            @elseif($item->for == '1')
                             Activities
                            @elseif($item->for == '2')
                             Packages
                             @elseif($item->for == '3')
                             Transfers
                             @elseif($item->for == '4')
                             Daytours
                            @elseif($item->for == '5')
                             Cruises
                    @endif</td>
                    --}}
                    <td class="text-center " style="vertical-align:middle;">
                        <img src="{{$item->description}}" alt="{{$item->description}}" class="img img-thumbnail"
                            style="width: 150px; height:125px">
                    </td>
                    <td class="text-center" style="vertical-align:middle;">
                        <!-- <div class="col-sm-12"> -->
                        <img src="{{$item->image}}" alt="{{$item->name}}" class="img" style="width: 100%;height: 150px">
                        <!-- </div>-->
                    </td>
                    <td class="text-center" style="vertical-align:middle;">{{$item->created_at}}</td>
                    <td class="text-center" style="vertical-align:middle;"><a
                            href="{{route('view.update.eventcountry',['action'=>'update','id'=>$item->id])}}"
                            class="sb2-2-1-edit"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                    </td>
                    <td class="text-center" style="vertical-align:middle;">
                        <i href="{{  url('delete/event_country') }}/{{ $item->id }}"
                            onclick="confirm_delete('{{$item->id}}')" class="sb2-2-1-edit"><i
                                class="fa fa-trash-o fa-2x" aria-hidden="true"></i></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">

            <div class="col-md-12">
                {{$Event_Country->links()}}
            </div>

        </div>
    </div>
</div>

<script>
function confirm_delete(id) {
    let c = confirm("Do you want to delete this Event Country?");
    if (c === true) {
        window.location.href = "{{url('delete/event_country')}}/" + id;
    }
}
</script>

@endsection