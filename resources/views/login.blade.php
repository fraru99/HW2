<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='{{ url("css/login.css")}}'>
    <script src='{{ url("js/login.js")}}' defer></script>
    <title>Pagina Login</title>
</head>
<body>
    <main>
        <h1>
            <em>ACCEDI</em><br>
            <p>-Il meraviglioso mondo dei treni ti attende!-</p>
        </h1>
        <img src="{{ url("foto/postcard2.png")}}">
        <form action="{{ route('login') }}" name = 'form_dati' method="POST">
            <input type="hidden" name="_token" value="{{ $csrf_token }}">
            <label>Nome Utente:</label>
            <div class="testo">
                <input type="text" name="username" id="username input">
                <p class="hidden username_error">Username non valido!</p>
            </div>

            <label>Password:</label>
            <div class="testo">
                <input type="password" name="password" id="password input">
                <p class="hidden password_error">Password non valida!</p>
            </div>

            <div class='invio'>
                <label>&nbsp<input type="submit" class="button"></label>
            </div>
        </form>
    </main>
    <div id="registrati">
        <p>Non hai un account?</p>
        <a href='{{ url("registrazione") }}'>Registrati</a>
    </div>
</body>
</html>