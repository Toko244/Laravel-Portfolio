<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioDetailsController extends Controller
{
    public function index($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.components.pages.portfolio_details', compact('portfolio'));
    }
}
