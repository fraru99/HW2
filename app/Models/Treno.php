<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Treno extends Model{

        protected $table = 'trenos';

        protected $fillable = [
            'capienza_massima',
            'velocita_massima',
            'anno',
            'tipologia',
            'nome',
            'descrizione',
            'immagine'
        ];
    }

?>