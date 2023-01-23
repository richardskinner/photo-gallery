<x-app-layout :tags="$tags">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 row">
            <div class="col-12">
                <span class="d-flex align-items-center">
                    <p class="m-0">Searched for tag: {{ $tag->tag }}</p>
                    <a href="{{ route('gallery.create') }}" class="btn btn-primary ml-auto">Add Image</a>
                </span>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 row justify-content-center">
            @foreach($images as $image)
                <div class="col-md-3">
                    <form action="#" method="post">
                        @csrf
                        @method('delete')
                        <div class="card mb-4">
                            <img alt="{{ $image->title }}" src="{{ $image->image }}" class="card-img-top fluid"/>
                            <div class="card-body">
                                <div class="card-title">{{ $image->title }}-{{ $image->id }}</div>
                                <button class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
