<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brand<b></b>
            <b style="float: right">Total Users
                <span class="badge badge-danger"></span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{--            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">--}}
            {{--                <x-jet-welcome />--}}
            {{--            </div>--}}

            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            @if(session('message'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{session('message')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="card-header">All Brand</div>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">SL No</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($brands as $brand)
                                    <tr>
                                        <th scope="row"> {{ $brands->firstItem()+$loop->index  }} </th>
                                        <td> {{ $brand->brand_name }} </td>
                                        <td><img src=" {{ asset($brand->brand_image)}} "
                                                 style="height: 40px; width: 40px;"></td>
                                        <td>
                                            @if($brand->created_at ==  NULL)
                                                <span class="text-danger"> No Date Set</span>
                                            @else
                                                {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('brand/edit/'.$brand->id)}}"
                                               class="btn btn-info">Edit</a>
                                            <a href="{{url('delete/brand/'.$brand->id)}}"
                                               onclick="return confirm('Are you sure to Delete ?')"
                                               class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--                            {{$categories->links()}}--}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Add Brand</div>
                            <div class="card-body">
                                <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Name</label>
                                        <input type="text" name="brand_name" class="form-control"
                                               id="exampleInputEmail1"
                                               aria-describedby="emailHelp" placeholder="Enter category name">
                                        @error('brand_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Image</label>
                                        <input type="file" name="brand_image" class="form-control"
                                               id="exampleInputEmail1" aria-describedby="emailHelp">

                                        @error('brand_image')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror

                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Trash Part -->


                </div>
            </div>
</x-app-layout>

