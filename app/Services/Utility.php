<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class Utility
{

    public function getlinks(){
      $currentDate = carbon::today();
      $date = DB::table('FotoDAteienMediaserver')
            ->select('Download','preview','inhaltsbeschreibung', 'GultigAb','GultigBis')
            ->where('APP','upload')
            ->whereDate('GultigAb', '<=',$currentDate)
            ->whereDate('GultigBis','>=',$currentDate)
            ->get()->toArray();
      return $date;
    }

    public function getAllLinks(){
        $currentDate = carbon::today();
        $date = DB::table('FotoDAteienMediaserver')
            ->select('Download','preview','inhaltsbeschreibung', 'GultigAb','GultigBis')
            ->where('APP','upload')
            ->get()->toArray();
        return $date;
    }




}
