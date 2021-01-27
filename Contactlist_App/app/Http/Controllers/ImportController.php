<?php

namespace App\Http\Controllers;

use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;

class ImportController extends Controller{
    /*
     * module imported from https://blog.quickadminpanel.com/how-to-import-csv-in-laravel-and-choose-matching-fields/
     */
    public function getImport(){
        return view('import');
    }

    public function parseImport(CsvImportRequest $request){
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));
        $csv_data = array_slice($data, 0, 2);
        return view('import_fields', compact('csv_data'));


    }

}
