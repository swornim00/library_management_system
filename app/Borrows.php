<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Borrows extends Model
{

    public function borrowers(){
        return $this->hasOne('\App\Borrowers','id');
    }
}
