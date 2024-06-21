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
    <link rel="stylesheet" href="/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="https://demo.bootstrapdash.com/xollo/template/assets/images/favicon.ico" />

    <style>
        .col-12.col-md-4 {
            text-align: justify;
        }

        img {
            margin-left: 20%;
        }

        h3 {
            margin-left: 20%;
            margin-top: 15px;
        }

        .card {
            height: 600px;
        }

        .card-header {
            background-color: #fff;
        }

        #medc {
            margin-left: 15%;
        }


        input {
            border: none;
            outline: none;
        }

        @media print {
            .navbar {
                display: none;
            }

            .btn {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

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

            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">


            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Data table </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data table</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="container">
                                <div class="card text-center" style="margin: 20px auto; width: 80%;">
                                    <div class="card-header">
                                        <h6> المركز الاستشفائي الجامعي-بجاية<br> Centre Hospitalo Universitaire Bejaia</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <div id="medc">
                                                    <div>
                                                        <p>Médecin : {{ $medecin->user->name }}</p>
                                                    </div>
                                                    <div>
                                                        <p>Service : {{ $ordonnance->bonCommandeService->service->nom_service }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <img src="/images/ordo.jpg" alt="" style="width: 130px;"><br>
                                                <h3>Ordonnance</h3>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div>
                                                    <p>Nom :{{ $ordonnance->nom_patient }}</p>


                                                </div>
                                                <div>
                                                    <p>Prenom :{{ $ordonnance->prenom_patient }}</p>


                                                </div>
                                                <div>
                                                    <p>Age :{{ $ordonnance->age }}</p>


                                                </div>
                                                <div>
                                                    <p>Date : {{ $ordonnance->date }}</p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12">

                                                <ul style="margin-top: 40px;" class="no-bullets">
                                                    @foreach($ordonnance->lignes as $ligne)
                                                    @if ($ligne->nomCommercial && $ligne->nomCommercial->dci)
                                                    <li>
                                                        <span>{{ $ligne->nomCommercial->dci->dci }} - {{ $ligne->nomCommercial->dci->forme }} - {{ $ligne->nomCommercial->dci->dosage }}</span>
                                                        <span>&nbsp;&nbsp;</span>
                                                        <span>Quantité: {{ $ligne->quantite_demandee }}</span>
                                                        <span>&nbsp;&nbsp;</span>
                                                        <span>Posologie: {{ $ligne->posologie }} {{ $ligne->duree }}</span>
                                                    </li>
                                                    @else
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary no-print" onclick="GetPrint()">Imprimer</button>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modifierModal{{ $ordonnance->id }}" title="Modifier l'Ordonnance">Modifier</button>

                            </div>



                            <!-- Modal pour modifier l'ordonnance -->

                            <div class="modal fade" id="modifierModal{{ $ordonnance->id }}" tabindex="-1" role="dialog" aria-labelledby="modifierModalLabel{{ $ordonnance->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modifierModalLabel{{ $ordonnance->id }}">Modifier ordonnance</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if($ordonnance->etat == 'livré')
                                            <div class="alert alert-info">Cet ordonnance est livré et ne peut pas être modifié.</div>
                                            @else
                                            <form action="{{ route('updateord', $ordonnance->id) }}" method="POST" class="custom-form">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="nom_patient">Nom du Patient</label>
                                                    <input type="text" class="form-control" id="nom_patient" name="nom_patient" value="{{ $ordonnance->nom_patient }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="prenom_patient">Prénom du Patient</label>
                                                    <input type="text" class="form-control" id="prenom_patient" name="prenom_patient" value="{{ $ordonnance->prenom_patient }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="age">Âge du Patient</label>
                                                    <input type="number" class="form-control" id="age" name="age" value="{{ $ordonnance->age }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date">Date</label>
                                                    <input type="date" class="form-control" name="date" value="{{ $ordonnance->date }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="lignes">DCI/Forme/Dosage</label>
                                                    <ul class="no-bullets">
                                                        @foreach($ordonnance->lignes as $ligne)
                                                        <li>
                                                            <input type="hidden" name="lignes[{{ $ligne->id }}][id]" value="{{ $ligne->id }}">

                                                            <select class="form-control mb-1 select2" name="lignes[{{ $ligne->id }}][dci]" required>
                                                                @foreach($dcis as $dci)
                                                                <option value="{{ $dci->id }}" @if($dci->id == $ligne->nomCommercial->dci->id) selected @endif>
                                                                    {{ $dci->dci }} - {{ $dci->forme }} - {{ $dci->dosage }}
                                                                </option>
                                                                @endforeach
                                                            </select>


                                                            <input type="number" class="form-control mb-1" name="lignes[{{ $ligne->id }}][quantite_demandee]" value="{{ $ligne->quantite_demandee }}" required>
                                                            <input type="text" class="form-control mb-1" name="lignes[{{ $ligne->id }}][posologie]" value="{{ $ligne->posologie }}">
                                                            <input type="text" class="form-control mb-1" name="lignes[{{ $ligne->id }}][duree]" value="{{ $ligne->duree }}">
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
                                                </div>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <!-- Inclure jQuery -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <!-- Inclure Bootstrap JavaScript -->
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</div>
</div>
</div>
</div>


<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
<footer class="footer">
    <div class="container-fluid clearfix">
        <span class="d-block text-center text-sm-start d-sm-inline-block">Copyright © 2023 <a href="#">BootstrapDash</a>. All rights reserved.</span>
        <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
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
<script>
    function GetPrint() {
        window.print();
    }


    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
</body>

</html>