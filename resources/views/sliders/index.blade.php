@extends('layouts.app')
@section('title')Index @endsection

<!-- any form tag  should have @csrf -->

@section('content')
<div class="text-center mb-3">
    <a class="btn btn-success" href="{{ Route('sliders.create') }}">Create slider</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>slider By</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sliders as $slider)
        <tr>
            <td>{{ $slider['id'] }}</td>
            <td>{{ $slider['title'] }}</td>
            <td>{{$slider->user->name??'N/A'}}</td>
            <td>{{ $slider['created_at'] }}</td>
            <td>
                <a href="{{route('sliders.show',$slider['id'])}} " class="btn btn-info btn-sm">View</a>
                <a href="{{route('sliders.edit',$slider['id']) }}" class="btn btn-primary btn-sm">Edit</a>

                <form style="display: inline;" method="POST"
                    action="{{ route('slider_images.destroy',$slider['id']) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class=" btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</body>

</html>

@endsection
