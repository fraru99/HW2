<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Pacchetti extends Model{

        protected $table = 'pacchettis';

        protected $fillable = [
            'nome',
            'descrizione',
            'sotto_descrizione',
            'immagine',
            'tipologia',
            'prezzo'
        ];

        
        public function credenzialis()
        {
            return $this->belongsToMany('credenziali', 'carrello');
        }

    }

?>