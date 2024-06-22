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




<div class="col-md-12 grid-margin stretch-card">
    <div class="container">
        <h2>États de Stock du {{ $startDate->format('d/m/Y') }} au {{ $endDate->format('d/m/Y') }}</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>DCI</th>
                    <th>Quantité Livrée</th>
                    <th>Quantité Reçue</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dcis as $dci)
                <tr>
                    <td>{{ $dci->dci }}</td>
                    <td>{{ $dci->quantiteLivreEntreDates($startDate, $endDate) }}</td>
                    <td>{{ $dci->quantiteRecueEntreDates($startDate, $endDate) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
