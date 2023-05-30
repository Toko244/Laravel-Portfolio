<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $services = DB::table('services')->count();
        $blogs = DB::table('blogs')->count();
        $portfolios = DB::table('portfolios')->count();
        $partners = DB::table('partner_multi_images')->count();
        $messages = DB::table('contacts')->count();
        return view('admin.Dashboard.index', compact('services', 'blogs', 'portfolios', 'partners', 'messages'));
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
