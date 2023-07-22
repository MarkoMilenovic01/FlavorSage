<?php

namespace App\Http\Controllers;

use App\Models\Export;
use PDF;
use Illuminate\Http\Request;



class ExportController extends Controller
{

    public function pdf1Download(){

        if(auth()->user()->isAdmin()){
            $data = Export::usersAndCount();
                    
            $pdf = PDF::loadView('admin.pdf1_view', compact('data'));
        
             return $pdf->download('pdf_count.pdf');
        }else{
            abort(403,'Access unauthorized!');
        }
    }



        public function pdf2Download(){

            if(auth()->user()->isAdmin()){
                $data = Export::usersAndRecipes();
                        
                $pdf = PDF::loadView('admin.pdf2_view', compact('data'));
            
                 return $pdf->download('pdf_recipes.pdf');
            }else{
                abort(403,'Access unauthorized!');
            }
        }
}
