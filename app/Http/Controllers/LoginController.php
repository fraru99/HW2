<?php

    use Illuminate\Routing\Controller;
    use App\Models\Credenziali;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Hash;


    class LoginController extends Controller
    {
        public function login()
        {
            
            if(Session::get('id_utente') != null)
            {
                return redirect("home");
            }
            else
            {
                return view('login')
                ->with('csrf_token', csrf_token());
            }
        }

        public function checkLogin()
        {            
            $user = Credenziali::where('username', request('username'))->first();
            
            if(isset($user) && Hash::check(request('password'), $user->password))
            {
                
                Session::put('id_utente', $user->id);
                return redirect("home");
                
            }
            else
            {
                return redirect('login')->withInput();
            }
            
        }

        public function checkUsername($user)
        {
            $check = Credenziali::where('username',$user)->first();

            if(isset($check))
            {
                return ['ok'=> true];
            }
            else
            {
                return ['ok'=> false];
            }
        }

        public function checkPassword($user, $password)
        {
            $check = Credenziali::where('username',$user)->first();

            if(isset($check) && Hash::check($password, $check->password))
            {
                return ['ok'=> true];
            }
            else
            {
                return ['ok'=> false];
            }
        }

        public function logout()
        {
            Session::flush();
            return redirect('home');
        }

    }


?>