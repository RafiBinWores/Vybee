@extends('admin.layouts.app')

{{-- page title --}}
@section('page-title')
    Add Brand | Online Shop - Responsive Admin Dashboard
@endsection

{{-- topbar page title --}}
@section('topbar-title')
    Add Brand
@endsection

{{-- page content --}}
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Basic Information</h4>

            @include('admin.alert')

            <form action="" method="POST" enctype="multipart/form-data" id="brandForm" class="needs-validation" novalidate>
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Brand Name" required>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug"
                                readonly required>
                            <p class="error"></p>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="brandStatus" class="form-label">Status</label>
                    <select class="form-select" name="status" id="brandStatus" required>
                        <option value="1">Active</option>
                        <option value="0">Block</option>
                    </select>
                    <p class="error"></p>
                </div>

                <button class="btn btn-primary" type="submit">Add Brand</button>
                <a href="{{ route('brands.index') }}" type="reset" class="btn btn-secondary waves-effect">Cancel</a>
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

        // For submitting form
        $('#brandForm').submit(function(event) {
            event.preventDefault();

            let formArray = $(this).serializeArray();
            $('button[type="submit"]').prop('disable', true);

            $.ajax({
                url: "{{ route('brands.store') }}",
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
