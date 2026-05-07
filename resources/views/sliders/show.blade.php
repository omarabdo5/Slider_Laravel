@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center">
    <h1 class="text-center my-4">{{$slider->title}}</h1>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000"
        style="max-width:700px;">
        <div class="carousel-indicators">
            @foreach ($slider->images as $index=>$image )
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
                class="{{ $loop->first?'active':'' }}" aria-current="{{$loop->first?'true':"false"}}"
                aria-label="{{ $index+1 }}">
            </button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ( $slider->images as $image )
            <div class="carousel-item {{ $loop->first ?'active':'' }} ">
                <img src="{{ asset('storage/sliders/' .$image->image) }}" class="d-block w-100"
                    style="height:400px;object-fit:cover" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{$slider ->title}}</h5>
                    <p>{{ $slider->description }}</p>
                </div>
            </div>

            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    @endsection
