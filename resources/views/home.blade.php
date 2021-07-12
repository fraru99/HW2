<html>
  <head>
    <title>Web Programming: UNICT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Open+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url("css/home.css")}}">
    <script src="{{ url("js/home.js")}}" defer></script>
  </head>
  
  <body>
    <header>
      <div class="overlay"></div>
      <nav>
        <div id="logo">
          Web Programming - HW2
        </div>
        <div id="links">
          <a href="{{ url("treni") }}">TRENI</a>
          <a href="{{ url("tour") }}">TOUR</a>
          <a href="{{ url("infoViaggi") }}">INFO META VIAGGI</a>
          @if (session('id_utente') != null)
          <a href="{{ url("logout") }}">LOGOUT</a>
            <a href="{{ url("carrello") }}" class="oggetti_carrello"> <img  class="carrello_nav" src="{{ url("foto/carrello/carrello_vuoto.png")}}"></a>
          @else
            <a href="{{ url("login") }}">LOGIN</a>
          @endif           
        </div>
        <div id="mainbox">&#9776;</div>
        <div id="menu" class='sidemenu'>
          <a href="{{ url("treni") }}">-TRENI</a>
          <a href="{{ url("tour") }}">-TOUR</a>
          <a href="{{ url("infoViaggi") }}">-INFO META VIAGGI</a>
          @if (session('id_utente') != null)
            <a href="{{ url("logout") }}">-LOGOUT</a>
            <a href="{{ url("carrello") }}" class="oggetti_carrello_mobile"><img  class="carrello_nav" src="{{ url("foto/carrello/carrello_vuoto.png")}}"></a>
          @else
              <a href="{{ url("login") }}">-LOGIN</a>
          @endif           
          <a href="#" class='closebtn'>&times;</a>
        </div>
      </nav>

      <h1>
        <em>-Benvenuti a bordo-</em><br>
        <strong>Goditi un viaggio fantastico</strong>
      </h1>

      <div id="section_header" class='shadow-box-r'>
        <div class="inside">
          <h1>-Riscopri il piacere di viaggiare in treno-</h1>
          <p>A bordo delle nostre carrozze non viaggerete solo in Europa, ma anche in epoche lontane,
            riproducendo l'eleganza e il fascino dell'epoca d'oro del viaggio.
         </p>
        <div>
        </div>
    </header>

    <section>
      <div id="central">
        <div id="uno">
          <img src="../foto/foto1/section_1.jpg" class='shadow-box-r'>
            <h1><em>-Esplora-</em></h1>
            <p>Guarda i luoghi più suggestivi delle tue destinazioni e e viaggia attraverso la loro storia.</p>
            <a href="{{ url("infoViaggi") }}" class="button">Info</a>
        </div>

        <div id="due">
          <img src="../foto/foto1/section_2.jpg" class='shadow-box-r'>
            <h1><em>-Decidi-</em></h1>
                <p>Viaggia su treni futuristici oppure fai un salto nel passato con i treni classici.</p>
                <a href="{{ url("treni") }}" class="button">Info</a>
        </div>
      </div>

      <div id="mid" class='shadow-box-r'>
        <div class="image_text">
          <h1><em>-Un viaggio attraverso le immagini-</em></h1>
          <p>Ammirate da vicino questo treno storico e i luoghi suggestivi dove esso potra' portarvi.</p>
          <a href="{{ url("tour") }}" class="button">Info</a>
        </div>
      </div>
    </section>

    <footer>
      <address>Cittadella Universitaria - Catania</address>
      <p>Francesco Russo (O46002304)</p>
    </footer>
    
  </body>
</html>