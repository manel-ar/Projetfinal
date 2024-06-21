<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MediCare</title>
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="shortcut icon" href="/images/logooooo.ico ">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css" />
     <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="css/demo_1/style.css">
    {{-- <link rel="shortcut icon" href="https://demo.bootstrapdash.com/xollo/template/assets/images/favicon.ico" /> --}}
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                {{-- <a class="navbar-brand brand-logo">MediCare</a> --}}
                <img src="/images/logog3.png" alt="" width="90px">
                {{-- <a class="navbar-brand brand-logo-mini" style="color: black">MediCare</a> --}}
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-equal"></span>
                </button>
                <form class="form-inline d-none d-lg-block search my-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Rechercher...">
                        <div class="input-group-append">
                            <i class="mdi mdi-magnify"></i>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-item-highlight d-flex">
                        <a class="nav-link" href="{{route('getAdminLogout')}}">
                            <i class="mdi mdi-logout"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-equal"></span>
                </button>
            </div>
        </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading mt-2">HEADER SKINS</p>


        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        <ul class="nav nav-tabs" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Team review meeting at 3.00 PM </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Prepare for presentation </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Resolve all the low priority tickets due today </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked> Schedule meeting for next week </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked> Project review </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
              </ul>
            </div>


          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 ps-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pe-3 font-weight-normal">See All</small>
            </div>

          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
       <!-- partial:partials/_sidebar.html -->
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav nav-height">
            <li class="nav-item nav-profile">
                <span class="nav-link" href="#">
                    <p>  Bienvenue</p>
                    <p> {{ Auth::user()->name }} </p>
                    <p> {{ Auth::user()->email }} </p>
                </span>
            </li>
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

                        <li class="nav-item"> <a class="nav-link" href="{{route('listeDCI')}}">Liste DCI</a></li>
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

            @if(Auth::check() && Auth::user()->pharmacist())

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#bcf" aria-expanded="false" aria-controls="sidebar-layouts">
                    <span class="mdi mdi-file"></span>
                    <span class="menu-title"> Bons de Commande</span>
                    <i class="mdi mdi-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="bcf">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href=""> <span class="mdi mdi-list-box">Liste des Bons</span></a></li>

                        <li class="nav-item"> <a class="nav-link" href="{{route('bonCF')}}"> <span class="mdi mdi-note-plus">nouveau Bon</span></a></li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#br" aria-expanded="false" aria-controls="sidebar-layouts">
                    <span class="mdi mdi-file"></span>
                    <span class="menu-title"> Bons de Réception</span>
                    <i class="mdi mdi-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="br">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href=""> <span class="mdi mdi-list-box">Liste des Bons</span></a></li>

                        <li class="nav-item"> <a class="nav-link" href=""> <span class="mdi mdi-note-plus">nouveau Bon</span></a></li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#bl" aria-expanded="false" aria-controls="sidebar-layouts">
                    <span class="mdi mdi-file"></span>
                    <span class="menu-title"> Bons de Livraison</span>
                    <i class="mdi mdi-chevron-right menu-arrow"></i>
                </a>
                <div class="collapse" id="bl">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href=""> <span class="mdi mdi-list-box">Liste des Bons</span></a></li>

                        <li class="nav-item"> <a class="nav-link" href=""> <span class="mdi mdi-note-plus">nouveau Bon</span></a></li>
                    </ul>
                </div>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="{{route('getAdminLogout')}}">
                    <i class="mdi mdi-logout"></i>
                    <span class="menu-title">Déconnexion</span>
                </a>
            </li>
            @endif

            @if(Auth::check() && Auth::user()->doctor()->exists())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bondecommande') }}">
                    Bon de commande
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bons-de-commande.medecin') }}">
                    Liste des bons de commande
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ordonnance.create') }}">
                    Prescrire une ordonnance
                </a>
            </li>
            @endif


        </ul>
    </nav>            <!-- partial -->

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title text-center">Bon de commande Fournisseur</h3>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{route('bonCF')}}" method="POST">
                            @csrf
   <input type="hidden" id="id_pharmacien" name="id_pharmacien" value="{{ auth()->user()->id  }}">
 <input type="hidden" id="id_chef_pharmacien" name="id_chef_pharmacien" value="{{ auth()->user()->id}}">



                            <div class="row">
                            <div class="col-sm-6 text-left">
                            <div class="form-group row">
                                <label for="num_bc" class="col-sm-3 col-form-label">Numéro de Bon de Commande:</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" id="num_bc" name="num_bc" title="Numéro de Bon de Commande" value="{{ old('num_bc') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="form-group row justify-content-end">
                            <div class="form-group row">
                                <label for="date" class="col-sm-3 col-form-label">Date:</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="date" name="date" title="Date de la commande" value="{{ old('date') }}" required>
                                </div>
                            </div>
                        </div>
</div>

<div class="row">
    <div class="col-sm-6 text-left">
    <div class="form-group row">
        <label for="nom" class="col-sm-3 col-form-label">Nom du service contractant:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="nom" name="nom" title="Numéro de Bon de Commande" value="{{ old('num_bc') }}" required>
        </div>
    </div>
</div>
<div class="col-sm-6 text-right">
    <div class="form-group row justify-content-end">
    <div class="form-group row">
        <label for="nf" class="col-sm-3 col-form-label">Nom Fournisseur:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="nf" name="nom" title="nom du fournisseur" value="{{ old('date') }}" required>
        </div>
    </div>
</div>
</div>

<div id="lignes-container" class="form-group ligne-bon">
    {{-- <input type="hidden" name="lignes[0][id_commerc]" value="{{ $idCommerc }}"> --}}
    <div class="row">
        <div class="col-sm-3">
            <label for="id_dci" class="col-form-label">DCI:</label>
             {{-- <select class="form-control" name="lignes[0][id_dci]" title="DCI" required>
                @foreach($dcis as $dci)
                <option value="{{ $dci->IDdci }}">{{ $dci->dci }} - {{ $dci->forme }} - {{ $dci->dosage }}</option>
                @endforeach
            </select> --}}
        </div>
        <div class="col-sm-3">
            <label for="quantite_demandee" class="col-form-label">Quantité Demandée:</label>
            <input type="number" class="form-control" name="lignes[0][quantite_demandee]" required>
        </div>
        <div class="col-sm-3">
            <label for="quantite_restante" class="col-form-label">Quantité Restante:</label>
            <input type="number" class="form-control" name="lignes[0][quantite_restante]" required>
        </div>
        <div class="col-sm-3">
            <span class="text-danger croix" onclick="supprimerLigne(this)">✖</span>
        </div>
    </div>
</div>

<button type="button" class="btn " onclick="ajouterLigne()">Ajouter une ligne</button>
<button type="submit" class="btn btn-primary">Envoyé</button>
</form>
</div>
</div>
</div>

@if (session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

</div>
</div>
</div>
</div>
    <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../../assets/vendors/select2/select2.min.js"></script>
    <script src="../../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../../assets/js/off-canvas.js"></script>
    <script src="../../../assets/js/hoverable-collapse.js"></script>
    <script src="../../../assets/js/misc.js"></script>
    <script src="../../../assets/js/settings.js"></script>
    <script src="../../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../../assets/js/file-upload.js"></script>
    <script src="../../../assets/js/typeahead.js"></script>
    <script src="../../../assets/js/select2.js"></script>
    <!-- End custom js for this page -->
</body>

<!-- Mirrored from demo.bootstrapdash.com/xollo/template/demo_1/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 May 2024 22:42:47 GMT -->
{{-- <script>
    let ligneIndex = 1;

    function ajouterLigne() {
        const container = document.getElementById('lignes-container');
        const newLigne = document.createElement('div');
        newLigne.className = 'form-group ligne-bon';
        newLigne.innerHTML = `
            <input type="hidden" name="lignes[${ligneIndex}][id_commerc]" value="{{ $idCommerc }}">
            <label for="id_dci">DCI</label>
            <select class="form-control" name="lignes[${ligneIndex}][id_dci]" title="DCI" required>
                @foreach($dcis as $dci)
                    <option value="{{ $dci->IDdci }}">{{ $dci->dci }} - {{ $dci->forme }} - {{ $dci->dosage }}</option>
                @endforeach
            </select>
            <label for="quantite_demandee">Quantité Demandée</label>
            <input type="number" class="form-control" name="lignes[${ligneIndex}][quantite_demandee]" title="Quantité Demandée" placeholder="Quantité Demandée" required>
            <label for="quantite_restante">Quantité Restante</label>
            <input type="number" class="form-control" name="lignes[${ligneIndex}][quantite_restante]" title="Quantité Restante" placeholder="Quantité Restante" required>
        `;
        container.appendChild(newLigne);
        ligneIndex++;
    }
</script> --}}

</html>
