<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

        <a class="navbar-brand" href="/"><img src="/logo.png" alt="Logo" title="Home" width="120"></a>


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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Admin
                </a>
                <ul class="dropdown-menu p-2" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/admin/allContacts">All Contacts</a></li>
                    <li><a class="dropdown-item" href="/admin/all-products">All Products</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/admin/add-product">Add Product</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>


<style>
    .dropdown {
        padding-right: 75px;
    }
</style>
