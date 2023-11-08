<section id="features">

    <div class="row">
        @foreach ($data as $product)
            <div class="feature-box col-lg-4">
                <img src="/productimage/{{ $product->image }}" alt="" width="300px">
                <p>{{ $product->title }}</p>

    </div>
    @endforeach
    </div>

</section>

<div class="d-flex justify-content-center">
{!! $data->links() !!}
</div>


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
