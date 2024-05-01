<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Stagiaires</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;

        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
        }
        h1 {
            margin-bottom: 100px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .add-button {
            background-color: green;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 175px;
            right: 20px;
            text-decoration: none;
        }
        .add-button:hover {
            background-color: darkgreen;
        }
        .search-form {
            margin-bottom: 20px;
        }
        .search-form input[type="text"] {
            padding: 10px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .search-form button {
            padding: 10px 15px;
            background-color: rgb(146, 146, 146);
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-form button:hover {
            background-color: #0056b3;
        }
        .action-icon {
            width: 20px;
            height: 20px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Liste des Stagiaires</h1>

    <form action="" method="GET" class="search-form">
        <button type="submit"><img src="{{ asset('icon/search.png') }}" class="action-icon"></button>
        <input type="text" name="cin" placeholder="Rechercher par CIN">
    </form>

    <a href="#" class="add-button">+ Ajouter nouveau stagiaire</a>

    <table>
        <thead>
        <tr>
            <th>CIN</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Établissement</th>
            <th>Stage</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stagiaires as $stagiaire)
            <tr>
                <td>{{ $stagiaire->cin }}</td>
                <td>{{ $stagiaire->nom }}</td>
                <td>{{ $stagiaire->prenom }}</td>
                <td>{{ $stagiaire->etablissement->nom }}</td>
                <td>{{ $stagiaire->stage->titre_sujet }}</td>
                <td>
                    <a href="#"><img src="{{ asset('icon/edit.png') }}" alt="Modifier" class="action-icon"></a> |
                    <a href="#"><img src="{{ asset('icon/delete.png') }}" alt="Supprimer" class="action-icon"></a> |
                    <a href="#"><img src="{{ asset('icon/side-menu.png') }}" alt="Détails" class="action-icon"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
