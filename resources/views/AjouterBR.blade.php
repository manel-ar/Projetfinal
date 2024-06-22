
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MediCare</title>
    <link rel="shortcut icon" href="/images/logooooo.ico ">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css" />
         <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/css/demo_1/style.css">


    <style>
        .form-group.row {
            align-items: center;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .short-input {
            width: 100%;
            box-sizing: border-box; /* Ensures padding doesn't affect width */
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .montant-column {
            min-width: 200px; /* Adjust this value to make the column wider */
        }

        @media screen and (max-width: 768px) {
            th, td {
                font-size: 12px; /* Adjust font size for small screens */
            }

            .col-sm-4, .col-sm-8 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .form-group.row {
                flex-direction: column;
            }

            .quantite-commandee, .quantite-recue, .quantite-restante, .prix-unitaire, .montant {
                text-align: right;
            }
        }
    </style>

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

            @if(Auth::check() && Auth::user()->pharmacist() )

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

                        {{-- <li class="nav-item"> <a class="nav-link" href="{{route('bonCR')}}"> <span class="mdi mdi-note-plus">nouveau Bon</span></a></li> --}}
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

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            {{-- <div class="card-header text-center">
                                <h4 class="card-title">Bon de Reception</h4>
                            </div> --}}
                            <div class="card-body">
                                <h4 class="card-title text-center">CHU DE BEJAIA</h4>
                                <h6 class="card-title text-left">Bon de Réception</h6>
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form method="POST" action="{{route('createBonCommandeReception', $bonCommande->id)}}" >
                                    @csrf

                                    <div class="form-group row">
                                        <input type="hidden" id="id_pharmacien" name="id_pharmacien" value="{{ $idPhar }}">
                                        <input type="hidden" id="id_chef_pharmacien" name="id_chef_pharmacien" value="{{ $idChefPharmacien }}">
                                        <input type="hidden" id="date_reception" name="date_reception" value="{{ $date_reception }}">


                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="num_bcf" class="col-sm-4 col-form-label">Numéro du Bon de commande:</label>
                                                <div class="col-sm-8">
                                                    <p class="form-control-plaintext"> {{ $bonCommande->num_bcf }}</p>
                                                    {{-- <input type="hidden" name="num_bcf" value="{{ $bonCommande->id }}"> --}}
                                                    <input type="hidden" name="id_bcf" value="{{ $bonCommande->id }}">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date" class="col-sm-4 col-form-label">En Date du:</label>
                                                 <div class="col-sm-8">
                                                    <p class="">{{ $bonCommande->date }}</p>
                                                    <input type="hidden" name="date_bcf"  value="{{ $bonCommande->id }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="num_livraison" class="col-sm-4 col-form-label">Numéro du Bon de livraison:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="num_livraison" required class="short-input" style="border: none; border-bottom: 1px solid #000;" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date_livraison" class="col-sm-4 col-form-label">Date de BL</label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="date_livraison" required class="short-input" style="border: none; border-bottom: 1px solid #000;" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nom_fournisseur" class="col-sm-4 col-form-label">Nom Fournisseur:</label>
                                               <label for="nom_fournisseur" class="col-sm-4 col-form-label"> Pharmacie Centrale des Hopitaux</label>
                                                {{-- <div class="col-sm-8">
                                                    <input type="text" name="nom_fournisseur" required class="short-input" style="border: none; border-bottom: 1px solid #000;">
                                                </div> --}}
                                            </div>
                                        </div>
                                       <div class="row">
                                        <div class="col-12">
                                            <div class="table-container">
                                            <table id="order-listing" class="table">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>IDdci</th> --}}
                                                        <th>DCI/Forme/Dosage</th>
                                                        <th>Nom Commercial</th>
                                                        <th>N° Lot</th>
                                                        <th>Date de Péremption</th>
                                                        <th>Quantité Demandée</th>
                                                        <th>Quantité reçue</th>
                                                        <th>Quantité Reste à recevoir</th>
                                                        <th>Prix Unitaire</th>
                                                        <th class="montant-column">Montant</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($bonCommande->lignesBCF as $index => $ligne)
                                                    <tr class="text-right">
                                                        <td class="text-left">{{ $ligne->dci->dci }} - {{ $ligne->dci->forme }} - {{ $ligne->dci->dosage }}</td>
                                                        <td>
                                                            <div class="col-sm-8">
                                                                <select name="lignesBR[{{ $index }}][id_commerc]" required class="short-input" style="border: none; border-bottom: 1px solid #000;">
                                                                    @foreach($ligne->dci->nomCommercial as $nomCommercial)
                                                                        <option value="{{ $nomCommercial->id_commerc }}">{{ $nomCommercial->nom_commercial }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="lignesBR[{{ $index }}][numero_lot]" required class="short-input" style="border: none; border-bottom: 1px solid #000;">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-sm-8">
                                                                <input type="date" name="lignesBR[{{ $index }}][date_peremption]" required class="short-input" style="border: none; border-bottom: 1px solid #000;">
                                                            </div>
                                                        </td>
                                                        <td class="quantite-commandee">{{ $ligne->quantite_commandee }}</td>
                                                        <td>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="lignesBR[{{ $index }}][quantite_recue]" required class="short-input quantite-recue" data-quantite-commandee="{{ $ligne->quantite_commandee }}" style="border: none; border-bottom: 1px solid #000;">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="lignesBR[{{ $index }}][quantite_restante]" required class="short-input quantite-restante" readonly style="border: none; border-bottom: 1px solid #000;">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="lignesBR[{{ $index }}][prix_unitaire]" required class="short-input prix-unitaire" style="border: none; border-bottom: 1px solid #000;">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="lignesBR[{{ $index }}][montant]" required class="short-input montant" style="border: none; border-bottom: 1px solid #000;">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Enregistrer</button>
                                            <button type="reset" class="btn btn-light" style="margin-top: 5px; border: 1px solid #65D7CA;">Annuler</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>

                                <!-- Include jQuery -->
                                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('.quantite-recue').on('input', function() {
                                            var quantiteCommandee = parseFloat($(this).data('quantite-commandee')) || 0;
                                            var quantiteRecue = parseFloat($(this).val()) || 0;
                                            var quantiteRestante = quantiteCommandee - quantiteRecue;
                                            $(this).closest('tr').find('.quantite-restante').val(quantiteRestante);
 // Also calculate the montant if prix unitaire is already entered
 var prixUnitaire = parseFloat($(this).closest('tr').find('.prix-unitaire').val()) || 0;
            var montant = prixUnitaire * quantiteRecue;
            $(this).closest('tr').find('.montant').val(montant.toFixed(2));
        });

        // Calculate the montant when prix unitaire is entered or changed
        $('.prix-unitaire').on('input', function() {
            var prixUnitaire = parseFloat($(this).val()) || 0;
            var quantiteRecue = parseFloat($(this).closest('tr').find('.quantite-recue').val()) || 0;
            var montant = prixUnitaire * quantiteRecue;
            $(this).closest('tr').find('.montant').val(montant.toFixed(2));
        });
    });



                                </script>

                                {{-- @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif --}}

                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
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


                    {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}

                    <!-- Inclure jQuery -->
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <!-- Inclure Bootstrap JavaScript -->
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


                </div>

                {{-- @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif --}}


            </div>


            <!-- Inclure jQuery -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <!-- Inclure Bootstrap JavaScript -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        </div>
    </div>


    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Inclure Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    </div>
    </div>
    </div>

    <script>
    document.querySelector('form').addEventListener('submit', function(event) {
        // event.preventDefault(); // Comment this out if you have it.
        // Your custom code
    });
</script>
    <!-- partial -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->


    <script>
        function calculateRemaining(element, quantiteCommandee) {
            // Obtenir la ligne parente de l'élément actuel
            var row = element.closest('tr');

            // Obtenir la valeur saisie pour la quantité reçue
            var quantiteRecue = parseInt(element.value);

            // Calculer la quantité restante à recevoir
            var quantiteRestante = quantiteCommandee - quantiteRecue;

            // Trouver le champ de la quantité restante dans la même ligne
            var quantiteRestanteField = row.querySelector('input[name="quantite_restante[]"]');

            // Mettre à jour la valeur de la quantité restante
            quantiteRestanteField.value = quantiteRestante;
        }
        </script>
{{--
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="/assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="/assets/js/off-canvas.js"></script>
    <script src="/assets/js/hoverable-collapse.js"></script>
    <script src="/assets/js/misc.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/todolist.js"></script>
    <script src="/assets/js/data-table.js"></script> --}}

        <!-- plugins:js -->
        <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="/assets/vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="/assets/js/off-canvas.js"></script>
        <script src="/assets/js/hoverable-collapse.js"></script>
        <script src="/assets/js/misc.js"></script>
        <script src="/assets/js/settings.js"></script>
        <script src="/assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="/assets/js/data-table.js"></script>
        <!-- End custom js for this page -->

    <!-- End custom js for this page -->
    {{-- <script>
        function updateQuantiteRestante(index, quantiteDemandee) {
            var quantiteLivree = document.querySelector('input[name="lignes[' + index + '][quantite_livree]"]').value;
            var quantiteRestanteInput = document.getElementById('quantite_restante_' + index);

            if (quantiteLivree !== '') {
                var quantiteRestante = quantiteDemandee - quantiteLivree;
                quantiteRestanteInput.value = quantiteRestante;
            } else {
                quantiteRestanteInput.value = '';
            }
        }
        function updateMontant(index) {
        var quantiteLivree = parseFloat(document.querySelector('input[name="lignes[' + index + '][quantite_livree]"]').value);
        var prixUnit = parseFloat(document.querySelector('input[name="lignes[' + index + '][prix_unit]"]').value);
        var montantInput = document.querySelector('input[name="lignes[' + index + '][Montant]"]');

        if (!isNaN(quantiteLivree) && !isNaN(prixUnit)) {
            var montant = quantiteLivree * prixUnit;
            montantInput.value = montant.toFixed(2); // Ensure only two decimal places
        } else {
            montantInput.value = ''; // Clear the montant field if either quantity or price is not a number
        }
    }

    // Add event listeners to trigger the calculation when input values change
    document.addEventListener('DOMContentLoaded', function() {
        var quantiteLivreeInputs = document.querySelectorAll('input[name^="lignes["][name$="][quantite_livree]"]');
        quantiteLivreeInputs.forEach(function(input, index) {
            input.addEventListener('input', function() {
                updateMontant(index);
            });
        });

        var prixUnitInputs = document.querySelectorAll('input[name^="lignes["][name$="][prix_unit]"]');
        prixUnitInputs.forEach(function(input, index) {
            input.addEventListener('input', function() {
                updateMontant(index);
            });
        });
    });


    </script> --}}


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
</body>

</html>

