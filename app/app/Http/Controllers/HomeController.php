<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function spendDetail(int $id) {
        

        // $spending = new Spending;
        // $spend_with_type = 

        $spending ->with('type') ->where('id',$spending)
                                 ->first();
                                     
        // if(is_null($spend_with_type)) {
        // abort(404);
        // }
        // // dd($spend_with_type->types);

        return view('spend',
        ['spends' => $spending,
        ]);
    }
}
