<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blossom</title>

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
</head>

<body>


    <section id="header">
        <div class="container-fluid">



            <nav class="navbar navbar-expand-lg  ">
                <a class="navbar-brand" href="#">BLOSSOM</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                                <form id="logout-form" action="{{ url('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit">Logout</button>
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



            <div class="row slogan">
                <div class="col-lg-6">
                    <h1>BLOSSOM</h1>
                    <button type="button" class="btn btn-light btn-lg"><i class="fa-solid fa-user-plus"></i>
                        Register</button>
                    <button type="button" class="btn btn-dark btn-lg"><i class="fa-solid fa-user"></i> Login</button>
                </div>

                <div class="col-lg-6">
                    <img src="./images/wallpaper.png" alt="" width="500px">
                </div>
            </div>

        </div>
    </section>


    <!-- feature -->
    @include('user.products')


    <!-- Testimonials -->
    <section id="testimonials">
        <h3>We pride ourselves on providing high-quality clothing at affordable prices. <br>
            Our team of fashion experts is constantly updating our inventory to bring you the latest trends and styles.
        </h3>
        <div class="row row-testimonial">
            <div class="col-lg-6">
                <img class="testimonial-img" src="./images/otara.jfif" alt="">
                <em>Otara Gunewardene</em>
            </div>
            <div class="col-lg-6">
                <img class="testimonial-img" src="./images/ashcharya.jfif" alt="">
                <em>Ashcharya Peiris Jayakody</em>
            </div>
        </div>
    </section>


    <!-- press -->
    <section id="press">
    
    <img src="./images/brandix.png" alt="" width="200px">
    <img src="./images/brandix.png" alt="" width="200px">
  </section>



    <!-- card section -->
    <section id="card">

        <div class="row">
            <div class="card-column col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Island wide delivery</h2>
                    </div>
                    <div class="card-body">
                        <h3>We deliver your packages to your door step</h3>
                        <p>Our delivery agent will contact you prior to delivery to inform about the delivery time if it
                            is a Cash on Delivery (COD) payment. Delivery for all items is free island wide if the order
                            value exceeds LKR 3,500 if not there will be a delivery charge of LKR 500 applied</p>
                    </div>
                </div>
            </div>


            <div class="card-column col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Payment methods</h2>
                    </div>
                    <div class="card-body">
                        <h3>You can pay via Debit/Credit or Cash on delivery</h3>
                        <p>We ensure that your financial information will not be used, sent or sold to third parties for
                            any kind of purpose not related to BLOSSOM Clothing and its own business area and interest.
                        </p>
                    </div>
                </div>
            </div>


            <div class="card-column col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>7 day exchange</h2>
                    </div>
                    <div class="card-body">
                        <h3>Exchange your item if it doesn't fit you</h3>
                        <p>If for any reason you are not satisfied with the products that you have purchased, we will be
                            happy to exchange it according to our easy exchange policy. Please note that the exchange
                            policy is for the orders placed through our web site.</p>
                    </div>
                </div>
            </div>


        </div>
    </section>



    <!-- description -->
    <section id="description">
        <h1>Don’t stress about the dress, we’ll dress you to impress</h1>
        <a href="#features"><button type="button" class="btn btn-dark btn-lg"><i
                    class="fa-solid fa-cart-shopping"></i> Shop Now</button></a>
    </section>


    <!-- footer -->
    <footer id="footer">
        <i class="icon fa-brands fa-facebook-f"></i>
        <i class="icon fa-brands fa-twitter"></i>
        <i class="icon fa-brands fa-instagram"></i>
        <i class="icon fa-solid fa-envelope"></i>
        <p><i class="fa-regular fa-copyright"></i> Copyright 2022 BLOSSOM</p>
    </footer>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>
