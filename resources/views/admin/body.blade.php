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
              <h4 class="card-title">Available Stock</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>

                      <th> Product name </th>
                      <th> Product Category</th>
                      <th> Product description </th>
                      <th> Product price </th>
                      <th> Product quantity </th>
                      <th> Product image </th>

                    </tr>
                  </thead>
                  <tbody>



                @foreach ($data as $product)
                    <tr>
                      <td> {{ $product->title }} </td>
                      <td>
                        @if ($product->category)
                            {{ $product->category->category_name }}
                        @else
                            No Category
                        @endif
                    </td>
                      <td> {{ $product->description }} </td>
                      <td> {{ $product->price }} </td>
                      <td>
                        @if ($product->quantity < 5)
                            <span class="badge bg-danger">{{ $product->quantity }}</span>
                        @elseif (  $product->quantity > 10)
                            <span class="badge bg-success">{{ $product->quantity }}</span>
                        @else
                            <span class="badge bg-warning">{{ $product->quantity }}</span>
                        @endif
                    </td>
                      <td> <img class="table-img"  src={{ ("productimage/".$product->image) }}> </td>
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





