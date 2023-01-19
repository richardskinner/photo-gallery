@extends('app')

@section('content')
    <div class="bg-gradient-purple">
        <div class="px-4 py-5 text-center">
            <form action="{{ route('index') }}" method="get">
                <div class="input-group input-group-lg">
                    <select class="form-select form-select-lg" name="tag">
                        <option disabled selected>Please Select a Tag</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-success" type="button">Get Images</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
                <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                    <div class="input-group input-group-lg">
                        @csrf
                        <input class="form-control" type="text" name="title" placeholder="Create title"/>
                    </div>
                    <div class="input-group input-group-lg">
                        <input class="form-control" type="file" name="image" accept="image/*"/>
                    </div>
                    <div class="input-group input-group-lg">
                        <button class="btn btn-primary mt-2">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <image-gallery-component :images='@json($images)'></image-gallery-component>
@endsection