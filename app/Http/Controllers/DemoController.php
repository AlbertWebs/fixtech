<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class DemoController extends Controller
{

    public function importExportView()
    {
       return view('front.import');
    }


    public function export() 
    {
        return Excel::download(new UsersExport, 'products.xlsx');
    }
}
