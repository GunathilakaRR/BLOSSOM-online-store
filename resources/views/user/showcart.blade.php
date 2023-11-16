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
    .col-gap{
        padding-right: 20px;
    }
    #grandTotal{
        font-size: 30px;
        margin-top: 30px;
    }
    .cart-table{
        margin-top: 50px;
        border: 1px solid black;
        padding: 20px;
        width: 800px;
        border-radius: 10px;
    }
</style>


<nav class="navbar navbar-expand-lg  ">
    <a class="navbar-brand" href="#">BLOSSOM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">

            <li class="nav-item active">
                <a class="nav-link" href="#">HOME</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#features">SHOPPING</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#footer">CONTACT</a>
            </li>


            <li class="nav-item">

                @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="{{ url('showcart') }}">CART</a>
            </li>

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

<div class="container">


    <form class="cart-table" action="">
        <table >
            <thead>
                <tr>
                    <th class="col-gap">Product</th>
                    <th class="col-gap">Category</th>
                    <th class="col-gap">Quantity</th>
                    <th class="col-gap">Price</th>
                    <th class="col-gap">Total</th>
                    <th class="col-gap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                    <tr>
                        <td class="col-gap">{{ $item->product_title }}</td>
                        <td class="col-gap">{{ $item->product_category }}</td>
                        <td class="col-gap">
                            <input style="width:40px" type="number" name="quantity" class="quantityInput"
                                min="1" value="1" data-item-id="{{ $item->id }}"
                                oninput="calculateTotal()">
                        </td>
                        <td class="price col-gap">{{ $item->price }}</td>
                        <td class="total col-gap">{{ $item->price }}</td>
                        <td class="col-gap"><a class="btn btn-danger" href="{{ url('deleteAddToCart', $item->id) }}"><i
                                    class="fa-solid fa-trash"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p id="grandTotal">Grand Total: 0.00</p>
        <button class="btn btn-success">Confirm Order</button>
    </form>

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

            // Display the grand total
            document.getElementById('grandTotal').textContent = 'Grand Total: ' + grandTotal.toFixed(2);
        }

        // Set default total values
        document.addEventListener('DOMContentLoaded', function() {
            calculateTotal(); // Calculate total initially
        });
    </script>

</div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
