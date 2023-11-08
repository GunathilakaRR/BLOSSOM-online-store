{{-- <x-app-layout>

</x-app-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">

    {{-- css files --}}
    @include('admin.css')

    <style>
        .title {
            color: white;
            padding-top: 25px;
        }
        label{
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


    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <h1 class="title">Add Product</h1>

            @if (session()->has('message'))

            <div class="alert alert-success">

            <button type="button" class="close" data-dismiss='alert'>x</button>
            {{ session()->get('message') }}

        </div>
            @endif

            <form action="{{ url('modifyproduct', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding: 20px">

                    <label>Product Title</label>
                    <input type="text" name="title" value="{{ $data->title }}">
                </div>

                <div style="padding: 20px">

                    <label>Product Price</label>
                    <input type="number" name="price" value="{{ $data->price }}">
                </div>

                <div style="padding: 20px">

                    <label>Product Description</label>
                    <input type="text" name="desc" value="{{ $data->description }}">
                </div>

                <div style="padding: 20px">

                    <label>Product Quantity</label>
                    <input type="text" name="quantity" value="{{ $data->quantity }}">
                </div>

                <div style="padding: 20px">

                    <label>Product Iamge</label>
                    <img width="100" src="/productimage/{{ $data->image }}" >
                </div>

                <div style="padding: 20px">
                    <input type="submit" value="Update">
                </div>


            </form>


        </div>
    </div>
    <!-- partial -->


    <!-- partial -->

    @include('admin.script')

</body>

</html>
