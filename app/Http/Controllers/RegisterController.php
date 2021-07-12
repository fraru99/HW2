<?php

    use Illuminate\Routing\Controller;
    use App\Models\Credenziali;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;


    class RegisterController extends Controller
    {
        public function registrazione()
        {
            if (session('id_utente') != null) 
            {
                return redirect('home');
            }
            else
            {
                return view('registrazione')
                ->with('csrf_token', csrf_token());
            }
        }

        public function create()
        {
            $request = request();

            if($this->Errori($request) === 0)
            {
                $newUser =  Credenziali::create([
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'mail' => $request->mail,
                    'nome' => $request->nome,
                    'cognome' => $request->cognome,
                ]); 
    
                if ($newUser) {
                    Session::put('id_utente', $newUser->id);
                    return redirect('home');
                } 
                else {
                    return redirect('registrazione')->withInput();
                }
            }
        }


        public function checkUsername($query)
        {
            $check = Credenziali::where('username',$query)->first();

            if(isset($check))
            {
                return ['ok'=> true];
            }
            else
            {
                return ['ok'=> false];
            }
        }

        public function checkEmail($query)
        {
            $check = Credenziali::where('mail',$query)->first();

            if(isset($check))
            {
                return ['ok'=> true];
            }
            else
            {
                return ['ok'=> false];
            }
        }

        public function Errori($count)
        {
            $error = array();


            if(!preg_match('/^[a-zA-Z0-9_-]{1,15}$/', $count['username']))
            {
                $error[] = "Username non valido";
            }
            else
            {
                $username = Credenziali::where('username', $count['username'])->first();
                if ($username !== null) {
                    $error[] = "Username già utilizzato";
                }
            }

            if (!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $count['mail'])) 
            {
                $error[] = "Email non valida";
            } 
            else 
            {
                $mail = Credenziali::where('mail', $count['mail'])->first();
                if ($mail !== null) 
                {
                    $error[] = "Email già utilizzata";
                }
            }
            

            if (strlen($count["password"]) < 8) 
            {
                $error[] = "Caratteri password insufficienti";
            } 
            
            if (strcmp($count["password"], $count["conferma_password"]) != 0) 
            {
                $error[] = "Le password non coincidono";
            }


            return count($error);
        }
    }
?>