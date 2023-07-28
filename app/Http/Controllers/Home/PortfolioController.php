<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function homePortfolio(){
        $portfolios = Portfolio::latest()->get();
        return view ('admin.portfolio.index', compact('portfolios'));
    }
}


