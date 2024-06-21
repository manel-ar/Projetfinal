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
                                <h4 class="card-title">Bon de Livraison ordonnance</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-9">
                                        <form action="{{ route('bonlivraisonord.store', ['id_ordonnance' => $ordonnance->id]) }}" method="POST">
                                            @csrf
                                            <div class="form-group row">
                                                <!-- ajoter num bc -->
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"> N° Bon de commande :</label>
                                                    <div class="col-sm-9">
                                                        <p class="form-control-plaintext">{{ $ordonnance->num_ordo }}</p>
                                                        <input type="hidden" name="id_ordonnance" value="{{ $ordonnance->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date" class="col-sm-3 col-form-label">En Date du:</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="date" required class="short-input" style="border: none;">
                                                </div>
                                                <input type="hidden" name="id_bcs" value="{{ $ordonnance->id_bcs }}">

                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <table id="order-listing" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>IDdci</th>
                                                                <th>DCI/Forme/Dosage</th>
                                                                <th>Date de Péremption</th>
                                                                <th>Quantité Demandée</th>
                                                                <th>Quantité Livrée</th>
                                                                <th>Quantité Restante</th>
                                                                <th>Prix Unitaire</th>
                                                                <th>Montant</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($ordonnance->lignes as $loopIndex => $ligne)
                                                            <tr>
                                                                <td>{{ $ligne->nomCommercial->dci->IDdci }}</td>
                                                                <td>{{ $ligne->nomCommercial->dci->dci }} - {{ $ligne->nomCommercial->dci->forme }} - {{ $ligne->nomCommercial->dci->dosage }}</td>
                                                                <td>{{ $ligne->nomCommercial->dci->date_peremption }}</td>
                                                                <td>{{ $ligne->quantite_demandee }}</td>
                                                                <input type="hidden" name="lignes[{{ $loopIndex }}][id_commerc]" value="{{ $ligne->id_commerc }}">
                                                                <input type="hidden" name="lignes[{{ $loopIndex }}][quantite_demandee]" value="{{ $ligne->quantite_demandee }}">
                                                                <td><input type="number" name="lignes[{{ $loopIndex }}][quantite_livree]" required class="form-control-plaintext short-input" oninput="updateQuantiteRestante('{{ $loopIndex }}', '{{ $ligne->quantite_demandee }}'); updateMontant('{{ $loopIndex }}');" data-quantite-demandee="{{ $ligne->quantite_demandee }}"></td>
                                                                <td><input type="number" name="lignes[{{ $loopIndex }}][quantite_restante]" required class="form-control-plaintext short-input" readonly id="quantite_restante_{{ $loopIndex }}"></td>
                                                                <td>
                                                                    {{ $ligne->nomCommercial->dci->prix_unitaire }}
                                                                    <input type="hidden" name="lignes[{{ $loopIndex }}][prix_unit]" value="{{ $ligne->nomCommercial->dci->prix_unitaire }}">
                                                                </td>
                                                                <td><input type="number" name="lignes[{{ $loopIndex }}][Montant]" required class="form-control-plaintext short-input" readonly></td>
                                                            </tr>
                                                            @endforeach


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Envoyer</button>
                                            <button type="reset" class="btn btn-light" style="margin-top: 5px; border: 1px solid #65D7CA;">Annuler</button>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif

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


            <!-- Inclure jQuery -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <!-- Inclure Bootstrap JavaScript -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
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
    <script>
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
    </script>
</body>

</html>