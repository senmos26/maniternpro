<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attestation</title>
</head>
<body>
<h1>{{$title}}</h1>
<p>Date: {{$date}}</p>

<h2>Informations sur l'attestation:</h2>
<p>Nom du Stagiaire: {{$attestation->stagiaire->nom}} {{$attestation->stagiaire->prenom}}</p>
<p>Titre du Stage: {{$attestation->stage->titre_sujet}}</p>
<p>Bureau: {{$attestation->bureau->libelle}}</p>
<p>Établissement: {{$etablissements[$attestation->stagiaire->id]}}</p>
<p>Service: {{$attestation->service->libelle}}</p>
<p>Statut: {{$attestation->statut}}</p>
<p>Date de Prise: {{$attestation->date_prise}}</p>
</body>
</html>
