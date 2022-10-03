@extends('admin.admin_master')

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
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Sr#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

{{--                                    @php($i =1)--}}
                                    @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->users->name }}</td>

                                        <td>{{ $category->created_at == NULL ? "Date Not Set": Carbon\Carbon::parse($category->created_at)->diffforhumans()}}</td>

                                        <td>
                                            <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-sm btn-primary pr-2">Edit</a>
                                            <a href="{{ url('category/delete/'.$category->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $categories->links() }}
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('add_category') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Add Category</label>
                                        <input type="text" name="category_name" class="form-control" placeholder="Category Name Please" value="{{old('category_name')}}">
                                    <span class="text-danger">
                                        @error('category_name')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Category</button>
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
