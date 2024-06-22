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

    <style>
        .short-input {
            width: 160px;
            /* Ajustez la largeur selon vos besoins */
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
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav nav-height">
                    <li class="nav-item nav-profile">
                        <span class="nav-link" href="#">
                            <p> Bienvenue {{ Auth::user()->name }} </p>

                            <p> {{ Auth::user()->email }} </p>

                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('acceuil')}}">
                            <span class="mdi mdi-home"></span>
                            <span class="menu-title">Accueil</span>
                        </a>
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


                    @if(Auth::check() && Auth::user()->pharmacist()->exists())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('pharmacien.listeBonsDeCommande')}}">
                            <i class="mdi mdi-file"></i>
                            <span class="menu-title">consulter les commandes</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bonlivraison.show') }}">
                            Bon de Livraison service
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#bcf" aria-expanded="false" aria-controls="sidebar-layouts">
                            <span class="mdi mdi-file"></span>
                            <span class="menu-title"> Bons de Commande</span>
                            <i class="mdi mdi-chevron-right menu-arrow"></i>
                        </a>
                        <div class="collapse" id="bcf">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{route('listeBonsDeCommandeFournisseur')}}"> <span class="mdi mdi-list-box">Liste des Bons</span></a></li>

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
                            Etablir Bon de commande
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bons-de-commande.medecin') }}">
                            Mes des bons de commande
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ordonnance.create') }}">
                            Prescrire une ordonnance
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
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4 class="card-title">Bon de commande service</h4>
                            </div>
                            <div class="card-body">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form action="{{ route('bon_commande_service.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="id_phar" name="id_phar" value="{{ $idPharmacien }}">
                                    <input type="hidden" id="id_doc" name="id_doc" value="{{ $idMedecin }}">
                                    <div class="form-group row">
                                        <label for="id_service" class="col-sm-3 col-form-label">Service:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control short-input no-border" id="service_id" name="service_id" title="Service" required>
                                                @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->nom_service }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="date" class="col-sm-3 col-form-label">Date:</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control short-input no-border" id="date" name="date" title="Date de la commande" value="{{ old('date') }}" required>
                                        </div>
                                    </div>


                                    <div id="lignes-container" class="form-group  ligne-bon">
                                        <div class="row">
                                            <div class="col-sm-3" style="margin-top: 25px;">
                                                <label for="id_dci">DCI:</label>
                                                <select class="form-control" name="lignes[0][id_dci]" title="DCI" required>
                                                    @foreach($dcis as $dci)
                                                    <option value="{{ $dci->id }}">{{ $dci->dci }} - {{ $dci->forme }} - {{ $dci->dosage }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="quantite_demandee" class="col-form-label">Quantité Demandée:</label>
                                                <input type="number" class="form-control" name="lignes[0][quantite_demandee]" required>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="quantite_restante" class="col-form-label">Quantité Restante:</label>
                                                <input type="number" class="form-control" name="lignes[0][quantite_restante]" required>
                                            </div>
                                            <!-- <div class="col-sm-3">
                                                <span class="text-danger croix" onclick="supprimerLigne(this)">✖</span>
                                            </div> -->
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



                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->

                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>

        <script>
            let ligneIndex = 1;

            // Fonction pour initialiser Select2 sur tous les éléments nécessaires
            function initialiserSelect2() {
                $('.dci-select').select2({
                    placeholder: "Sélectionnez une DCI",
                    allowClear: true
                });

                // Ajouter d'autres initialisations Select2 au besoin pour d'autres éléments
            }

            $(document).ready(function() {
                initialiserSelect2();
            });

            function ajouterLigne() {
                const container = document.getElementById('lignes-container');
                const newLigne = document.createElement('div');
                newLigne.className = 'form-group ligne-bon';
                newLigne.innerHTML = `
        <div class="row align-items-center ligne">
            <div class="col-sm-3">
                <select class="form-control dci-select" name="lignes[${ligneIndex}][id_dci]" title="DCI" required>
                    @foreach($dcis as $dci)
                    <option value="{{ $dci->id }}">{{ $dci->dci }} - {{ $dci->forme }} - {{ $dci->dosage }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <input type="number" class="form-control" name="lignes[${ligneIndex}][quantite_demandee]" title="Quantité Demandée" required>
            </div>
            <div class="col-sm-3">
                <input type="number" class="form-control" name="lignes[${ligneIndex}][quantite_restante]" title="Quantité Restante"  required>
            </div>
            <div class="col-sm-3">
                <span class="text-danger croix" onclick="supprimerLigne(this)">✖</span>
            </div>
        </div>
    `;
                container.appendChild(newLigne);
                ligneIndex++;

                initialiserSelect2();

                return newLigne;
            }

            function supprimerLigne(croix) {
                const ligne = croix.closest('.ligne');
                ligne.remove();
            }
            $(document).ready(function() {
                // Select2 pour le champ service_id
                $('#service_id').select2({
                    placeholder: "Sélectionnez un service",
                    allowClear: true
                });

                // Select2 pour les champs DCI dans les lignes de bon de commande
                $('select[name^="lignes["][name$="][id_dci]"]').select2({
                    placeholder: "Sélectionnez une DCI",
                    allowClear: true
                });
            });
        </script>




</body>

<!-- Mirrored from demo.bootstrapdash.com/xollo/template/demo_1/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 May 2024 22:42:47 GMT -->



</html>
