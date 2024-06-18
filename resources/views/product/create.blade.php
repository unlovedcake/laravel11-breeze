<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="container mt-5 ">
                        <div class="row">
                            <div class="col-md-12">

                                @if (session('status'))
                                <div class="alert alert-success">{{session('status')}}</div>
                                @endif

                                <div class="card" style="width: 100%;">
                                    <div class="card-header">
                                        <h4>Add Categories
                                            <a href="{{ url('home') }}" class="btn btn-primary float-end">Back</a>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('product/create') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>Is Active</label>
                                                <input type="checkbox" name="is_active" {{ old('is_active') == true ? checked:'' }} />
                                                @error('is_active') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>Upload File/Image</label>
                                                <input type="file" name="image" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>