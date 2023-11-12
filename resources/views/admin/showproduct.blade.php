{{-- <x-app-layout>

</x-app-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    {{-- css files --}}
    @include('admin.css')
</head>
<body>
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
                    <td style="padding: 20px">Category</td>
                    <td style="padding: 20px">Image</td>
                    <td style="padding: 20px">Update</td>
                    <td style="padding: 20px">Delete</td>
                </tr>


                 @foreach ($data as $product)
                    <tr>
                      <td> {{ $product->title }} </td>
                      <td> {{ $product->price }} </td>
                      <td>
                        @if ($product->category)
                            {{ $product->category->category_name }}
                        @else
                            No Category
                        @endif
                    </td>



                      <td> <img style="width:50px" class="table-img"  src={{ ("productimage/".$product->image) }}> </td>
                      <td><a class="btn btn-primary" href="{{ url('updateproduct', $product->id) }}">Update</a></td>
                        <td><a class="btn btn-danger" href="{{ url('deleteproduct', $product->id) }}">Delete</a></td>
                        <td>
                            @if ($product->category)
                                <a class="btn btn-danger" href="{{ url('deletecategory', ['category_id' => $product->category->id]) }}">Delete Category</a>
                            @else
                                No Category
                            @endif
                        </td>

                    </tr>
                    @endforeach



            </table>

        </div>
    </div>

    @include('admin.script')

</body>

</html>
