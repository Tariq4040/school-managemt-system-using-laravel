<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--            Hello!! <b>{{ Auth::user()->name }} </b>--}}
        </h2>
    </x-slot>

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
                                <form action="{{ url('category/update/'.$editCategory->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
{{--                                        @dd($editCategory)--}}
                                        <input type="text" name="user_name" class="form-control mb-2" value="{{ $editCategory->users->name }}" readonly>
                                        <input type="text" name="category_name" class="form-control" value="{{ $editCategory->category_name }}">
                                        <span class="text-danger">
                                        @error('category_name')
                                            {{ $message }}
                                            @enderror
                                    </span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>

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
