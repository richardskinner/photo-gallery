@extends('app')

@section('content')
    @if($message = \Illuminate\Support\Facades\Session::get('error'))
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @endif
    @if($message = \Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success" role="alert">{{ $message }}</div>
    @endif
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
                <form action="{{ route('index') }}" method="get">
                    <label class="form-label">
                        Select Tag:
                    </label>
                    <select class="form-control" name="tag">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary mt-2">Query</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
                <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label class="form-label">
                        Select Image:
                    </label>
                    <input class="form-control" type="text" name="title"/>
                    <input class="form-control" type="file" name="image" accept="image/*"/>
                    <button class="btn btn-primary mt-2">Upload</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            @foreach($images as $image)
                <form action="{{ route('delete', $image->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <img alt="{{ $image->title }}" src="{{ $image->image }}" class="card-img-top fluid"/>
                            <div class="card-body">
                                <div class="card-title">{{ $image->title }}-{{ $image->id }}</div>
                                <button class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection