<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center"> CRUD</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{route('products.index')}}" xlass="btn btn-dark">Create</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-1-">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Create Product</h3>
                    </div>
                    <form enctype="multipart/form-data"  action="{{route('products.create') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label h5">Name</label>
                                <input value="{{old('name')}}" type="text" class="@error('name') is-invalid @enderror form-control form-control-lg" placeholder="Name" name="name">
                            </div>
                            @error('name')
                            <p class="invalid-feedback">{{ $message}}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="" class="form-label h5">Sku</label>
                                <input value="{{old('sku')}}" type="text" class="@error('sku') is-invalid @enderror form-control form-control-lg" placeholder="Sku" name="sku">
                            </div>
                            @error('sku')
                            <p class="invalid-feedback">{{ $message}}</p>
                            @enderror

                            <div class="mb-3">
                                <label for="" class="form-label h5">Price</label>
                                <input value="{{old('price')}}" type="text" class="@error('price') is-invalid @enderror form-control form-control-lg" placeholder="Price" name="price">
                            </div>
                            @error('price')
                            <p class="invalid-feedback">{{ $message}}</p>
                            @enderror

                            <div class="mb-3">
                                <label for="" class="form-label h5">Description</label>
                                <textarea placeholder="description" class="form-control" name="description" cols="30" rows="5">{{old('description')}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label h5">Image</label>
                                <input type="file" class="form-control form-control-lg" placeholder="Image" name="image">
                            </div>

                            <div class="d-grid">
                                <button xlass="btn-btn-lg btn-primary">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>