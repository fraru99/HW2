<?php

    use App\Models\Carrello;
    use App\Models\Pacchetti;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Session;


    class TourController extends Controller{

        public function tour()
        {
            return view('tour');
        }

        public function africa()
        {
            return view('pacchetti_africa');
        }

        public function asia()
        {
            return view('pacchetti_asia');
        }



        public function europa()
        {
            return view('pacchetti_eu');
        }


        public function america()
        {
            return view('pacchetti_america');
        }



        public function CaricaEuropa()
        {
            $query = Pacchetti::where("tipologia", "europa")->get();


            return $query;
        }

        public function CaricaAmerica()
        {
            $query = Pacchetti::where("tipologia", "america")->get();


            return $query;
        }

        public function CaricaAsia()
        {
            $query = Pacchetti::where("tipologia", "asia")->get();


            return $query;
        }

        public function CaricaAfrica()
        {
            $query = Pacchetti::where("tipologia", "africa")->get();

            return $query;
        }

        


        public function AggiungiPacchetto($id_pacchetto)
        {
            Carrello::insert(['id_pacchetto' => $id_pacchetto, 'id_utente' => Session::get('id_utente')]);

            $check = Carrello::where('id_pacchetto', $id_pacchetto)->where('id_utente', Session::get('id_utente'))->first();
            if(isset($check))
            {
                return ['ok'=> true];
            }
            else
            {
                return ['ok'=> false];
            }

        }

        public function RimuoviPacchetto($id_pacchetto)
        {
            DB::table('carrellos')->where('id_pacchetto', $id_pacchetto)->where('id_utente', Session::get('id_utente'))->delete();


            $check = Carrello::where('id_pacchetto', $id_pacchetto)->where('id_utente', Session::get('id_utente'))->first();
            if(isset($check))
            {
                return ['ok'=> false];
            }
            else
            {
                return ['ok'=> true];
            }

        }

        public function ControlloAccesso()
        {
            if (session('id_utente') != null) {

                return ['ok' => true];
            }

            return ['ok' => false];
        }

    }

?>