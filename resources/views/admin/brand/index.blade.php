<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b> All Brands </b>
        </h2>
    </x-slot>

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
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Sr#</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Brand Image</th>
                                        <th scope="col">Updated At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    {{--                                    @php($i =1)--}}
                                    @foreach($brands as $brand)
                                        <tr>
                                            <th scope="row">{{ $brands->firstItem() + $loop->index }}</th>
                                            <td>{{ $brand->brand_name }}</td>
                                            <td>
                                                <img class="rounded-circle" src="{{ url('/images/brand_Images/'.$brand->brand_image) }}"
                                                      style="height: 60px; width: 60px;">
                                            </td>

                                            <td>{{ $brand->updated_at == NULL ? "Date Not Set": Carbon\Carbon::parse($brand->updated_at)->diffforhumans()}}</td>

                                            <td>
                                                <a href="{{ url('all-brand/edit/'.$brand->id) }}" class="btn btn-sm btn-primary pr-2">Edit</a>
                                                <a href="{{ url('all-brand/delete/'.$brand->id) }}" class="btn btn-sm btn-danger"
                                                   onClick="return confirm('Are You Sure to delete this Brand')" >Delete</a>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $brands->links() }}
                    </div>


                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('store_brands') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="brand name">Brand Name</label>
                                        <input type="text" name="brand_name" class="form-control mb-2" value="{{ old('brand_name') }}">
                                        <span class="text-danger">
                                        @error('brand_name')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                        <br>
                                        <label for="brand name">Brand Image</label>
                                        <input type="file" name="brand_image" class="form-control" value="{{ old('brand_image') }}">
                                        <span class="text-danger">
                                        @error('brand_image')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                        <br>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Brand</button>
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
