<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 row">
            <div class="card col-3 mx-2">
                <div class="card-img-top">
                    <p class="text-center mt-5 display-3"><i class="bi bi-images"></i></p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Image List</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{ route('gallery.index') }}" class="btn btn-primary">Go to images</a>
                </div>
            </div>
            <div class="card col-3 mx-2">
                <div class="card-img-top">
                    <p class="text-center mt-5 display-3"><i class="bi bi-image"></i></p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Add Image</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{ route('gallery.create') }}" class="btn btn-primary">Add Image</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
