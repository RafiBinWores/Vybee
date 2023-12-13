@extends('admin.layouts.app')

{{-- page title --}}
@section('page-title')
    Edit Category | Vybee - Admin Dashboard
@endsection

{{-- topbar page title --}}
@section('topbar-title')
    Edit Category
@endsection

{{-- page content --}}
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Basic Information</h4>

            @include('admin.alert')

            <form action="" method="POST" id="categoryFrom" enctype="multipart/form-data" class="needs-validation"
                novalidate>
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Category name" value="{{ $category->name }}" required>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug"
                                value="{{ $category->slug }}" readonly>
                            <p class="error"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Status" class="form-label">Status</label>
                            <select class="form-select" name="status" id="Status" required>
                                <option {{ $category->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                <option {{ $category->status == 0 ? 'selected' : '' }} value="0">Block</option>
                            </select>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Featured" class="form-label">Featured</label>
                            <select class="form-select" name="is_featured" id="Featured" required>
                                <option {{ $category->is_featured == 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                                <option {{ $category->is_featured == 'No' ? 'selected' : '' }} value="No">No</option>
                            </select>
                            <p class="error"></p>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="image">Product Image</label>
                    <input type="hidden" name="image_id" id="image_id" value="">
                    <div id="image" class="dropzone dz-clickable">
                        <div class="dz-message needsclick">
                            <i class="fe-upload-cloud fs-1"></i>
                            <h3>Click to upload product image</h3>
                            <p>The recommended size for category images is 92x92 pixels</p>
                        </div>
                    </div>
                    <p class="error"></p>
                    <div id="upload-img" class="d-flex flex-column mt-2 gap-2">
                    </div>

                    @if (!empty($category->image))
                        <div class="d-flex align-items-center justify-content-between rounded border p-2">
                            <div class="d-flex align-items-center">
                                <img class="img-fluid avatar-xl rounded"
                                    src="{{ asset('uploads/category/' . $category->image) }}" alt="{{ $category->name }}">
                                <div class="ms-2">
                                    <p class="text-muted fw-bold mb-0">{{ $category->image }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <button class="btn btn-primary" type="submit">Update</button>
                <a href="{{ route('categories.index') }}" type="reset" class="btn btn-secondary waves-effect">Cancel</a>
            </form>

        </div> <!-- end card-body-->
    </div>
@endsection


@section('customJs')
    <script>
        //For Slug 
        $('#name').change(function() {
            let element = $(this).val();

            $.ajax({
                url: "{{ route('getSlug') }}",
                type: 'get',
                data: {
                    title: element
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response['status'] == true) {
                        $('#slug').val(response['slug']);
                    }
                }
            })

        });

        //For image upload
        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0])
                    }
                });
            },
            url: "{{ route('tempImages.create') }}",
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            required: true,
            acceptedFiles: "image/jpeg,image/jpg,image/png",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                $("#image_id").val(response.image_id);
            }
        });

        // For submitting form
        $('#categoryFrom').submit(function(event) {
            event.preventDefault();

            let formArray = $(this).serializeArray();
            $('button[type="submit"]').prop('disable', true);

            $.ajax({
                url: "{{ route('categories.update', $category->id) }}",
                type: 'put',
                data: formArray,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response['status'] == true) {
                        window.location.href = "{{ route('categories.index') }}";

                    } else {
                        let errors = response['errors'];

                        $('.error').removeClass('invalid-feedback').html('');
                        $("input[type='text']").removeClass('is-invalid');

                        $.each(errors, function(key, value) {
                            $(`#${key}`).addClass('is-invalid').siblings('p')
                                .addClass('invalid-feedback').html(value);
                        })
                    }
                },
                error: function() {
                    console.log("something wrong");
                }
            })
        });
    </script>
@endsection
