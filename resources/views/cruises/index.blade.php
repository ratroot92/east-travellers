@extends('layouts.admin')

@section('content')

<style type="text/css">
tr {
    line-height: 25px;
    min-height: 25px;
    height: 25px;
}
</style>
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="{{route('cruise.view')}}"> All Cruises</a>
            </li>
            <li class="active-bre"><a href="{{route('cruise.add')}}"> Add New Cruise</a></li>

            <li class="active-bre"><a href="{{route('cruise.category')}}">All Cruise Categories</a>
            <li class="active-bre"><a href="{{route('cruise.addcategory')}}">Add Cruises Categories</a>
            <li class="page-back"><a href="index.html"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-1">
        <h2>All Cruises</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>cruise Name</th>
                        <th>City</th>
                        <th>Category</th>
                        <th style="width: 200px;">Image</th>
                        <th>Tour Code</th>
                        <th>Discount</th>
                        {{-- <th>Location</th> --}}
                        <th>Price</th>

                        {{-- <th>Date</th> --}}
                        <th>Operations</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($cruises as $key=>$item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            @foreach($item->getcity as $city)
                            {{$city->name}},
                            @endforeach
                        </td>
                        <td> @foreach($item->getcategory as $cat)
                            {{$cat->name}},
                            @endforeach</td>
                        <td><img src="{{$item->banner}}" alt="{{$item->name}}" class="img"
                                style="width: 100%;height: 80px"></td>
                        {{-- <td>{{$item->country}}</td> --}}
                        <td>{{$item->tourcode}}</td>
                        <td>{{$item->disc}}</td>
                        {{-- <td>{{$item->loc}}</td> --}}
                        <td>{{$item->price}}</td>
                        {{-- <td>{{$item->date}}</td> --}}
                        <td><a href="{{ url('/cruise/update') }}/{{ $item->id }}" class="sb2-2-1-edit"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                            <i onclick="confirm_delete('{{$item->id}}')"
                                href="{{ url('/cruise/delete') }}/{{ $item->id }}" class="sb2-2-1-edit"><i
                                    class="fa fa-trash-o fa-2x" aria-hidden="true"></i></i>

                            <a href="{{  url('/cruise/detail')}}/{{ $item->id }}" target="_blank"
                                class="sb2-2-1-edit"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>





                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>

<script>
function confirm_delete(id) {
    let c = confirm("Do you want to delete this Packages?");
    if (c === true) {
        window.location.href = "{{url('cruise/delete/')}}/" + id;
    }
}
</script>

@endsection