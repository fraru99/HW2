<?php

    use App\Models\Treno;
    use Illuminate\Routing\Controller;


    class TreniController extends Controller{

        public function treni()
        {
            return view('treni');
        }

        public function CaricaTreni()
        {
            $query = Treno::all();

            return $query;
        }
    }

?>