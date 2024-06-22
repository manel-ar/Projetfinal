<!-- resources/views/quantite-form.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantité Livrée et Reçue</title>
</head>
<body>
    <h1>Quantité Livrée et Reçue</h1>
    <form action="{{ route('get.quantite') }}" method="POST">
        @csrf
        <label for="start_date">Date de début:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="end_date">Date de fin:</label>
        <input type="date" id="end_date" name="end_date" required>

        <button type="submit">Soumettre</button>
    </form>

    @if(isset($dcisLivree) && isset($dcisRecue))
        <h2>Quantités Livrées</h2>
        @foreach($dcisLivree as $dci)
            <p>{{ $dci->name }}: {{ $dci->quantiteLivreEntreDates($startDate, $endDate) }}</p>
        @endforeach

        <h2>Quantités Reçues</h2>
        @foreach($dcisRecue as $dci)
            <p>{{ $dci->name }}: {{ $dci->quantiteRecueEntreDates($startDate, $endDate) }}</p>
        @endforeach
    @endif
</body>
</html>
