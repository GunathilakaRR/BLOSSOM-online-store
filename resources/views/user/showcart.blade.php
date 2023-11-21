<!-- font awesome -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Montserrat:wght@400;500;600&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

<!-- google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Montserrat:wght@400;500;700&display=swap"
    rel="stylesheet">

<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<!-- css file -->
<link rel="stylesheet" href="./style.css">

<style>
    body {
        background-color: #fc8f9f;
    }

    .col-gap {
        padding-right: 20px;
    }

    #grandTotal {
        font-size: 30px;
        margin-top: 30px;
    }

    .cart-col1,
    .cart-col2 {
        margin-top: 50px;
        border: 1px solid black;
        padding: 20px;
        border-radius: 10px;
    }

    .payment-btn {
        background-color: black;
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
    }

    .trash {
        background-color: black;
        padding: 10px;
        color: white;
        border-radius: 8px;
    }
</style>

<div class="container">
    <nav class="navbar navbar-expand-lg  ">
        <a class="navbar-brand" href="#">BLOSSOM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/redirect') }}">HOME</a>
                </li>
                <li class="nav-item">

                    @if (Auth::check())


                <form id="logout-form" action="{{ url('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btnlg" type="submit">LOGOUT</button>

                </form>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">
                        LOGIN
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">
                        REGISTER
                    </a>
                </li>
                @endif
                </li>
            </ul>
        </div>
    </nav>
</div>




<div class="container">
    <div class="row">
        <div class="col-lg-7 col-md-12">


            <form class="cart-col1" action="{{ route('process.payment') }}" method="POST">
                @csrf
                <table>
                    <thead>
                        <tr>
                            <th class="col-gap">Product</th>
                            <th class="col-gap">Category</th>
                            <th class="col-gap">Quantity</th>
                            <th class="col-gap">Price</th>
                            <th class="col-gap">Total</th>
                            <th class="col-gap">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
                            <tr>
                                <td class="col-gap"> <input type="text" name="product_title[]"
                                        value="{{ $item->product_title }}" hidden="">
                                    {{ $item->product_title }}
                                </td>

                                <td class="col-gap"><input type="text" name="product_category[]"
                                        value="{{ $item->product_category }}" hidden="">
                                    {{ $item->product_category }}
                                </td>

                                <td class="col-gap">
                                    <input style="width: 40px" type="number" name="quantity[]" class="quantityInput"
                                        min="1" value="1" data-item-id="{{ $item->id }}"
                                        oninput="calculateTotal()">
                                </td>

                                <td class="price col-gap"><input type="text" name="price[]"
                                        value="{{ $item->price }}" hidden="">
                                    {{ $item->price }}
                                </td>

                                <td class="total col-gap">
                                    {{ $item->price }}
                                </td>

                                <td class="col-gap"><a href="{{ url('deleteAddToCart', $item->id) }}">
                                        <i class=" trash fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <input type="hidden" name="grandTotal" id="hiddenGrandTotal" value="0.00">

                <p id="displayGrandTotal">Grand Total: 0.00</p>
                {{-- <button type="submit" class="btn btn-success">Confirm Order</button> --}}

                <script>
                    function calculateTotal() {
                        var grandTotal = 0;
                        // Loop through each product row
                        var rows = document.querySelectorAll('tbody tr');
                        rows.forEach(function(row) {
                            var quantityInput = row.querySelector('.quantityInput');
                            var priceElement = row.querySelector('.price');
                            var totalElement = row.querySelector('.total');
                            var quantity = parseInt(quantityInput.value);
                            var price = parseFloat(priceElement.textContent);
                            var total = quantity * price;
                            totalElement.textContent = total.toFixed(2);
                            // Update the grand total
                            grandTotal += total;
                        });

                        // Update the hidden input with the grand total
                        document.getElementById('hiddenGrandTotal').value = grandTotal.toFixed(2);

                        // Display the grand total
                        document.getElementById('displayGrandTotal').textContent = 'Grand Total: ' + grandTotal.toFixed(2);
                    }

                    // Set default total values
                    document.addEventListener('DOMContentLoaded', function() {
                        calculateTotal(); // Calculate total initially
                    });

                    document.querySelectorAll('.payment-form').forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            var paymentMethod = event.submitter.getAttribute('value');
                            document.getElementById('hiddenPaymentMethod').value = paymentMethod;
                        });
                    });
                </script>


        </div>

        <div class="col-lg-5 col-md-12 cart-col2">
            <p>
                Deliver To : {{ $user->name }}
            </p>
            <p>
                Address : {{ $user->address }}
            </p>
            <p>
                Email To : {{ $user->email }}
            </p>
            <p>
                Phone no : {{ $user->phone }}
            </p>
            <p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" value="card">
                <label class="form-check-label">
                    card payment
                </label>
            </div>
            </p>

            <p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" value="cash">
                <label class="form-check-label">
                    cash on delivery
                </label>
            </div>
            </p>

            <p>
                Order Summary :
            </p>


            <button class="payment-btn" type="submit">Confirm Order</button>
            {{-- <button class="payment-btn" type="submit" name="payment_method" value="card">Pay with card</button> --}}
            {{-- <button type="submit">Pay with card</button> --}}




        </div>

        </form>


    </div>
    {{-- <form action="{{ route('cash-payment-interface') }}" method="POST">
            @csrf
                <button class="payment-btn" type="submit" name="payment_method" value="cash">Pay with cash</button>

            </form> --}}
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
