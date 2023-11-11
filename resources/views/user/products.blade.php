



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
                <p>Rs.{{ $product->price }}/=</p>

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



{{-- <div class="feature-box col-lg-4">
            <img src="./images/item2.jpg" alt="" width="300px">
            <p>OFFICE WEAR</p>
        </div>

        <div class="feature-box col-lg-4">
            <img src="./images/item3.jpg" alt="" width="300px">
            <p>MINI WEAR</p>
        </div>

        <div class="feature-box col-lg-4">
            <img src="./images/item4.jpg" alt="" width="300px">
            <p> OFFICE WEAR</p>
        </div>

        <div class="feature-box col-lg-4">
            <img src="./images/item5.jpg" alt="" width="300px">
            <p>PARTY WEAR</p>
        </div>

        <div class="feature-box col-lg-4">
            <img src="./images/item6.jpg" alt="" width="300px">
            <p>CASUAL WEAR</p>
        </div> --}}
