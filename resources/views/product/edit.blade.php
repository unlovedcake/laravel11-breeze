<x-app-layout>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Categories
                            <a href="{{ url('home') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('product/'.$category->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $category->name }}" />
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Is Active</label>
                                <input type="checkbox" name="is_active" {{ $category->is_active == true ? 'checked':'' }} />
                                @error('is_active') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- <div class="mb-3">
                                <label>Upload File/Image</label>
                                <input type="file" name="image" class="form-control" />
                            </div> -->
                            <div class="form-group">
                                <label for="image">Profile Image</label>
                                @if ($category->image)
                                <div class="mb-3">
                                    <img id="current-image" src="{{ asset($category->image) }}" alt="Profile Image" class="img-thumbnail" width="150">
                                </div>
                                @endif
                                <div class="mb-3">
                                    <img id="preview-image" src="#" alt="Image Preview" class="img-thumbnail" style="display: none;" width="150">
                                </div>
                                <input onchange="previewImage(event)" id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var previewImage = document.getElementById('preview-image');
                var currentImage = document.getElementById('current-image');
                previewImage.src = dataURL;
                previewImage.style.display = 'block';
                if (currentImage) {
                    currentImage.style.display = 'none';
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script> -->

</x-app-layout>