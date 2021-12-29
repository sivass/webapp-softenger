<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" id="deleteAllSelectRecord">
                                Delete Select Products
                            </button>
                        </div>
                        <div class="col-md-4 ms-auto">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
                                Add New Products
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="checkboxAll"></th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>UPC</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr id="ps_{{$product->id}}">
                                <td><input type="checkbox" name="product_id" id="product_{{$product->id}}" class="checkboxClass" value="{{$product->id}}"></td>
                                <td><img src="{{ asset('storage/product/'.$product->image ) }}" width="100px" height="100px"></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->upc}}</td>
                                <td>{{$product->status}}</td>
                                <td>
                                    <a href="/edit/{{$product->id}}" class="btn btn-primary">Edit</a>
                                    <a href="/delete/{{$product->id}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Add New Product -->
    <div class=" modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductLabel">Add New Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/save" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Product Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter Product Price" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Product UPC</label>
                            <input type="text" class="form-control" id="upc" name="upc" placeholder="Enter Product UPC code" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Product Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="" selected disabled>Please select</option>
                                <option value="active">Active</option>
                                <option value="not_active">Not Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addProduct" id="addProduct" value="add">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>