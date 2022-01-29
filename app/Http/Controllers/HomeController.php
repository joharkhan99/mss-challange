<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;


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
        /** 
         * TODO: Fetch the customers here.
         */
        $customers = DB::table('customers')->orderBy('points', 'desc')->orderBy('last_name', 'ASC')->where('user_id', Auth::id())->get();
        return view('home', [
            'customers' => $customers
        ]);
    }

    public function promote($cust_id)
    {
        $customer = Customer::find($cust_id);
        if ($customer->gender == "Male") {
            $points = $customer->points + 10;
        } elseif ($customer->gender == "Female") {
            $points = $customer->points + 5;
        }

        $customer->update(['points' => $points]);
        return redirect("/home");
    }

    public function demote($cust_id)
    {
        $customer = Customer::find($cust_id);
        if ($customer->gender == "Male") {
            $points = $customer->points - 5;
        } elseif ($customer->gender == "Female") {
            $points = $customer->points - 2;
        }

        $customer->update(['points' => $points]);
        return redirect("/home");
    }

    public function findSearch(Request $request)
    {
        $search = $request->get('search_term');
        // $search = $this->input('search_term');
        $output = Customer::where('last_name', 'LIKE', '%' . $search . '%')->orWhere('email', 'LIKE', '%' . $search . '%')->get();
        if (count($output) > 0)
            return view('home', [
                'output' => $output
            ]);
    }
}
