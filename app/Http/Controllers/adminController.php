<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function destroy(Request $request)
    {

        Auth::guard('admin')->logout();
        
        try {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json(['success' => true, 'url' => '/'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }

    }
}
