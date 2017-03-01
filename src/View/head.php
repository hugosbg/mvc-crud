<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title ?></title>
    <link href="https://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
    <a class="navbar-brand" href="/">CRUD</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/cadastrar">Cadastrar</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="/buscar" method="post">
            <input class="form-control mr-sm-2" type="text" name="q" placeholder="ID/Descrição">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
</nav>
