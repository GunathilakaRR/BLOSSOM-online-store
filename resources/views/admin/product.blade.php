{{-- <x-app-layout>

</x-app-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>

    {{-- css files --}}
    @include('admin.css')

    <style>
        .title {
            color: white;
            padding-top: 25px;
        }

        label {
            display: inline-block;
            width: 200px;
        }
    </style>

</head>

<body>



    <!-- partial -->

    {{-- sidebar panel --}}
    @include('admin.sidebar')

    {{-- navigationbar --}}
    @include('admin.navbar')



    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <h1 class="title">Add Product</h1>

            @if (session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss='alert'>x</button>
                    {{ session()->get('message') }}

                </div>
            @endif



            

            <form action="{{ url('uploadproduct') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="padding: 20px">
                    <label>Category</label>
                    <select name="categoryId" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="padding: 20px">
                    <label>Product Title</label>
                    <input type="text" name="title" placeholder="Product title">
                </div>

                <div style="padding: 20px">
                    <label>Product Price</label>
                    <input type="number" name="price" placeholder="Product price">
                </div>

                <div style="padding: 20px">
                    <label>Product Description</label>
                    <input type="text" name="desc" placeholder="Product description">
                </div>

                <div style="padding: 20px">
                    <label>Product Quantity</label>
                    <input type="text" name="quantity" placeholder="Product quantity">
                </div>

                <div style="padding: 20px">
                    <label>Product Iamge</label>
                    <input type="file" name="file">
                </div>

                <div style="padding: 20px">
                    <input type="submit">
                </div>


            </form>


        </div>
    </div>



    <!-- partial -->





    @include('admin.script')

</body>

</html>
