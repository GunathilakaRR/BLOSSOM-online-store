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


    <style>
        .content-wrapper{
            background-color: #fc8f9f;
        }
        .table-img{
            border-radius:0px
            width="150"
        }

        </style>



        <div class="main-panel">
            <div class="content-wrapper " >

              <div class="row ">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Orders Table</h4>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>

                              <th> Cus. name </th>
                              <th> Cus. address</th>
                              <th> Cus. phone </th>
                              <th> Cus. email </th>
                              <th> Product </th>
                              <th> Price </th>
                              <th> Quantity </th>
                              <th> Payment </th>
                              <th> Action </th>

                            </tr>
                          </thead>
                          <tbody>



                        @foreach ($order as $item)
                            <tr>
                              <td> {{ $item->CusName }} </td>
                              <td> {{ $item->CusAddress}} </td>
                              <td> {{ $item->Cusphone }} </td>
                              <td> {{ $item->CusEmail }} </td>
                              <td> {{ $item->product }} </td>
                              <td> {{ $item->price }} </td>
                              <td> {{ $item->quantity }} </td>
                              <td> {{ $item->status }} </td>
                              <td>
                                @if ($item->deliveryStat == null)
                                    <a class="btn btn-success" href="{{ url('updateorder', ['id' => $item->id, 'CusEmail' => $item->CusEmail]) }}">confirm</a></td>
                                @else
                                    <a class="btn btn-danger" href="{{ url('updateorder', $item->id) }}">cancel</a></td>
                                @endif
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
