<?php

    use App\Models\Carrello;
    use App\Models\Credenziali;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\Session;


    class CarrelloController extends Controller{

        public function carrello()
        {
            return view('carrello');
        }


        public function CaricaCarrello()
        {
            $query = Carrello::join('pacchettis', 'id_pacchetto', '=', 'pacchettis.id')->where("id_utente", Session::get('id_utente'))->get();


            return $query;
        }

        public function OggettiCarrello()
        {
            $query = Credenziali::where('id', Session::get('id_utente'))->select('oggetti_carrello')->get();

            return $query;
        }
    }

?>