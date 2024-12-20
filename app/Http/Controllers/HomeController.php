<?php

namespace App\Http\Controllers;

use App\Models\invoices;
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
        $count_all = invoices::count();
        $count_invoices1 = invoices::where('Value_Status', 1)->count();
        $count_invoices2 = invoices::where('Value_Status', 2)->count();
        $count_invoices3 = invoices::where('Value_Status', 3)->count();
    
        $nspainvoices1 = $count_all ? $count_invoices1 / $count_all * 100 : 0;
        $nspainvoices2 = $count_all ? $count_invoices2 / $count_all * 100 : 0;
        $nspainvoices3 = $count_all ? $count_invoices3 / $count_all * 100 : 0;
    
        return view('home', compact('nspainvoices1', 'nspainvoices2', 'nspainvoices3'));
    }
}
