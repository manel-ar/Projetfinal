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
        <h2>États de Stock</h2>
        <form action="{{ route('etat.stock') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="start_date">Date de début</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">Date de fin</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
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
