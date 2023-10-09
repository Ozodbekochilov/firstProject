<?php

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('index', ['patients' => Patient::all()]);
});


Route::post('/save_patient', function (Request $req) {
    Patient::create([
        'name' => $req->name,
        'age' => $req->age,
        'address' => $req->address,
        'phone' => $req->phone
    ]);

    return back();
});






Route::get('/delete_patient/{id}', function ($id) {
    Patient::where('id', '=', $id)->first()->delete();
    return back();
});
