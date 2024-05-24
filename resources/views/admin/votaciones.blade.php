<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .table-margin-top {
            margin-top: 50px;
            /* Puedes ajustar el valor según sea necesario */
        }

        .button-margin-top {
            margin-top: 50px;
            /* Puedes ajustar el valor según sea necesario */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: rgba(168, 22, 85, 0.767);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcsTLc0KFTEh-E9vbV1Kvdild0b2a65Ds65w&usqp=CAU" alt="Bootstrap" width="80" height="55">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ url('votaciones') }}">VOTAR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">CONTACTANOS</a>
                    </li>



                </ul>
                <div class="dropdown d-flex justify-content-end">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        User: {{ $dni }}
                    </button>
                    <ul class="dropdown-menu">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li>
                                <button type="submit" class="dropdown-item"><strong>CERRAR SESSION</strong></button>
                            <li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 table-margin-top">
                <table class="table table-bordered border border-secondary border-2 p-top 10em">
                    <thead>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CONSEJO DIRECTIVO 2024 - 2025</td>
                            <td class="text-center">
                                <a href="{{ url('votaciones') }}" class="btn btn-primary">Ver Lista</a>
                            </td>
                        </tr>
                        <tr>
                            <td>FIAL CHANCAMAYO 2024 - 2025</td>
                            <td class="text-center">
                                <a href="{{ url('votaciones') }}" class="btn btn-primary">Ver Lista</a>
                            </td>
                        </tr>
                        <tr>
                            <td>COMITE DE TRIBULACION Y FISCALIDAD</td>
                            <td class="text-center">
                                <a href="{{ url('votaciones') }}" class="btn btn-primary">Ver Lista</a>
                            </td>
                        </tr>
                        <tr>
                            <td>COMITE DE PERITAJE CORITABLE JUDICIAL Y FISCAL</td>
                            <td class="text-center">
                                <a href="{{ url('votaciones') }}" class="btn btn-primary">Ver Lista</a>
                            </td>
                        </tr>
                        <tr>
                            <td>COMITE JUDICIAL Y FISCAL</td>
                            <td class="text-center">
                                <a href="{{ url('votaciones') }}" class="btn btn-primary">Ver Lista</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>