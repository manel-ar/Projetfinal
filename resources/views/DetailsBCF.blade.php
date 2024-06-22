<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MediCare</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/images/logooooo.ico ">
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
            <div class="navbar-menu-wrapper d-flex align-items-stretch" style="background-color: #D3D3D3">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-equal"></span>
                </button>
                <form class="form-inline d-none d-lg-block search my-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" style="background-color: #D3D3D3"
                            placeholder="Rechercher...">
                        <div class="input-group-append">
                            <i class="mdi mdi-magnify"></i>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-item-highlight d-flex">
                        <a class="nav-link" href="{{ route('getAdminLogout') }}">
                            <i class="mdi mdi-logout"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-equal"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
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
                        <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section"
                            role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab"
                            aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                        aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                        id="add-task">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Team review meeting at 3.00 PM
                                        </label>
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
                                            <input class="checkbox" type="checkbox"> Resolve all the low priority
                                            tickets due today </label>
                                    </div>
                                    <i class="remove mdi mdi-close-circle-outline"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked> Schedule meeting for next
                                            week </label>
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
                        <div class="events py-4 border-bottom px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="mdi mdi-circle-outline text-primary me-2"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
                            <p class="text-gray mb-0">build a js based app</p>
                        </div>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="mdi mdi-circle-outline text-primary me-2"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                            <p class="text-gray mb-0 ">Call Sarah Graves</p>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 ps-3 pt-0 border-bottom-0 pb-0">Friends</p>
                            <small
                                class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pe-3 font-weight-normal">See
                                All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <div class="wrapper d-flex">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                <small class="text-muted my-auto">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="text-muted my-auto">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">47 min</small>
                            </li>
                        </ul>
                    </div>
                    <!-- chat tab ends -->
                </div>
            </div>

            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav nav-height">
                    <li class="nav-item nav-profile">
                        <span class="nav-link" href="#">
                            <p> Bienvenue {{ Auth::user()->name }} </p>

                            <p> {{ Auth::user()->email }} </p>

                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('acceuil') }}">
                            <span class="mdi mdi-home"></span>
                            <span class="menu-title">Accueil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('getDashboard') }}">
                            <span class="mdi mdi-view-dashboard"></span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>



                    @if (Auth::check() && Auth::user()->admin)
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false"
                                aria-controls="sidebar-layouts">
                                <span class="mdi mdi-account-group"></span>
                                <span class="menu-title">Gérer Utilisateurs</span>
                                <i class="mdi mdi-chevron-right menu-arrow"></i>
                            </a>
                            <div class="collapse" id="users">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('getUsers') }}">Liste
                                            des utilisateurs</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('getAddUser') }}"><span
                                                class="mdi mdi-account-plus"> Ajouter un utilisateur</span>
                                        </a></li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#med" aria-expanded="false"
                                aria-controls="sidebar-layouts">
                                <span class="mdi mdi-account-group"></span>
                                <span class="menu-title">Gérer Médecins</span>
                                <i class="mdi mdi-chevron-right menu-arrow"></i>
                            </a>
                            <div class="collapse" id="med">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('getMed') }}">Liste des
                                            médecins</a></li>
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('getaddmedecin') }}"><span class="mdi mdi-doctor"> Ajouter
                                                un médecin</span>
                                        </a></li>

                                </ul>
                            </div>
                        </li>





                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#services" aria-expanded="false"
                                aria-controls="sidebar-layouts">
                                <span class="mdi mdi-office-building"></span>
                                <span class="menu-title">Gérer Services</span>
                                <i class="mdi mdi-chevron-right menu-arrow"></i>
                            </a>
                            <div class="collapse" id="services">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('listeServices') }}">Liste des services</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('getService') }}"><span
                                                class="mdi mdi-office-building-plus">Ajouter Service</span>
                                        </a></li>
                                </ul>
                            </div>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#dci" aria-expanded="false"
                                aria-controls="sidebar-layouts">
                                <span class="mdi mdi-pill-multiple"></span>
                                <span class="menu-title">Gérer Médicaments</span>
                                <i class="mdi mdi-chevron-right menu-arrow"></i>
                            </a>
                            <div class="collapse" id="dci">
                                <ul class="nav flex-column sub-menu">

                                    <li class="nav-item"> <a class="nav-link" href="{{ route('listeDCI') }}">Liste
                                            DCI</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('getDCI') }}"><span
                                                class="mdi mdi-pill"> Ajouter DCI</span>
                                        </a></li>
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
                            <a class="nav-link" href="{{ route('getAdminLogout') }}">
                                <i class="mdi mdi-logout"></i>
                                <span class="menu-title">Déconnexion</span>
                            </a>
                        </li>
                    @endif


                    @if (Auth::check() && Auth::user()->pharmacist()->exists())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pharmacien.listeBonsDeCommande') }}">
                                <i class="mdi mdi-file"></i>
                                <span class="menu-title">consulter les commandes</span>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('bonlivraison.show') }}">
                            Bon de Livraison service
                        </a>
                    </li> --}}

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#bcf" aria-expanded="false"
                                aria-controls="sidebar-layouts">
                                <span class="mdi mdi-file"></span>
                                <span class="menu-title"> Bons de Commande</span>
                                <i class="mdi mdi-chevron-right menu-arrow"></i>
                            </a>
                            <div class="collapse" id="bcf">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('listeBonsDeCommandeFournisseur') }}"> <span
                                                class="mdi mdi-list-box">Liste des Bons</span></a></li>

                                    <li class="nav-item"> <a class="nav-link" href="{{ route('bonCF') }}"> <span
                                                class="mdi mdi-note-plus">nouveau Bon</span></a></li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#br" aria-expanded="false"
                                aria-controls="sidebar-layouts">
                                <span class="mdi mdi-file"></span>
                                <span class="menu-title"> Bons de Réception</span>
                                <i class="mdi mdi-chevron-right menu-arrow"></i>
                            </a>
                            <div class="collapse" id="br">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href=""> <span
                                                class="mdi mdi-list-box">Liste des Bons</span></a></li>

                                    {{-- <li class="nav-item"> <a class="nav-link" href="{{route('bonCR')}}"> <span class="mdi mdi-note-plus">nouveau Bon</span></a></li> --}}
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#bl" aria-expanded="false"
                                aria-controls="sidebar-layouts">
                                <span class="mdi mdi-file"></span>
                                <span class="menu-title"> Bons de Livraison</span>
                                <i class="mdi mdi-chevron-right menu-arrow"></i>
                            </a>
                            <div class="collapse" id="bl">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href=""> <span
                                                class="mdi mdi-list-box">Liste des Bons</span></a></li>

                                    <li class="nav-item"> <a class="nav-link" href=""> <span
                                                class="mdi mdi-note-plus">nouveau Bon</span></a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('getAdminLogout') }}">
                                <i class="mdi mdi-logout"></i>
                                <span class="menu-title">Déconnexion</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::check() && Auth::user()->chiefPharmacist()->exists())
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#services" aria-expanded="false"
                                aria-controls="sidebar-layouts">
                                <span class="mdi mdi-office-building"></span>
                                <span class="menu-title">Gérer Services</span>
                                <i class="mdi mdi-chevron-right menu-arrow"></i>
                            </a>
                            <div class="collapse" id="services">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('listeServices') }}">Liste des services</a></li>
                                    <li class="nav-item"> <a class="nav-link"
                                            href="{{ route('getService') }}">Ajouter Service</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('getAdminLogout') }}">
                                <i class="mdi mdi-logout"></i>
                                <span class="menu-title">Déconnexion</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::check() && Auth::user()->doctor()->exists())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bondecommande') }}">
                                Etablir Bon de commande
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bons-de-commande.medecin') }}">
                                Mes bons de commande
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ordonnance.create') }}">
                                Prescrire une ordonnance
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('getAdminLogout') }}">
                                <i class="mdi mdi-logout"></i>
                                <span class="menu-title">Déconnexion</span>
                            </a>
                        </li>
                    @endif





                </ul>
            </nav>
            <!-- partial -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card px-2">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <h5 class="text-right my-5">Bon de Commande Numéro:
                                            {{ $bonCommande->num_bcf }}</h5>
                                        <hr>
                                    </div>

                                    <div class="container-fluid d-flex justify-content-between">
                                        <div class="col-lg-3 ps-0">
                                            <p class="mt-5 mb-2"><b>Dénomination:CHU BEJAIA</b></p>
                                            <p><br>Adresse :Béjaia<br>Téléphone et fax:</p>
                                            <p> Date {{ $bonCommande->date }}</p>
                                        </div>
                                        <div class="col-lg-3 pr-0">
                                            <p class="mt-5 mb-2 text-right"><b>Nom et Prénom:Pharmacie Centrale Des
                                                    Hopitaux </b></p>
                                            <p class="text-right"> Annexe:Annexe Alger<br>Adresse de l'annexe:Route de
                                                wilaya,Oued Smar<br> Dar el Beida, Alger</p>
                                        </div>
                                    </div>


                                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                                        <div class="table-responsive w-100">
                                            <table class="table">
                                                <thead>
                                                    <tr class=" text-white" style="background-color: #D3D3D3">
                                                        <th>ID DCI</th>
                                                        <th>Dénomination commune internationale</th>
                                                        <th class="text-right">Quantité demandée</th>
                                                        <th class="text-right">Quantité en stock</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($bonCommande->lignesBCF as $ligne)
                                                        <tr class="text-right">
                                                            <td class="text-left">{{ $ligne->dci->IDdci }}</td>
                                                            <td class="text-left">{{ $ligne->dci->dci }} -
                                                                {{ $ligne->dci->forme }} - {{ $ligne->dci->dosage }}
                                                            </td>
                                                            <td>{{ $ligne->quantite_commandee }}</td>
                                                            <td>{{ $ligne->quantite_restante ?? 'N/A' }}</td>
                                                            <td>
                                                                <button class="btn btn-primary" data-toggle="modal"
                                                                    data-target="#editModal-{{ $ligne->id }}">Modifier</button>
                                                            </td>

                                                            <td>
                                                                @if (auth()->user()->isChiefPharmacist() && !$bonCommande->is_validated)
                                                                    <form
                                                                        action="{{ route('validerBCF', ['id' => $bonCommande->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-success">Valider le bon de
                                                                            commande</button>
                                                                    </form>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="container-fluid w-100">

                                        <form action="{{ route('bonCR', $bonCommande->id) }}" method="GET">
                                            <button type="submit" class="btn btn-primary"
                                                style="margin-top: 15px;">Réceptionner</button>

                                            <a href="#" class="btn btn-primary" style="margin-top: 15px;"><i
                                                    class="mdi mdi-printer me-1"></i>imprimer</a>


                                        </form>

                                        <button class="btn btn-success"
                                            onclick="window.history.back()">Retour</button>



                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>




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
                    <!-- Modals for editing lines -->
                    @foreach ($bonCommande->lignesBCF as $ligne)
                        <div class="modal fade" id="editModal-{{ $ligne->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="editModalLabel-{{ $ligne->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel-{{ $ligne->id }}">Modifier la
                                            ligne du bon de commande</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('updateBCF', ['id' => $ligne->id]) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            @if ($bonCommande->is_validated == '1')
                                                <div class="alert alert-info">Ce bon de commande est validé et ne peut
                                                    pas être modifié.</div>
                                            @else
                                                <div class="form-group">
                                                    <label for="dci-{{ $ligne->id }}">DCI</label>
                                                    <select id="dci-{{ $ligne->id }}" name="dci"
                                                        class="form-control">
                                                        @foreach ($dcis as $dci)
                                                            <option value="{{ $dci->id }}"
                                                                {{ $ligne->dci->id == $dci->id ? 'selected' : '' }}>
                                                                {{ $dci->dci }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="quantite_commandee-{{ $ligne->id }}">Quantité
                                                        commandée</label>
                                                    <input type="number" id="quantite_commandee-{{ $ligne->id }}"
                                                        name="quantite_commandee" class="form-control"
                                                        value="{{ $ligne->quantite_commandee }}">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach

                    <!-- Inclure jQuery -->
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <!-- Inclure Bootstrap JavaScript -->
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
                    <!-- Inclure jQuery -->
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <!-- Inclure Bootstrap JavaScript -->
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</div>
</div>
</div>
</div>
</div>
</div>
</div>








<script>
    function toggleEditForm(id) {
        var form = document.getElementById('edit-form-' + id);
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'table-row';
        } else {
            form.style.display = 'none';
        }
    }
</script>

{{-- <script>
    function openEditModal(ligneId) {
        // Récupérer les informations de la ligne à modifier
        let ligne = {!! $bonCommande->lignesBCF->toJson() !!}.find(l => l.id === ligneId);

        // Pré-remplir les champs du formulaire modal
        $('#editDci').val(ligne.id_dci);
        $('#editQuantiteCommandee').val(ligne.quantite_commandee);

        // Ouvrir le modal de modification
        $('#editModal').modal('show');

        // Soumettre le formulaire de modification
        $('#editForm').submit(function(event) {
            event.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                url: `/updateLigneBCF/${ligneId}`, // Assurez-vous que votre route est correcte
                type: 'PUT',
                data: formData,
                success: function(response) {
                    // Fermer le modal après la soumission réussie
                    $('#editModal').modal('hide');
                    alert('Ligne mise à jour avec succès');
                    // Recharger la page ou actualiser la liste des BCF si nécessaire
                    // window.location.reload();
                },
                error: function(xhr) {
                    // Gérer les erreurs de validation ou autres
                    console.error(xhr.responseText);
                }
            });
        });
    }
</script>


 --}}

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendors/js/vendor.bundle.base.js"></script>
<script src="/assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="/assets/js/off-canvas.js"></script>
<script src="/assets/js/hoverable-collapse.js"></script>
<script src="/assets/js/misc.js"></script>
<script src="/assets/js/settings.js"></script>
<script src="/assets/js/todolist.js"></script>
<script src="/assets/js/data-table.js"></script>
</body>

</html>
