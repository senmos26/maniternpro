<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chivo:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Attestation</title>
{{--    <style> @import url('https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps:wght@400;700&display=swap');--}}
{{--        .oleo-script-swash-caps-regular {--}}
{{--            font-family: "Oleo Script Swash Caps", system-ui;--}}
{{--            font-weight: 200;--}}

{{--            font-style: normal;--}}
{{--            font-size:15px;--}}
{{--        }--}}
{{--        .roboto-thin {--}}
{{--            font-family: "Roboto", sans-serif;--}}
{{--            font-weight: 700;--}}
{{--            font-style: normal;--}}
{{--            font-size: 20px;--}}
{{--        }--}}
{{--        .container{--}}
{{--            margin: 30px;--}}
{{--        }--}}
{{--        .coche{--}}
{{--            width: 20px;--}}
{{--        }--}}

{{--        .chivo {--}}
{{--                    font-family: "Chivo", sans-serif;--}}
{{--                    font-optical-sizing: auto;--}}
{{--                    font-weight: 250;--}}
{{--                    font-style: normal;--}}
{{--                    font-size: 20px;--}}
{{--                }--}}

{{--        body {--}}
{{--            margin: 0;--}}
{{--            padding: 0;--}}
{{--            font-family: 'Roboto', sans-serif;--}}
{{--        }--}}

{{--        .container {--}}
{{--            width: 100%;--}}
{{--            max-width: 700px; /* Ajustez la largeur maximale selon vos besoins */--}}
{{--            margin: 0 auto; /* Centre le contenu horizontalement */--}}
{{--            padding: 30px;--}}
{{--        }--}}

{{--        header, footer {--}}
{{--            text-align: center;--}}
{{--        }--}}

{{--        footer {--}}
{{--            margin-top: 50px; /* Marge supérieure pour le pied de page */--}}
{{--        }--}}
{{--    </style>--}}
</head>
<body >
<div class="container">
    <header>
        <div style="display: flex;justify-content: center">
            <img src="{{asset('logoMEN-Sport-fr.png')}}" height="50">
        </div>

        <div class="oleo-script-swash-caps-regular " style="text-align: center">
            <span>Académie Régionale de l'Education et de Formation </span>
            <div><span>Région de l'Oriental</span>
            </div>
            <span>Direction Provinciale de Berkane</span>
        </div>
        <h1 class="roboto-thin" style="text-align: center">Attestation De Stage</h1>
    </header>
    <hr/>
    <div style="" class="chivo">

        <p class=""><strong>J</strong>e soussigné, Le <strong>D</strong>irecteur
            <strong>P</strong>rovincial du <strong>M</strong>inistère de l'<strong>E</strong>ducation
            <strong>N</strong>ationale, du <strong>P</strong>réscolaire et des <strong>S</strong>ports,
            <strong>D</strong>irection <strong>P</strong>rovinciale de <strong>B</strong>erkane,
            atteste par la présente,que:
        </p>
        <div>
            <div>

                <span>Mr/Mlle:</span> <strong> {{$attestation->stagiaire->nom}} {{$attestation->stagiaire->prenom}}</strong>
            </div>
            <div>

                <span>C.I.N:</span> <strong>{{$attestation->stagiaire->cin}}</strong>
            </div>
            <div>

                <span>Spécialité:</span> <strong>{{$attestation->stage->titre_sujet}}</strong>
            </div>
        </div>
        <p> A effectué un stage au sein de la Direction Provinciale du MENPS - Service:<strong>{{$attestation->service->libelle}} </strong>- Bureau:<strong> {{$attestation->bureau->libelle}} </strong>
        durant la péride s'étalant du <strong>{{$attestation->stage->date_debut}}</strong>
            au <strong>{{$attestation->stage->date_fin}} . </strong>
        </p>
        <p>Cette attestation est délivrée à l'intéressé <strong>(e)</strong> pour servir et valoir
        ce que de droit. </p>
        <p style="float: right; margin-right: 40px">Berkane, le: <strong>{{ now()->format('Y-m-d') }}</strong></p>
    </div>
    <div class="" style="height: 150px">

    </div>
   <hr/>
    <footer style="text-align: center ;margin-top: -8px">
       <div>
           <strong>Direction Proviciale du Ministère à l'intéressé , du Preèscolaire et des Sports -Berkane</strong>
       </div>
        <div>
            <strong>{{$attestation->service->libelle}}</strong>
        </div>
       <div>
           <strong>{{$attestation->bureau->libelle}}</strong>
       </div>
        <div>
            <strong>------------------------------------------------------------------------------</strong>
        </div>
        <div>
            <p>B.P 235 Berkane| Tel: 05 36 61 96 91/ 05 36 61 25 93 | Fax: 05 36 61 96 93</p>
        </div>
    </footer>
</div>

</body>
</html>
