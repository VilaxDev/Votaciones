<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-dark" style="height: 100vh;">
                <h1 class="text-center text-white mt-5 mb-5">SISTEMA DE VOTACIONES</h1>
                @error('invalid_credentials')
                    <small class="text-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
                <form action="{{ route('login.verify') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="dni" class="form-label text-white">INGRESE SU NUMERO DE DNI :</label>
                        <input type="text" class="form-control" id="dni" name="dni"
                            value="{{ old('dni') }}" required>
                        @error('dni')
                            <small class="text-danger mt-1">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label text-white">INGRESE SU CODIGO :</label>
                        <input type="password" class="form-control" id="code" name="code"
                            value="{{ old('code') }}" required>
                        @error('code')
                            <small class="text-danger mt-1">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <label class="form-check-label text-white" for="exampleCheck1">Recordarme</label>
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">EMPEZAR A VOTAR</button>
                    </div>
                </form>
            </div>
            <div class="col-md-9">
                <img src="{{ url('images/votaciones.jpg') }}" alt="" class="image">
            </div>
            <style>
                .image {
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-position: center;
                    height: 100vh;
                    margin: 0;
                    width: 100%;
                }
            </style>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
