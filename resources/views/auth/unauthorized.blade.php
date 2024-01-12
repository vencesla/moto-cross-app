<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Unauthorized</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <div class="container text-center">
        <h1 class="display-4">Unauthorized</h1>
        <p class="lead">You do not have permission to access this page.</p>
        @auth
            @()
            <a class="btn btn-primary" href="{{ url('/home') }}">Retour à la page d'acceil</a>
        @else
            <a class="btn btn-primary" href="{{ url('/') }}">Retour à la page de connexion</a>
        @endauth
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
