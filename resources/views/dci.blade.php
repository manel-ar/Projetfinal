<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MediCare</title>
  <!-- Styles -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="css/demo_1/style.css">
  <link rel="shortcut icon" href="/images/logooooo.ico">

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <img src="/images/logog3.png" alt="" width="90px">
      </div>
    </nav>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav nav-height">
        <li class="nav-item nav-profile">
          <span class="nav-link">
            <p>Bienvenue</p>
            <p>{{ Auth::user()->name }}</p>
            <p>{{ Auth::user()->email }}</p>
          </span>
        </li>
        <!-- Menu items here -->
        <li class="nav-item">
          <a class="nav-link">
            <span class="mdi mdi-view-dashboard"></span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

        @if(Auth::check() && Auth::user()->admin)
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="sidebar-layouts">
            <span class="mdi mdi-account-group"></span>
            <span class="menu-title">Gérer Utilisateurs</span>
            <i class="mdi mdi-chevron-right menu-arrow"></i>
          </a>
          <div class="collapse" id="users">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('getUsers')}}">Liste des utilisateurs</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('getAddUser')}}">Ajouter un utilisateur</a></li>

            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#med" aria-expanded="false" aria-controls="sidebar-layouts">
            <span class="mdi mdi-account-group"></span>
            <span class="menu-title">Gérer Médecins</span>
            <i class="mdi mdi-chevron-right menu-arrow"></i>
          </a>
          <div class="collapse" id="med">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('getMed')}}">Liste des médecins</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('getaddmedecin')}}">Ajouter un médecin</a></li>

            </ul>
          </div>
        </li>



        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#services" aria-expanded="false" aria-controls="sidebar-layouts">
            <span class="mdi mdi-office-building"></span>
            <span class="menu-title">Gérer Services</span>
            <i class="mdi mdi-chevron-right menu-arrow"></i>
          </a>
          <div class="collapse" id="services">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('listeServices')}}">Liste des services</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('getService')}}">Ajouter Service</a></li>
            </ul>
          </div>
        </li>



        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#dci" aria-expanded="false" aria-controls="sidebar-layouts">
            <span class="mdi mdi-pill-multiple"></span>
            <span class="menu-title">Gérer Médicaments</span>
            <i class="mdi mdi-chevron-right menu-arrow"></i>
          </a>
          <div class="collapse" id="dci">
            <ul class="nav flex-column sub-menu">

              <li class="nav-item"> <a class="nav-link" href="{{route('liste_dci')}}">Liste DCI</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('getDCI')}}">Ajouter DCI</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link">
            <span class="mdi mdi-account"></span>
            <span class="menu-title">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('getAdminLogout')}}">
            <i class="mdi mdi-logout"></i>
            <span class="menu-title">Déconnexion</span>
          </a>
        </li>
        @endif
      </ul>
    </nav>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-header text-center">
              <h4 class="card-title">Ajouter DCI</h4>
            </div>
            <div class="card-body">
              <form class="forms-sample" action="{{ route('ajouter_dci') }}" method="POST">
                @csrf
                <div class="form-group row">
                  <div class="col-md-4">
                    <label for="famille_id" class="col-form-label">Famille</label>
                    <select class="form-control" id="famille_id" name="famille_id">
                      <option></option> <!-- Option vide pour le placeholder -->
                      @foreach($familles as $famille)
                      <option value="{{ $famille->id }}">{{ $famille->nom }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="dci" class="col-form-label">DCI</label>
                    <input type="text" class="form-control" id="dci" name="dci" placeholder="DCI">
                  </div>
                  <div class="col-md-4">
                    <label for="date_peremption" class="col-form-label">Date de Péremption</label>
                    <input type="date" class="form-control" id="date_peremption" name="date_peremption">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4">
                    <label for="forme" class="col-form-label">Forme</label>
                    <input type="text" class="form-control" id="forme" name="forme" placeholder="Forme">
                  </div>
                  <div class="col-md-4">
                    <label for="dosage" class="col-form-label">Dosage</label>
                    <input type="text" class="form-control" id="dosage" name="dosage" placeholder="Dosage">
                  </div>
                  <div class="col-md-4">
                    <label for="numero_lot" class="col-form-label">N° Lot</label>
                    <input type="text" class="form-control" id="numero_lot" name="numero_lot" placeholder="N° Lot">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-4">
                    <label for="quantite_en_stock" class="col-form-label">Quantité en Stock</label>
                    <input type="number" class="form-control" id="quantite_en_stock" name="quantite_en_stock" placeholder="Quantité en Stock">
                  </div>
                  <div class="col-md-4">
                    <label for="prix_unitaire" class="col-form-label">Prix Unitaire</label>
                    <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" placeholder="Prix Unitaire">
                  </div>
                  <div class="col-md-4">
                    <label for="Montant" class="col-form-label">Montant</label>
                    <input type="number" class="form-control" id="Montant" name="Montant" placeholder="Montant">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary me-2">Ajouter</button>
                <button type="reset" class="btn btn-light">Annuler</button>
              </form>
            </div>
          </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function() {
      $('#famille_id').select2({
        placeholder: "Sélectionnez une famille",
        allowClear: true
      });
    });
  </script>
</body>

</html>
