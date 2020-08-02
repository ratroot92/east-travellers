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
            <li>
                <a href="{{url('/admin/dashboard')}}">
                    <i aria-hidden="true" class="fa fa-home">
                    </i>
                    Home
                </a>
            </li>
            <li class="active-bre">
                <a href="{{route('gallery.add')}}">
                    Add Gallery Videos
                </a>
            </li>
            <li class="active-bre">
                <a href="{{route('gallery..videos.all')}}">
                    <b> All Gallery Videos</b>
                </a>
            </li>
            <li class="active-bre ">
                <a class="active" href="{{route('gallery.add.traveller.review')}}">
                    Add Traveller Review
                </a>
            </li>

            <li class="active-bre">
                <a href="{{route('gallery.all.traveller.review')}}">
                    All Traveller Review
                </a>
            </li>
            <li class="active-bre ">
                <a href="{{route('gallery.addphotos')}}">
                    Add Gallery Photos
                </a>
            </li>
            <li class="active-bre ">
                <a href="{{route('gallery.all_photos')}}">
                    All Gallery Photos
                </a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-1">
        <h2>
            All Gallery Videos
        </h2>
        <table class="table" id="AllGalleryVideo_Table">
            <thead>
                <tr>
                    <th class="text-center text-primary font-weight-bold">
                        ID
                    </th>
                    <th class="text-left text-primary font-weight-bold">
                        Name
                    </th>
                    <!-- <th clasclass="text-center text-primary font-weight-bold">
                        URL
                    </th> -->

                    <th clasclass="text-center text-primary font-weight-bold">
                        Video Preview
                    </th>

                    <th class="text-center text-primary font-weight-bold">
                        Created At
                    </th>
                    <th class="text-center text-primary font-weight-bold">
                        Edit
                    </th>
                    <th class="text-center text-primary font-weight-bold">
                        Delete
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($videos as $key=>$vid)
                <tr>
                    <td class="text-center " style="vertical-align:middle;">
                        {{$vid->id}}
                    </td>
                    <td class="text-left " style="vertical-align:middle;">
                        {{$vid->name}}
                    </td>
                    <!-- <td class="text-center " style="vertical-align:middle;">
                        {{$vid->url}}
                    </td> -->
                    <td class="text-center " style="vertical-align:middle;">
                        <iframe width="250" height="150" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen src="{{$vid->url}}">
                        </iframe>
                    </td>
                    <td class="text-center " style="vertical-align:middle;">
                        {{$vid->created_at}}
                    </td>
                    <td class="text-center " style="vertical-align:middle;">
                        <a class="sb2-2-1-edit"
                            href="{{route('gallery.video.edit',['action'=>'edit','id'=>$vid->id])}}">
                            <i aria-hidden="true" class="fa fa-pencil-square-o fa-2x">
                            </i>
                        </a>
                    </td>
                    <td class="text-center " style="vertical-align:middle;">
                        <i class="sb2-2-1-edit" href="{{url('/gallery/video/delete/',['id'=>$vid->id])}}"
                            onclick="confirm_delete('{{$vid->id}}')">
                            <i aria-hidden="true" class="fa fa-trash-o fa-2x">
                            </i>
                        </i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                {{$videos->links()}}
            </div>
        </div>
    </div>
</div>
<script>
function confirm_delete(id) {
    let c = confirm("Do you want to delete this Video?");
    if (c === true) {
        window.location.href = "{{url('/gallery/video/delete/')}}/" + id;
    }
}
</script>
@endsection