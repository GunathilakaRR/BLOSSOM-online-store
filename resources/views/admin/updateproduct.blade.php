{{-- <x-app-layout>

</x-app-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">


    @include('admin.css')

    <style>
        /* .title {
            color: white;
            padding-top: 25px;
        }

        label {
            display: inline-block;
            width: 200px;
        } */

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




    @include('admin.sidebar')


    @include('admin.navbar')


    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <h1 class="title">Update Product</h1>

            @if (session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss='alert'>x</button>
                    {{ session()->get('message') }}

                </div>
            @endif

            <form action="{{ url('modifyproduct',  $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="form-group col-7">
                        <label class="formlabel">Product Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                    </div>

                    <div class="form-group col-7">
                        <label class="formlabel">Category</label>
                        <select name="categoryId" class="form-control">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $data->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                                {{-- <option value="{{ $category->id }}" >{{ $category->category_name }}</option> --}}
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-7">
                        <label class="formlabel">Product Price</label>
                        <input type="number" name="price" class="form-control" value="{{ $data->price }}">
                    </div>

                    <div class="form-group col-7">
                        <label class="formlabel">Product Description</label>
                        <input type="text" name="desc" class="form-control" value="{{ $data->description }}">
                    </div>

                    <div class="form-group col-7">
                        <label class="formlabel">Product Quantity</label>
                        <input type="text" name="quantity" class="form-control" value="{{ $data->quantity }}">
                    </div>

                    <div class="form-group col-7">
                        <label class="formlabel">Product Iamge</label>
                        <img width="100" src="/productimage/{{ $data->image }}">
                    </div>



                    <button type="submit" class="btn ">Update Product</button>
                </div>


            </form>


        </div>
    </div>





    @include('admin.script')

</body>

</html>
