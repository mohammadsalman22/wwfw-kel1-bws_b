<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Admin;
use App\Models\Visitor;
use App\Models\Wisata;
use App\Models\TravelHomestay;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $user = DB::table('user')->count();
        $admin = DB::table('admin')->count();
        $visitor = DB::table('visitor')->count();
        $wisata = DB::table('wisata')->count();
        $travel_homestay = DB::table('travel_homestay')->count();
        $booking = DB::table('booking')->count();

        // $user = Users::all()->count();
        // $admin = Admin::all()->count();
        // $visitor = Visitor::all()->count();
        // $wisata = Wisata::all()->count();
        // $travel_homestay = TravelHomestay::all()->count();
        // $booking = Booking::all()->count();
        return view('dashboard', compact('user', 'admin', 'visitor', 'wisata', 'travel_homestay', 'booking'));
    }

}
