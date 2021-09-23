{{-- <div class="container">
    <span class="d-flex justify-content-center">
        <a href="{{ route('index_admin') }}">Liste des Utilisateurs</a> |
        <a href="{{ route('index_admin') }}">Liste des Utilisateurs</a> |
        <a href="{{ route('index_admin') }}">Liste des Utilisateurs</a>
    </span>
</div> --}}


<nav class="navbar_admin navbar navbar-expand-sm bg-danger justify-content-center">
    <ul class="navbar-nav col-12 d-flex">
      <li class="col-4 nav-item d-flex justify-content-center align-items-center">
        <a class="nav-link d-flex justify-content-center align-items-center" href="{{ route('index_admin') }}"><div class="d-flex justify-content-center align-items-center"><i class="far fa-user"></i></div>Utilisateur</a>
      </li>
      <li class="col-4 nav-item d-flex justify-content-center align-items-center">
        <a class="nav-link d-flex justify-content-center align-items-center" href="{{ route('produit_admin') }}"><div class="d-flex justify-content-center align-items-center"><i class="far fa-box-full"></i></div>Produit</a>
      </li>
      <li class="col-4 nav-item d-flex justify-content-center align-items-center">
        <a class="nav-link d-flex justify-content-center align-items-center" href="{{ route('commande_admin') }}"><div class="d-flex justify-content-center align-items-center"><i class="far fa-shopping-cart"></i></div>Commande</a>
      </li>
    </ul>
  </nav>
