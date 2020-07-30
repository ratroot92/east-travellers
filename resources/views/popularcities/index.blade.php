@extends('layouts.admin')

@section('content')

<style type="text/css">
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
            <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Blog</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-1">
        <h2>All Popular Cities </h2>
        <table class="table" id="PopularCity_Table">
            <thead>
                <tr>
                    <th class="text-center font-weight-bold text-primary">#</th>
                    <th class="text-center font-weight-bold text-primary">City Name</th>
                    <th class="text-center font-weight-bold text-primary">Country Name</th>
                    <th id="desc" class="text-center font-weight-bold text-primary">Description</th>
                    <th class="text-center font-weight-bold text-primary">Image</th>
                    <th class="text-center font-weight-bold text-primary">Created at</th>
                    <th class="text-center font-weight-bold text-primary">Edit</th>

                    <th class="text-center font-weight-bold text-primary">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($popularcities as $key=>$item)
                <tr>
                    <td class="text-center " style="vertical-align:middle;">{{++$key}}</td>
                    <td class="text-center " style="vertical-align:middle;">{{$item->name}}</td>
                    <td class="text-center " style="vertical-align:middle;">{{$item->country}}</td>
                    <td style="width: 20%!important;vertical-align:middle;">{{substr($item->description, 0, 100)}}
                        .......</td>
                    <td class="text-center " style="vertical-align:middle;">
                        <!-- <div class="col-sm-12"> -->
                        <img src="{{$item->banner}}" alt="{{$item->name}}" class="img"
                            style="width: 100%;height: 150px">
                        <!-- </div>-->
                    </td>
                    <td class="text-center " style="vertical-align:middle;">{{$item->created_at}}</td>
                    <td class="text-center " style="vertical-align:middle;"><a
                            href="{{route('popularcities.edit',['action'=>'edit','id'=>$item->id])}}"
                            class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>
                    <td class="text-center " style="vertical-align:middle;">
                        <i onclick="confirm_delete('{{$item->id}}')"
                            href="{{route('popularcities.delete',['id'=>$item->id])}}" class="sb2-2-1-edit"><i
                                class="fa fa-trash-o" aria-hidden="true"></i></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                {{$popularcities->links()}}
            </div>
        </div>
    </div>
</div>

<script>
function confirm_delete(id) {
    let c = confirm("Do you want to delete this Popular Cities?");
    if (c === true) {
        window.location.href = "{{url('popularcities/delete/')}}/" + id;
    }
}
</script>

@endsection