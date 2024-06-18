<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Product
                                            <a href="{{ url('product/create') }}" class="btn btn-primary float-end">Add Category</a>
                                        </h4>
                                    </div>
                                    <div class="card-body">

                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Is Active</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->description}}</td>
                                                    <td>
                                                        <img src="{{ asset($item->image) }}" style="width: 70px; height:70px;" alt="Img" />
                                                    </td>
                                                    <td>
                                                        @if ($item->is_active)
                                                        Active
                                                        @else
                                                        In-Active
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('product/'.$item->id.'/edit') }}" class="btn btn-success mx-2">Edit</a>

                                                        <a href="{{ url('product/'.$item->id.'/delete') }}" class="btn btn-danger mx-1" onclick="return confirm('Are you sure ?')">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

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