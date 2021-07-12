<?php

    use Illuminate\Routing\Controller;


    class HomeController extends Controller{

        public function home()
        {            
            return view("home");//->with("user", $user);
        }

    }

?>