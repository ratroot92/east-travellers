@extends('layouts.admin')

@section('content')

    <style>

        #desc{
  width: 20%!important;
        }
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
            <li class="active-bre"><a href="{{route('view.add.city',['action'=>'add'])}}">Add Event City </a></li>
            <li class="active-bre"><a href="{{route('view.all.cities')}}">All Event Cities </a></li>
            <li class="active-bre"><a href="{{route('view.add.country',['action'=>'add'])}}">Add Event Country </a></li>
            <li class="active-bre"><a href="{{route('view.all.countries')}}">All Event Countries </a></li>


        </ul>
        </div>
        <div class="sb2-2-1">
            <h2>All Event Cities</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>City Name</th>
                  {{--   <th>Visible For </th> --}}
                    <th id="desc">Description</th>
                    <th>Image</th>
                     <th>Created at</th>
                    <th>Edit</th>

                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Event_Cities as $key=>$item)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$item->name}}</td>
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
                        <td  style="width: 40%!important;">{{substr($item->description, 0, 200)}}...</td>
                        <td>
                          <!-- <div class="col-sm-12"> -->
                               <img src="{{$item->image}}" alt="{{$item->name}}" class="img" style="width: 75%;height: 150px">
                           <!-- </div>-->
                        </td>
                        <td>{{$item->created_at}}</td>
                        <td><a  href="{{route('view.update.eventcity',['action'=>'update','id'=>$item->id])}}" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <i href="{{  url('delete/event_city') }}/{{ $item->id }}" onclick="confirm_delete('{{$item->id}}')" class="sb2-2-1-edit"><i class="fa fa-trash-o" aria-hidden="true"></i></i>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirm_delete(id) {
            let c = confirm("Do you want to delete this Event City?");
            if(c === true){
                window.location.href ="{{url('delete/event_city')}}/"+id;
            }
        }
    </script>

@endsection


