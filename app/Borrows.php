<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Borrows extends Model
{

    public function borrowers(){
        return $this->hasOne('\App\Borrowers','id');
    }

    public function status(){
      $today = Carbon::today();
      $issued = Carbon::parse($this->created_at);
      $issue_interval = \DB::table('libraries')->get()->first()->issue_interval;
      $days_left = $issue_interval - $today->diffInDays($issued);

      if($days_left <= 0){
        return 'Charging Fine';
      }

      return $days_left.' Days Left';

    }
}
