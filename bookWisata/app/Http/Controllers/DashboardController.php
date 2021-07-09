<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $user = DB::table('user')->count();
        $admin = DB::table('users')->count();
        $visitor = DB::table('visitor')->count();
        $wisata = DB::table('wisata')->count();
        $travel_homestay = DB::table('travel_homestay')->count();
        $booking = DB::table('booking')->count();
        $metode = DB::table('metode_pembayaran')->count();

        return view('dashboard', compact('user', 'admin', 'visitor', 'wisata', 'travel_homestay', 'booking','metode'));
    }

}
