<?php

use App\Http\Controllers\ProfileController;
use App\Models\Attestation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test',function (){
    $attestation = Attestation::with(['stagiaire', 'stage', 'bureau', 'service'])->find(3);


    if (!$attestation) {
        return response()->json(['error' => 'Attestation not found'], 404);
    }


    $attestations = Attestation::with('stagiaire.etablissement')->get();
    $etablissements = [];
    foreach ($attestations as $att) {
        $etablissements[$att->stagiaire->id] = $att->stagiaire->etablissement->nom;
    }


    $data = [
        'attestation' => $attestation,
        'etablissements' => $etablissements,
        'title' => 'Attestation',
        'date' => date('m/d/Y')
    ];
    return view('pdf.generate',$data);
});
Route::get('/dashboard', function () {
    return view('dashboard',[
        'nbrbur'=>\App\Models\Bureau::all()->count(),
        'nbrsta'=>\App\Models\Stagiaire::all()->count(),
        'nbrets'=>\App\Models\Etablissement::all()->count(),
        'nbrstage'=>\App\Models\Stage::all()->count(),
        'nbrabs'=>\App\Models\Absence::all()->count(),
        'nbrattes'=>\App\Models\Attestation::all()->count()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/stagiaires',[\App\Http\Controllers\StagiaireController::class,'show'])->name('stagiaire.show');
    Route::get('/stagiaires/create',[\App\Http\Controllers\StagiaireController::class,'create'])->name('stagiaires.create');
    Route::post('/stagiaires/store',[\App\Http\Controllers\StagiaireController::class,'store'])->name('stagiaires.store');
    Route::delete('/stagiaires/{id}/destroy', [\App\Http\Controllers\StagiaireController::class, 'destroy'])->name('stagiaires.destroy');
    Route::get('/stagiaires/{id}/edit', [\App\Http\Controllers\StagiaireController::class, 'edit'])->name('stagiaires.edit');
    Route::put('/stagiaires/{id}', [\App\Http\Controllers\StagiaireController::class, 'update'])->name('stagiaires.update');
    Route::get('/stagiaires/{id}', [\App\Http\Controllers\StagiaireController::class, 'show'])->name('stagiaires.detail');



    Route::get('/Etablissements',[\App\Http\Controllers\EtablissementController::class,'index']
    )->name('Etablissements') ;
    Route::get('/etablissements/create',[\App\Http\Controllers\EtablissementController::class,'create'])->name('etablissements.create');
    Route::post('/etablissements/store',[\App\Http\Controllers\EtablissementController::class,'store'])->name('etablissements.store');
    Route::delete('/etablissements/{id}',[\App\Http\Controllers\EtablissementController::class,'destroy'])->name('etablissements.destroy');
    Route::get('/etablissements/edit/{id}',[\App\Http\Controllers\EtablissementController::class,'edit'])->name('etablissements.edit');
    Route::put('etablissements/update/{id}',[\App\Http\Controllers\EtablissementController::class,'update'])->name('etablissements.update');


    Route::get('/',[\App\Http\Controllers\BureauController::class,'index'])->name('stagiaires.bureau');
    Route::delete('/bureau/{id}', [\App\Http\Controllers\BureauController::class, 'destroy'])->name('bureau.destroy');
    Route::get('/bureau/{id}/edit', [\App\Http\Controllers\BureauController::class, 'edit'])->name('bureau.edit');
    Route::put('/bureau/{id}', [\App\Http\Controllers\BureauController::class, 'update'])->name('bureau.update');
    Route::get('/bureaux/create', [\App\Http\Controllers\BureauController::class, 'create'])->name('bureau.create');
    Route::post('/bureau', [\App\Http\Controllers\BureauController::class, 'store'])->name('bureau.store');


    Route::get('/absences/index',[\App\Http\Controllers\AbscencesController::class,'index'])->name('absences.index');
    Route::get('absences/create',[\App\Http\Controllers\AbscencesController::class,'create'])->name('absences.create');
    Route::post('/absences/store',[\App\Http\Controllers\AbscencesController::class,'store'])->name('absences.store');
    Route::get('/absences/edit/{id}',[\App\Http\Controllers\AbscencesController::class,'edit'])->name('absences.edit');
    Route::put('/absences/update/{id}',[\App\Http\Controllers\AbscencesController::class,'update'])->name('absences.update');
    Route::delete('/absences/{id}', [\App\Http\Controllers\AbscencesController::class, 'destroy'])->name('absences.destroy');


    Route::get('/services/index',[\App\Http\Controllers\ServiceController::class,'index'])->name('services.index');
    Route::get('/services/create',[\App\Http\Controllers\ServiceController::class,'create'])->name('services.create');
    Route::post('/services/store',[\App\Http\Controllers\ServiceController::class,'store'])->name('services.store');
    Route::get('/services/edit/{id}',[\App\Http\Controllers\ServiceController::class,'edit'])->name('services.edit');
    Route::put('/services/update/{id}',[\App\Http\Controllers\ServiceController::class,'update'])->name('services.update');
    Route::delete('/services/{id}', [\App\Http\Controllers\ServiceController::class, 'destroy'])->name('services.destroy');

    Route::get('/generate-pdf/{id}', [\App\Http\Controllers\AttestationController::class, 'generatePDF'])->name('generate');
    Route::post('/filtersta',[\App\Http\Controllers\StagiaireController::class,'search'])->name('filtersta');
    Route::post('/filterabs',[\App\Http\Controllers\AbscencesController::class,'filterabs'])->name('filterabs');
    Route::get('/Stagiaires',[\App\Http\Controllers\StagiaireController::class,'index']
    )->name('Stagiaires') ;

    Route::post('/stages/store',[\App\Http\Controllers\StagesController::class,'store'])->name('stages.store');
    Route::get('/stage',[\App\Http\Controllers\StagesController::class,'index'])->name('stagiaires.stage');
    Route::get('/stages/create',[\App\Http\Controllers\StagesController::class,'create'])->name('stages.create');
    Route::delete('/stages/{id}', [\App\Http\Controllers\StagesController::class, 'destroy'])->name('stages.destroy');
    Route::get('/stages/{id}/edit', [\App\Http\Controllers\StagesController::class, 'edit'])->name('stages.edit');
    Route::put('/stages/{id}', [\App\Http\Controllers\StagesController::class, 'update'])->name('stages.update');


    Route::get('/Attestations',[\App\Http\Controllers\AttestationController::class,'index'])->name('Attestations') ;
    Route::delete('/attestations/{id}',[\App\Http\Controllers\AttestationController::class,'destroy'])->name('attestations.destroy');

    Route::post('/attestations/{id}/update-statut', [\App\Http\Controllers\AttestationController::class, 'updateStatut'])->name('update_attestation_statut');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

