<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url("css/registrazione.css")}}">
    <script src="{{ url("js/registrazione.js")}}" defer></script>
    <title>Pagina Registrazione</title>
</head>
<body>
    <h1>-REGISTRATI-</h1>
    <main>
        <img src="../foto/cartolina.jpg" class="shadow-box">
        <form action="{{ route('registrazione') }}" name = 'form_dati_registrazione' method='post'>
            <input type="hidden" name="_token"  value='{{ $csrf_token }}'>



            <label>Nome:</label>
            <div class="testo">
                <input type="text" name="nome" id="nome input">
                <p class="hidden nome_error">Nessun nome inserito!</p>
            </div>

            <label>Cognome:</label>
            <div class="testo">
                <input type="text" name="cognome" id="cognome input">
                <p class="hidden cognome_error">Nessun cognome inserito!</p>
            </div>

            <label>Username:</label>
            <div class="testo">
                <input type="text" name="username" id="username input" placeholder="Max.15 caratteri">
                <p class="hidden username_error">errore</p>
            </div>

            <label>E-Mail:</label>
            <div class="testo">
                <input type="text" name="mail" id="mail input">
                <p class="hidden mail_error">errore</p>
            </div>

            <label>Password:</label>
            <div class="testo">
                <input type="password" name="password" id="password input" placeholder="min 8 caratteri">
                <p class="hidden password_error">la password ha meno di 8 caratteri!</p>
            </div>

            <label>Conferma Password:</label>
            <div class="testo">
                <input type="password" name="conferma_password" id="conferma_password input">
                <p class="hidden password_confirm_error">le password non coincidono!</p>
            </div>
            <div class='invio'>
                <label>&nbsp<input type="submit" class="button"></label>
            </div>
        </form>
    </main>
    <div id="accedi">
        <p>Hai un account?</p>
        <a href="{{ url('login') }}">Accedi</a>
    </div>
</body>
</html>