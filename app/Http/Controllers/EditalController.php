<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditalRequest;
use App\Models\Edital;

class EditalController extends Controller
{   

    public function create() {
        return view('create');
    }

    public function store(EditalRequest $request) {
        if($request->file('doc')->isValid() && $request->hasFile('doc')) {
            $edital = new Edital;
            
            $docExtension = $request->doc->extension();
            $docName = md5( $request->doc->getClientOriginalName() . strtotime('now') . '.' . $docExtension );

            $request->doc->move(public_path('editais/docs'), $docName . '.' . $docExtension);

            $edital->name = $request->name;
            $edital->extension = $docExtension;
            $edital->doc = $docName;

            $edital->save();

            return redirect('/dashboard');
        }
    }

}