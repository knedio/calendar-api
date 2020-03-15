<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'description',
        'date',
    ];
    

    /**
     * Get Events by year and month
     */
    public static function getByYearMonth($year, $month)
    {
        return Event::whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get();
    }
}
