@extends('app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
                <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label class="form-label">
                        Select Image:
                    </label>
                    <input class="form-control" type="text" name="title" />
                    <input class="form-control" type="file" name="image" accept="image/*" />
                    <button class="btn btn-primary mt-2">Upload</button>
                </form>
            </div>
        </div>
    </div>
    <image-gallery-component :images='@json($images)'></image-gallery-component>
@endsection