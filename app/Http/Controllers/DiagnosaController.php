<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Kerusakan;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function showDiagnosaForm()
    {
        $gejalas = Gejala::all();
        return view('user.diagnosa', compact('gejalas'));
    }

    public function processDiagnosa(Request $request)
    {
        $request->validate([
            'gejala' => 'required|array|min:1',
            'gejala.*' => 'exists:gejalas,id',
        ]);
    
        $gejalaIds = $request->input('gejala');
    
        $kerusakans = Kerusakan::whereHas('gejalas', function ($query) use ($gejalaIds) {
            $query->whereIn('gejalas.id', $gejalaIds);
        })->with(['gejalas', 'solusis'])->get();  
    
        return view('user.hasil', compact('kerusakans'));
    }

    public function showCiriKerusakan()
    {
        $kerusakans = Kerusakan::with(['gejalas', 'solusis'])->get();
        
        return view('user.ciri_kerusakan', compact('kerusakans'));
    }
    
}
