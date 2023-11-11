{{-- <x-app-layout>

</x-app-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>

    {{-- css files --}}
    @include('admin.css')

    <style>
        .page-body-wrapper {
            background-color: #fc8f9f;
        }

        label.formlabel {
            font-size: 20px;
            margin: 10px 0px 10px 0px;
            width: 250px;
            float: left;
            text-align: left;
        }

        .title {
            color: white;
            padding-top: 25px;
        }
        .form-control{
            background-color: pink;
            border: none;
            color: black;
            border-radius: 5px;
        }
        .form-control:focus{
            background-color: pink;
            border: none;
            color: black;
            border-radius: 5px;
        }
        .btn{
            border: 1px solid black;
            padding: 10px;
            margin-bottom: 20px;
            background-color: pink;
            color: black;
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





            {{-- <form action="{{ url('uploadproduct') }}" method="POST" enctype="multipart/form-data">
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


            </form> --}}






            <form action="{{ url('uploadproduct') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">

                    <div class="form-group col-7">
                        <label class="formlabel">Select Product Category</label>
                        <select name="categoryId" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-7">
                        <label class="formlabel">Product Name</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter product name">
                    </div>

                    <div class="form-group col-7">
                        <label class="formlabel">Product Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Enter product Price">
                    </div>

                    <div class="form-group col-7">
                        <label class="formlabel">Product Description</label>
                        <input type="text" name="desc" class="form-control"
                            placeholder="Enter Product Description">
                    </div>

                    <div class="form-group col-7">
                        <label class="formlabel">Product Quantity</label>
                        <input type="text" name="quantity" class="form-control" placeholder="Enter Product Quantity">
                    </div>

                    <div class="form-group col-7">
                        <label class="formlabel">Product Iamge</label>
                        <input type="file" name="file" class="form-control" placeholder="Enter Product Iamge">
                    </div>


                    <button type="submit" class="btn ">Submit</button>

                </div>
            </form>


        </div>
    </div>



    <!-- partial -->





    @include('admin.script')

</body>

</html>
