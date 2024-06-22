<!-- resources/views/quantite-result.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat Quantité Livrée et Reçue</title>
</head>
<body>
    <h1>Résultat Quantité Livrée et Reçue</h1>

    <h2>Période</h2>
    <p>Du {{ $startDate->format('d/m/Y') }} au {{ $endDate->format('d/m/Y') }}</p>

    <h2>Quantités Livrées</h2>
    @foreach($dcisLivree as $dci)
        <p>{{ $dci->name }}: {{ $dci->quantiteLivreEntreDates($startDate, $endDate) }}</p>
    @endforeach

    <h2>Quantités Reçues</h2>
    @foreach($dcisRecue as $dci)
        <p>{{ $dci->name }}: {{ $dci->quantiteRecueEntreDates($startDate, $endDate) }}</p>
    @endforeach

    <a href="{{ route('show.quantite.form') }}">Retour</a>
</body>
</html>
