
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


    <style>
        .content-wrapper{
            background-color: #fc8f9f;
        }
        .table-img{
            border-radius:0px
            width="100"
        }

        </style>



        <div class="main-panel">
            <div class="content-wrapper " >

                @if (session()->has('message'))


                    <div class="alert alert-secondary alert-dismissible fade show" >

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session()->get('message') }}
                      </div>


            @endif


              <div class="row ">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Update/Delete Products</h4>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>

                                <tr>
                                    <td style="padding: 20px">Title</td>
                                    <td style="padding: 20px">Price</td>
                                    <td style="padding: 20px">Category</td>
                                    <td style="padding: 20px">Image</td>
                                    <td style="padding: 20px">Update</td>
                                    <td style="padding: 20px">Delete</td>
                                </tr>

                            </tr>
                          </thead>
                          <tbody>



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



                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
        </div>




    @include('admin.script')

</body>

</html>
