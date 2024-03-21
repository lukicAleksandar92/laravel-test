<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="/logo.png" alt="Logo" title="Home" width="120"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/shop">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>
        </div>

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/admin" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-regular fa-user"></i> Admin
                </a>
                <ul class="dropdown-menu p-2" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{route("contact.all")}}">All Contacts</a></li>
                    <li><a class="dropdown-item" href="{{route("product.all")}}">All Products</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="/admin/add-product">Add Product</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("cart.index") }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>



<style>
.navbar-dark .navbar-nav .nav-link {
    color: white;
}

.dropdown {
        padding-right: 75px;
    }
</style>
