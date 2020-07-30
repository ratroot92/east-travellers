@extends('layouts.admin')
@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{asset('/admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="{{route('view.add.category',['action'=>'add'])}}"> <b>Add Event Category</b>
                </a>
            </li>
            <li class="active-bre"><a href="{{route('view.all.categories')}}">All Event Categories </a></li>


        </ul>
    </div>
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>@if($action=='add') Add Event @else Update Event @endif Category</h4>
                <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
            </div>
            <div class="bor">
                @if($action == 'add')
                <form method="post" enctype="multipart/form-data" action="{{route("view.add.category.post")}}">
                    @else
                    <form method="post" enctype="multipart/form-data"
                        action="{{route("view.update.eventcategory.post")}}">
                        <input type="hidden" name="id" id="id" value="{{ $Event_Category->id }}">
                        @endif
                        {{csrf_field()}}
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="" type="text" name="name" class="validate" @if($action=='add' ) @else
                                    value="{{ $Event_Category->name ?? '' }}" @endif required="required" />
                                <label for="Package-auth">Category Name</label>

                            </div>
                        </div>
                        @if($action == 'add')
                        <div class="row">

                            <div class="input-field col s12">
                                <div class="file-field">
                                    <div class="btn">
                                        <span>Category Image <i class="fa fa-file-image-o"></i></span>
                                        <input type="file" name="image" id="image" required="required" />
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" placeholder="Upload Image">
                                    </div>

                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row">

                            <div class="col-md-12 pl-2 pr-2">
                                <p>Aleady uploaded image</p>
                                @if(isset($Event_Category->image))
                                <img src="{{ $Event_Category->image }}" class="img-fluid img-responsive" />
                                @else
                                No Image already uploaded
                                @endif


                                <div class="input-field col s12">
                                    <div class="file-field">
                                        <div class="btn">
                                            <span>Category Image <i class="fa fa-file-image-o"></i></span>
                                            <input type="file" name="image" id="image"
                                                accept="image/gif,image/jpeg,image/png" required="required" />
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" placeholder="Upload Image">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div id="preview"></div>




                        @endif
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="description" class="materialize-textarea" name="description"
                                    required="required">@if($action=='add') @else {{ $Event_Category->description ?? '' }} @endif</textarea>
                                <label for="description">Category Descriptions:</label>
                            </div>
                        </div>

                        {{--
 <div class="row">
                            <div class="input-field col s12 font-weight-bold">
                                <select name="for" id="for" required="required">
                                    <option value="">Visible For Following Events </option>
                                      <option value="0" seelcted>All</option>
                                       <option value="1">Activity</option>
                                        <option value="2">Packages</option>
                                         <option value="3">Transfers</option>
                                          <option value="4">Daytours</option>
                                           <option value="5">Cruises</option>

                                </select>
                                <label>Category For Events</label>
                            </div>
                        </div>

                     --}}

                        @if($action=='add')

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn-large">Create <i
                                        class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="input-field col s12">

                                <button type="submit" class="waves-effect waves-light btn-large">Update <i
                                        class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                        @endif
                    </form>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script>
function previewImages() {

    var preview = document.querySelector('#preview');

    if (this.files) {
        [].forEach.call(this.files, readAndPreview);
    }

    function readAndPreview(file) {

        // Make sure `file.name` matches our extensions criteria
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " is not an image");
        } // else...

        var reader = new FileReader();
        preview
            .innerHTML = '';
        reader.addEventListener("load", function() {
            var image = new Image();
            image.height = 150;
            image.title = file.name;
            image.src = this.result;
            preview.appendChild(image);
        });

        reader.readAsDataURL(file);

    }

}

document.querySelector('#image').addEventListener("change", previewImages);
</script>

@endsection