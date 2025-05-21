<?php namespace App\Reporting;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesReporter
{
    public function between($startDate, $endDate)
    {
        // Check if the user is authenticated
       // if(!Auth::check()) throw new Exception("Authentication required");

        // get sales from the database
        $sales = $this->queryDBForSalesBetween($startDate, $endDate);

        // format the sales data
        return $this->format($sales);

    }

    protected function queryDBForSalesBetween($startDate, $endDate)
    {
   
        return DB::table('sales')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('amount');
    }

    protected function format($sales)
    {
        // Format the sales data
        return "<h1>Sales: $sales</h1>";
    }
}

