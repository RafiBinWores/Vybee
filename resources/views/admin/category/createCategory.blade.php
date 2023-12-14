@extends('admin.layouts.app')

{{-- page title --}}
@section('page-title')
    Add Category | Vybee - Admin Dashboard
@endsection

{{-- topbar page title --}}
@section('topbar-title')
    Add Category
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
                @method('post')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category name</label>
                            <input type="text" class="form-control" id="name" placeholder="Category name"
                                name="name" required>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug"
                                readonly>
                            <p class="error"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Status" class="form-label">Status</label>
                            <select class="form-select" name="status" id="Status" required>
                                <option selected value="1">Active</option>
                                <option value="0">Block</option>
                            </select>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Featured" class="form-label">Featured</label>
                            <select class="form-select" name="is_featured" id="Featured" required>
                                <option value="Yes">Yes</option>
                                <option selected value="No">No</option>
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
                </div>

                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ route('categories.index') }}" type="reset" class="btn btn-secondary waves-effect">Cancel</a>
            </form>

        </div> <!-- end card-body-->
    </div>
@endsection

@section('customJs')
    <script>
        //For Slug 
        $('#name').on('input', function() {
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
                url: "{{ route('categories.store') }}",
                type: 'post',
                data: formArray,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response['status'] == true) {
                        location.reload();

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
