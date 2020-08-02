@extends('layouts.admin')
@section('content')
<style>
    table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
</style>
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Blog</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-1">
        <h2>All Blog Posts</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th style="width: 200px;">Image</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $key=>$item)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$item->name}}</td>
                    <td>@php echo substr($item->description, 0, 100)@endphp .......</td>
                    <td><img src="{{url('/')}}/public/storage/blogs/{{$item->banner}}" alt="{{$item->name}}" class="img" style="width: 100%;height: 80px"></td>
                    <td>{{$item->created_at}}</td>
                    <td><a href="{{route('blog.edit',['action'=>'edit','id'=>$item->id])}}" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>
                    <td>
                        <i onclick="confirm_delete('{{$item->id}}')" href="{{route('blog.delete',['id'=>$item->id])}}" class="sb2-2-1-edit"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function confirm_delete(id) {
        let c = confirm("Do you want to delete this blog?");
        if (c === true) {
            window.location.href = "{{url('blogs/delete/')}}/" + id;
        }
    }
</script>
@endsection