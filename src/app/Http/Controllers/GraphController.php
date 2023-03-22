<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraphController extends Controller
{

    public function languages()
    {
        $languages = Language::
                leftJoin('records', 'records.language_id', '=', 'languages.id')
                ->select('languages.language', DB::raw("SUM(records.study_time) as sum") , 'languages.colour')
                ->groupBy('languages.language')
                ->groupBy('languages.colour')
                ->get();
        $languages_data = $languages->values();
        dd($languages);

        return view('webapp', compact('languages_data'));
    }

}
