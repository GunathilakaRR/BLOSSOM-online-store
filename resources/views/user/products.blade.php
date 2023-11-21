<style>

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



@if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('message') }}
    </div>
@endif


<section id="features">
    <div class="feature-heading">
        NEW ARRIVALS
    </div>
    <div class="container feature-box">
        <div class="row align-items-center">
            @foreach ($data as $product)
                <div class="col-12 col-md-6 col-lg-4 text-center d-flex justify-content-center align-items-center ">

                    <div class="card-f">
                        <img class="card-img" src="/productimage/{{ $product->image }}" alt="">
                        <div class="card-body-f">
                            <p class="title">{{ $product->title }}</p>

                            <p><span class="category"> {{ $product->category->category_name }}</p>

                            <p class="price">Rs.{{ $product->price }}/= </p>

                            <form action="{{ url('addToCart', $product->id) }}" method="post">
                                @csrf
                                <input class="btn " type="submit" value="Add To Cart">
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>





@if (method_exists($data, 'link'))
    <div class="d-flex justify-content-center">
        {!! $data->links() !!}
    </div>
@endif
