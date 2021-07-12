<?php

    use Illuminate\Routing\Controller;


    class InfoViaggiController extends Controller{

        public function infoViaggi()
        {
            return view('infoViaggi');
        }


        public function unplash($train_value)
        {
            $link ="https://api.unsplash.com/search/photos?language=en&client_id=" . env('UNPLASH_CLIENT_ID') . "&query=" .$train_value;

            $curl = curl_init($link);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($curl);
            $json = json_decode($data, true);
            curl_close($curl);

            return json_encode($json);
        }

        public function wether($train_value)
        {
            $link = "http://api.weatherstack.com/current?access_key=" . env('WETHER_KEY') ."&format=json&units=m&query=" .$train_value;

            $curl = curl_init($link);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($curl);
            $json = json_decode($data, true);
            curl_close($curl);

            return json_encode($json);
        }
    }

?>