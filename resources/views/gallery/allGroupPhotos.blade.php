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
                    All Gallery Videos
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
            <li class="active-bre ">
                <a href="{{route('gallery.add.group.photo.get')}}">
                    Add Group Photo
                </a>
            </li>
            <li class="active-bre ">
                <a href="{{route('gallery.all.group.photo.get')}}">
                    <b> All Group Photo</b>
                </a>
            </li>
        </ul>

    </div>

    <div class="sb2-2-1">

        <h2>All Group Photos</h2>

        <table class="table" id="AllgroupPhotos_Table">

            <thead>

                <tr>

                    <th class="text-center text-primary font-weight-bold">ID</th>

                    <th class="text-center text-primary font-weight-bold">Title</th>



                    <th class="text-center text-primary font-weight-bold">Description</th>
                    <th class="text-center text-primary font-weight-bold">Image</th>
                    <th class="text-center text-primary font-weight-bold">Created At</th>

                    <th class="text-center text-primary font-weight-bold">Edit</th>

                    <th class="text-center text-primary font-weight-bold">Delete</th>

                </tr>

            </thead>

            <tbody>

                @foreach($photos as $key=>$photo)

                <tr>

                    <td class="text-center " style="vertical-align:middle;">{{$photo->id}}</td>
                    <td class="text-left " style="vertical-align:middle;">{{$photo->title}}</td>
                    <td class="text-left " style="vertical-align:middle;">{{$photo->desc}}</td>
                    <td class="text-center " style="vertical-align:middle;">
                        <image src="{{$photo->url}}" height="150" width="350" class="img-fluid" />
                    </td>
                    <td class="text-center " style="vertical-align:middle;">{{$photo->created_at}}</td>

                    <td class="text-center " style="vertical-align:middle;"><a
                            href="{{route('gallery.update.group.photo.get',['action'=>'edit','id'=>$photo->id])}}"
                            class="sb2-2-1-edit"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>

                    </td>

                    <td class="text-center " style="vertical-align:middle;">

                        <i onclick="confirm_delete('{{$photo->id}}')"
                            href="{{route('gallery.delete.group.photo.get',['id'=>$photo->id])}}"
                            class="sb2-2-1-edit"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></i>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>
        <div class="row">
            <div class="col-md-12">
                {{$photos->links()}}
            </div>
        </div>

    </div>

</div>



<script>
function confirm_delete(id) {

    let c = confirm("Do you want to delete this Photo?");

    if (c === true) {

        window.location.href = "{{url('/gallery/delete/groupPhoto/')}}/" + id;

    }

}
</script>



@endsection