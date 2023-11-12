
<style>
    .catType{
        padding-left: 20px;
    }
</style>


{{-- search bar --}}

{{-- <form action="{{ url('search') }}" method="get">
<div class="input-group">
    <div class="form-outline">
      <input type="search" name="search" class="form-control" placeholder="search" />
    </div>
    <input type="submit" class="btn btn-primary">

  </div>
</form> --}}



<section id="features">
    <div class="row ">

        @foreach ($data as $product)

            <div class="feature-box col-lg-4">

                <img width="300" height="370" src="/productimage/{{ $product->image }}" alt="" width="300px">
                <p>{{ $product->title }}</p>
                <p>Rs.{{ $product->price }}/= <span class="catType"> {{ $product->category->category_name }}</span></p>


                {{-- <a class="btn btn-primary" href="">Add to cart</a> --}}

    </div>
    @endforeach
    </div>

</section>

@if (method_exists($data, 'link'))
<div class="d-flex justify-content-center">
    {!! $data->links() !!}
    </div>
@endif

