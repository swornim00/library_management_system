<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Borrows extends Model
{
    public function borrowers()
    {
        return $this->hasOne('\App\Borrowers', 'id','borrower_id');
    }

    public function book()
    {
        return $this->hasOne('\App\Books', 'id', 'book_id');
    }

    public function status()
    {
        $today = Carbon::today();
        $issued = Carbon::parse($this->created_at);
        $issue_interval = \DB::table('libraries')->get()->first()->issue_interval;
        $days_left = $issue_interval - $today->diffInDays($issued);

        if ($this->lost == 1){
            return 'Lost';
        }
        
        if ($this->cleared == true) {
            return 'Cleared';
        }
        if ($days_left <= 0) {
            return 'Charging Fine';
        }
        return $days_left.' Days Left';
    }

    public function fine()
    {
        if ($this->status() != 'Charging Fine') {
            return 'Rs. 0';
        }

        $today = Carbon::today();
        $issued = Carbon::parse($this->created_at);
        $issue_interval = \DB::table('libraries')->get()->first()->issue_interval;
        $days_gone = $today->diffInDays($issued) - $issue_interval;
        $fine_amount = \DB::table('libraries')->get()->first()->fine_amount;

        $total_fine = $fine_amount * $days_gone;

        return 'RS. '.$total_fine;
    }
}
