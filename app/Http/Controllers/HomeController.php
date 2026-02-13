<?php

namespace App\Http\Controllers;

use App\Models\AlatMusik;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featured = AlatMusik::inRandomOrder()
            ->limit(6)
            ->get();

        return view('home', compact('featured'));
    }
    public function search(Request $request)
    {
        $q = $request->q ?? '';
        $kategori = $request->kategori ?? '';

        $query = AlatMusik::query();

        if ($q !== '') {
            $query->where('nama', 'like', '%' . $q . '%');
        }

        if ($kategori !== '') {
            $query->where('kategori', $kategori);
        }

        $results = $query->paginate(12)->withQueryString();

        $totalHasil = $results->total();

        return view('search', compact(
            'results',
            'q',
            'kategori',
            'totalHasil'
        ));
    }
}
