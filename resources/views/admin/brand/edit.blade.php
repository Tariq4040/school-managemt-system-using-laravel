@extends('admin.admin_master')

@section('title')
    editBrand
@endsection

@section('admin')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show"  id="success-alert" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row" style="margin: 10px">

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('all-brand/update/'.$editbrand->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <input type="text" name="brand_name" class="form-control mb-2" value="{{ $editbrand->brand_name }}">

{{--                                        <input type="hidden" name="old_image" value="{{ $editbrand->brand_image }}">--}}
                                        <input type="file" name="brand_image" class="form-control" placeholder="image">
                                        <img src="{{ asset('images/brand_Images/'.$editbrand->brand_image) }}" width="50px" height="50">
                                        <span class="text-danger">
                                        @error('category_name')
                                            {{ $message }}
                                            @enderror
                                    </span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Brand</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $("#success-alert").hide();
        $("#success-alert").fadeTo(3000, 500).slideUp(500, function() {
            $("#success-alert").slideUp(500);
        });
    });
</script>
