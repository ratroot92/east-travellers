@extends('layouts.admin')
@section('content')
    <div class="sb2-2">
        <div class="sb2-2-2">
            <ul>
                <li><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                </li>
                <li class="active-bre"><a href="#"> Add New Package</a>
                </li>
                <li class="page-back"><a href="index.html"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                </li>
            </ul>
        </div>
        <div class="sb2-2-add-blog sb2-2-1">
            <div class="box-inn-sp">
                <div class="inn-title">
                    <h4>{{ucfirst($action)}} Post</h4>
                    <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
                </div>
                <div class="bor">
                    <form method="post" enctype="multipart/form-data" action="{{url("popularcities/$action/$id")}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="" type="text" name="name" class="validate" value="@if(isset($popularcities_data[0]->name)) {{$popularcities_data[0]->name}} @endif">
                                <label for="Package-auth">City Name</label>

                            </div>
                        </div>


                        <div class="row">
                            <div class="input-field col s12">
                                <input id="" type="text" name="country" class="validate" value="@if(isset($popularcities_data[0]->country)) {{$popularcities_data[0]->country}} @endif">
                                <label for="Package-auth">Country Name</label>
                            </div>
                        </div>


                        <div class="row">

                            <div class="input-field col s12">
                                <div class="file-field">
                                    <div class="btn">
                                        <span>File <i class="fa fa-file-image-o"></i></span>
                                        <input type="file" name="banner" id="banner">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" placeholder="Upload Image">
                                    </div>
                                    @if($action == 'update')
                                        <div class="col-sm-3">
                                            <img class="img-thumbnail img-responsive" src="{{url(App\StoragePath::path().'/storage/popularcities/'.$popularcities_data[0]->banner)}}" alt="">
                                        </div>

                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" class="materialize-textarea" name="description" >@if(isset($popularcities_data[0]->description)){{$popularcities_data[0]->description}} @endif</textarea>
                                <label for="textarea1">Descriptions:</label>
                            </div>
                        </div>

                        @if(ucfirst($action)=='Store')

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn-large">Create <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="input-field col s12">

                                <button type="submit" class="waves-effect waves-light btn-large">Update <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
