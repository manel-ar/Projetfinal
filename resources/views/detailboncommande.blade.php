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
    <link rel="shortcut icon" href="https://demo.bootstrapdash.com/xollo/template/assets/images/favicon.ico" />
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
                        <div class="card">
                            <div class="card-header text-center bg-white">
                                <h4 class="card-title">Bon de commande service</h4>
                            </div>
                            <div class="card-body">

                                <div>
                                    <p>Bon N°: {{ $bonDeCommande->num_bc }}</p>
                                    <p>Date: {{ $bonDeCommande->date }}</p>
                                    <p>Service: {{ $bonDeCommande->service ? $bonDeCommande->service->nom_service : 'N/A' }}</p>
                                    <p>Médecin: {{ $bonDeCommande->medecin ? $bonDeCommande->medecin->user->name : 'N/A' }}</p>

                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <table id="order-listing" class="table">
                                            <thead>
                                                <tr>
                                                    <th>IDdci</th>
                                                    <th>DCI/Forme/Dosage</th>
                                                    <th>Quantité Demandée</th>
                                                    <th>Quantité Restante</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bonDeCommande->lignes as $ligne)
                                                <tr>
                                                    <td>{{ $ligne->nomCommercial->dci->IDdci }}</td>
                                                    <td>{{ $ligne->nomCommercial->dci->dci }} - {{ $ligne->nomCommercial->dci->forme }} - {{ $ligne->nomCommercial->dci->dosage }}</td>
                                                    <td>{{ $ligne->quantite_demandee }}</td>
                                                    <td>{{ $ligne->quantite_restante }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <td>
                                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modifierModal{{ $bonDeCommande->id }}" title="Modifier le Bon de Commande">Modifier</button>

                                            </td>
                                        </table>
                                    </div>

                                </div>
                                <div class="modal fade" id="modifierModal{{ $bonDeCommande->id }}" tabindex="-1" role="dialog" aria-labelledby="modifierModalLabel{{ $bonDeCommande->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modifierModalLabel{{ $bonDeCommande->id }}">Modifier Bon de Commande</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if($bonDeCommande->etat == 'livré')
                                                <div class="alert alert-info">Ce bon de commande est livré et ne peut pas être modifié.</div>
                                                @else
                                                <form action="{{ route('updateBonDeCommande', $bonDeCommande->id) }}" method="POST" class="custom-form">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group">
                                                        <label for="date">Date</label>
                                                        <input type="date" class="form-control" name="date" value="{{ $bonDeCommande->date }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lignes">DCI/Forme/Dosage</label>
                                                        <ul class="no-bullets">
                                                            @foreach($bonDeCommande->lignes as $ligne)
                                                            <li>
                                                                <select class="form-control mb-1" name="lignes[{{ $ligne->id }}][dci]" required>
                                                                    @foreach($dcis as $dci)
                                                                    <option value="{{ $dci->id }}" @if($dci->id == $ligne->nomCommercial->dci->id) selected @endif>
                                                                        {{ $dci->dci }} - {{ $dci->forme }} - {{ $dci->dosage }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </li>
                                                            <div class="form-group">
                                                                <label for="quantite_demandee">Quantité Demandée</label>
                                                                <ul class="no-bullets">
                                                                    <li><input type="number" class="form-control mb-1" name="lignes[{{ $ligne->id }}][quantite_demandee]" value="{{ $ligne->quantite_demandee }}" required></li>
                                                                </ul>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="quantite_restante">Quantité Restante</label>
                                                                <ul class="no-bullets">
                                                                    <li><input type="number" class="form-control mb-1" name="lignes[{{ $ligne->id }}][quantite_restante]" value="{{ $ligne->quantite_restante }}" required></li>
                                                                </ul>
                                                            </div>
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
</body>

</html>
