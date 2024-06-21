<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Xollo</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="https://demo.bootstrapdash.com/xollo/template/assets/images/favicon.ico" />
    <style>
        .form-group.row {
            align-items: center;
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row"></nav>
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
            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar"></nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Bon de Livraison </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bon de Livraison Ordonnance</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header text-center bg-white">
                                <h4 class="card-title">Bon de Livraison</h4>
                            </div>
                            <div class="card-body">
                                <p>Bon N°: {{ $bonLivraison->num_bls }}</p>
                                <p>Date: {{ $bonLivraison->date }}</p>
                                <p>
                                    @if ($bonLivraison->ordonnance)
                                    Bon Commande N°:{{ $bonLivraison->ordonnance->num_ordo }}
                                    @elseif ($bonLivraison->bonCommande)
                                    Bon Commande N°: {{ $bonLivraison->bonCommande->num_bc }}
                                    @endif
                                </p>


                                <div class="row">
                                    <div class="col-12">
                                        <table id="order-listing" class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID DCI</th>
                                                    <th>DCI / Forme / Dosage</th>
                                                    <th>date peremp</th>
                                                    <th>Quantité Demandée</th>
                                                    <th>Quantité Livrée</th>
                                                    <th>Quantité Restante</th>
                                                    <th>Prix_Unit</th>
                                                    <th>Montant</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bonLivraison->lignes as $ligne)
                                                <tr>
                                                    <td>{{ $ligne->nomCommercial->dci->IDdci }}</td>
                                                    <td>{{ $ligne->nomCommercial->dci->dci }} - {{ $ligne->nomCommercial->dci->forme }} - {{ $ligne->nomCommercial->dci->dosage }}</td>
                                                    <td>{{ $ligne->nomCommercial->dci->date_peremption }}</td>
                                                    <td>{{ $ligne->quantite_demandee }}</td>
                                                    <td>{{ $ligne->quantite_livree }}</td>
                                                    <td>{{ $ligne->quantite_restante }}</td>
                                                    <td>{{ $ligne->prix_unit }}</td>
                                                    <td>{{ $ligne->Montant }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>

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
            </div>


        </div>
    </div>
    </div>
    <!-- partial -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="d-block text-center text-sm-start d-sm-inline-block">Copyright © 3 <a href="#">BootstrapDash</a>. All rights reserved.</span>
            <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
        </div>
    </footer>
    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Inclure Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Inclure Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Inclure Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
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

</body>

</html>