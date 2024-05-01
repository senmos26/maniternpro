<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJOUTER UN STAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Réduire la taille de la police des étiquettes */
        .form-label {
            font-size: 50px;
        }
        /* Réduire la taille des boutons */
        .btn {
            font-size: 20px;
        }
        h3{
            color: white;
        }
        .card {
            width: 100%; /* ajustez la largeur selon vos besoins */
            margin: auto; /* pour centrer la formulaire */
        }
        form{
            font-size: 20px ;
        }
        .form-control{
            height: 55px;
        }
        select{
            height: 55px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success">
                    <h3 class="text-center">AJOUTER UN STAGE</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('stages.store') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label for="titre_sujet" class="col-sm-4 col-form-label">Titre du sujet :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('titre_sujet') is-invalid @enderror" id="titre_sujet" name="titre_sujet" placeholder="Entrez le titre du sujet" value="{{ old('titre_sujet') }}">
                                @error('titre_sujet')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="statut" class="col-sm-4 col-form-label">Statut :</label>
                            <div class="col-sm-8">
                                <select class="form-select @error('statut') is-invalid @enderror" id="statut" name="statut">
                                    <option value="">Sélectionez le statut de stage</option>
                                    <option value="En cours" {{ old('statut') === 'En cours' ? 'selected' : '' }}>En cours</option>
                                    <option value="Terminé" {{ old('statut') === 'Terminé' ? 'selected' : '' }}>Terminé</option>
                                </select>
                                @error('statut')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_debut" class="col-sm-4 col-form-label">Date de début :</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control @error('date_debut') is-invalid @enderror" id="date_debut" name="date_debut" value="{{ old('date_debut') }}">
                                @error('date_debut')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_fin" class="col-sm-4 col-form-label">Date de fin :</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control @error('date_fin') is-invalid @enderror" id="date_fin" name="date_fin" value="{{ old('date_fin') }}">
                                @error('date_fin')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success btn-lg btn-block">Ajouter</button>
                                <a href="{{ route('stages.show') }}" class="btn btn-danger btn-lg btn-block">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
