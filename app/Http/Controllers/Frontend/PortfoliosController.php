<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Footer;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfoliosController extends Controller
{
    public function index()
    {
        $portfolio = Portfolio::latest()->paginate(3);
        $allBlogs = Blog::limit(7)->get();
        $contactInfo = Footer::find(1);

        return view('frontend.components.pages.portfolios', compact('portfolio', 'allBlogs', 'contactInfo'));
    }

    public function portfolioDetails($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $contactInfo = Footer::find(1);

        return view('frontend.components.pages.portfolio_details', compact('portfolio', 'contactInfo'));
    }
}
