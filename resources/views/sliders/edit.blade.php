@extends('layouts.app')

@section('title')Edit

@endsection
@section('content')

<form method="POST" action="{{ route('sliders.update',$slider->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" type="text" class="form-control" value="{{ $slider->title }}">
    </div>
    <div class="mb-3">
        <label class="form-label">description</label>
        <textarea name="description" class="form-control" rows="3">{{ $slider ->description }}</textarea>

    </div>
    <div class="mb-3">
        <label class="form-label">SliderCreator</label>
        <select name="slider_creator" class="form-control">
            @foreach ($creators as $creator)

            <!-- method2-->
            <option value="{{ $creator->id}}" @selected($slider->slider_creator ==$creator->id)>{{$creator->name  }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">currentSliders</label>

        <div class="row">
            @foreach ( $slider -> images as $image )
            <div class="col-md-3 mb-2 text-center">
                <img src="{{ asset('storage/sliders/'.$image->image) }}" class="img-thumbnail"
                    style="height:120px;object-fit:cover;">
                <div class="mt-2">

                    <form action="{{ route('slider_images.destroy',$image->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">AddNewPic</label>
        <input type="file" name="images[]" multiple class="form-control">
    </div>


    <button type="submit" class="btn btn-primary">update</button>


</form>
@endsection
