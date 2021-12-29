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
                    <form action="/update" method="post" enctype="multipart/form-data" id="form">
                        @method('patch')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" value="{{$product->name}}">
                                <input type="hidden" name="id" value="{{$product->id}}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Product Price</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Enter Product Price" value="{{$product->price}}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Product UPC</label>
                                <input type="text" class="form-control" id="upc" name="upc" placeholder="Enter Product UPC code" value="{{$product->upc}}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <img src="{{ asset('storage/product/'.$product->image ) }}" width="100px" height="100px">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Product Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="active" {{ ($product->status == "active") ? "selected=selected" : ''}}>Active</option>
                                    <option value="not_active" {{ ($product->status == "not_active")  ? "selected=selected" : ''}}>Not Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="updateProduct" id="updateProduct">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>