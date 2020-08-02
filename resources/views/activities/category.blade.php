@extends('layouts.admin')



@section('content')

<div class="sb2-2">

    <div class="sb2-2-2">

        <ul>

            <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>

            </li>

            <li class="active-bre"><a href="{{route('activity.view')}}"> All Activities</a>

            </li>

            <li class="active-bre"><a href="{{route('activity.add')}}"> Add New Activity</a></li>



            <li class="active-bre"><a href="{{route('activity.category')}}">All Activity Categories</a>

            <li class="active-bre"><a href="{{route('activity.addcategory')}}">Add Activity Categories</a>

            <li class="page-back"><a href="index.html"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>

            </li>

        </ul>

    </div>

    <div class="sb2-2-1">

        <h2>All Acitivty Categories</h2>

        <table class="table">
            "fa fa-trash-o fa-2x"
            <thead>

                <tr>

                    <th>ID</th>

                    <th>Name</th>

                    {{-- <th>Added By</th> --}}

                    <th>Date</th>

                    <th>Edit</th>

                    <th>Delete</th>

                </tr>

            </thead>

            <tbody>

                @foreach($package_cat as $key=>$item)

                <tr>

                    <td>{{$item->id}}</td>

                    <td>{{$item->name}}</td>

                    {{-- <td>{{"Admin"}}</td> --}}

                    <td>{{$item->created_at}}</td>

                    <td><a href="{{route('package_cat.edit',['action'=>'edit','id'=>$item->id])}}" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                    </td>

                    <td>

                        <i onclick="confirm_delete('{{$item->id}}')" href="{{route('package_cat.delete',['id'=>$item->id])}}" class="sb2-2-1-edit"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></i>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>



<script>
    function confirm_delete(id) {

        let c = confirm("Do you want to delete this Package Category?");

        if (c === true) {

            window.location.href = "{{url('activity/category/delete/')}}/" + id;

        }

    }
</script>



@endsection