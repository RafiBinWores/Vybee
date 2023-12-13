@extends('admin.layouts.app')

{{-- page title --}}
@section('page-title')
    Add Subcategory | Vybee - Admin Dashboard
@endsection

{{-- topbar page title --}}
@section('topbar-title')
    Add Sub-Category
@endsection

{{-- page content --}}
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Basic Information</h4>

            @include('admin.alert')

            <form action="" method="POST" enctype="multipart/form-data" id="subcategoryForm" class="needs-validation"
                novalidate>
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                required>
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
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category" id="category" required>
                        <option selected disabled value="">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <p class="error"></p>
                </div>
                <div class="mb-3">
                    <label for="validationCustom04" class="form-label">Status</label>
                    <select class="form-select" name="status" id="validationCustom04" required>
                        <option selected value="1">Active</option>
                        <option value="2">Block</option>
                    </select>
                    <p class="error"></p>
                </div>

                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ route('subcategories.index') }}" type="reset"
                    class="btn btn-secondary waves-effect">Cancel</a>
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

        // For submitting form
        $('#subcategoryForm').submit(function(event) {
            event.preventDefault();

            let formArray = $(this).serializeArray();
            $('button[type="submit"]').prop('disable', true);

            $.ajax({
                url: "{{ route('subcategories.store') }}",
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
