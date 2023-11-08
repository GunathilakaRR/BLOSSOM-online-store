{{-- <x-app-layout>

</x-app-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>

    {{-- css files --}}
    @include('admin.css')

</head>

<body>



    <!-- partial -->

    {{-- sidebar panel --}}
    @include('admin.sidebar')

    {{-- navigationbar --}}
    @include('admin.navbar')


    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">

            <table>
                <tr>
                    <td style="padding: 20px">Title</td>
                    <td style="padding: 20px">Price</td>
                    <td style="padding: 20px">Description</td>
                    <td style="padding: 20px">Quantity</td>
                    <td style="padding: 20px">Image</td>
                    <td style="padding: 20px">Update</td>
                    <td style="padding: 20px">Delete</td>
                </tr>
                @foreach ($data as $product)
                <tr>

                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td><img width="100" src="/productimage/$product->image }}"></td>
                        <td><a class="btn btn-primary" href="">Update</a></td>
                        <td><a class="btn btn-danger" href="{{ url('deleteproduct', $product->id) }}">Delete</a></td>

                </tr>
                @endforeach
            </table>

        </div>
    </div>
    <!-- partial -->


    <!-- partial -->

    @include('admin.script')

</body>

</html>
