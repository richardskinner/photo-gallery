<x-app-layout :tags="$tags">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Image') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 row">
            @if($errors->count() > 0)
            <div class="alert alert-danger" role="alert">Form Error - Please fix the fields and try again</div>
            @endisset
            @if($message = \Illuminate\Support\Facades\Session::get('error'))
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @endif
            @if($message = \Illuminate\Support\Facades\Session::get('success'))
                <div class="alert alert-success" role="alert">{{ $message }}</div>
            @endif
            <div class="col-12">
                <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text {{ $errors->has('title') ? 'border-danger' : '' }}" id="basic-addon1">Title</span>
                        <input class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" name="title" type="text" />
                    </div>
                    <div class="input-group mb-3">
                        <input class="form-control {{ $errors->has('image') ? 'border-danger' : '' }}" name="image" type="file" accept="image/*" />
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-primary">Create Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
