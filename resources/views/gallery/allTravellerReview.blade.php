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
                    <b> All Traveller Review</b>
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
            All Traveller Review
        </h2>
        <table class="table" id="TravellerReview_Table">
            <thead>
                <tr>
                    <th class="text-center font-weight-bold text-primary">
                        ID
                    </th>
                    <th class="text-center font-weight-bold text-primary">
                        Name
                    </th>
                    <!-- <th class="text-center font-weight-bold text-primary">
                        URL
                    </th> -->

                    <th class="text-center font-weight-bold text-primary">
                        Video Preview
                    </th>

                    <th class="text-center font-weight-bold text-primary">
                        Created At
                    </th>
                    <th class="text-center font-weight-bold text-primary">
                        Edit
                    </th>
                    <th class="text-center font-weight-bold text-primary">
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
                    <!-- <td class="text-center "style="vertical-align:middle;">
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
                            href="{{route('gallery.update.traveller.review.get',['action'=>'edit','id'=>$vid->id])}}">
                            <i aria-hidden="true" class="fa fa-pencil-square-o">
                            </i>
                        </a>
                    </td>
                    <td class="text-center " style="vertical-align:middle;">
                        <i class="sb2-2-1-edit" href="{{url('/gallery/delete/travellerReviews/',['id'=>$vid->id])}}"
                            onclick="confirm_delete('{{$vid->id}}')">
                            <i aria-hidden="true" class="fa fa-trash-o">
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
    let c = confirm("Do you want to delete this Traveller review video ?");
    if (c === true) {
        window.location.href = "{{url('/gallery/delete/travellerReviews/')}}/" + id;
    }
}
</script>
@endsection