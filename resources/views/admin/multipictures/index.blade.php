@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show"  id="success-alert" role="alert" style="width: 65%">
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row" style="margin: 10px">

                    <div class="col-md-8">
                        <div class="card-group">
                            @foreach($multiple_images as $images)
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="{{ asset('/images/multi_images/'.$images->image) }}" >
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('multi_pictures.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="brand name">Brand Image</label>
                                        <input type="file" name="image[]" class="form-control" multiple="multiple">
                                        <span class="text-danger">
                                        @error('image')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                        <br>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Select Multi Images</button>
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
