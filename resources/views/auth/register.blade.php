<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1 class="text-center">Register</h1>
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="dni" class="form-label">Rol</label>
                        <select class="form-select" name="rol" id="">
                            <option value="" selected>Seleccionar un rol</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Usuario">Usuario</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label">Dni</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni') }}" required>
                        @error('dni')
                        <small class="text-danger mt-1">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input type="password" class="form-control" id="code" name="code" value="{{ old('code') }}" required>
                        @error('code')
                        <small class="text-danger mt-1">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <label class="form-check-label" for="exampleCheck1">Recordarme</label>
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>