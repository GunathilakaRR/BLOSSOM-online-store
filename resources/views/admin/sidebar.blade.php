<style>
    .sidebar,.navbar{
        background-color: #fc8f9f;
        color: black;
    }
    .nav-text{
        color: white;
        text-style: none;
        background-color: black;
    }
</style>

<div class="container-scroller">

    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="{{ url('redirect') }}"><h3 class="nav-text">BLOSSOM</h3></a>
        </div>


        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="profile-name">
                            <h4>Login as</h4>
                            <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item nav-category">
                <span class="nav-link">Navigation</span>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('redirect') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('product') }}">
                    <i class="mdi mdi-file-document-box"></i>
                    </span>
                    <span class="menu-title">Add Item</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('showproduct') }}">
                    <i class="mdi mdi-file-document-box"></i>
                    </span>
                    <span class="menu-title">Show All Products</span>
                </a>
            </li>


        </ul>
    </nav>
