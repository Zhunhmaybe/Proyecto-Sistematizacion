<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Area;
use App\Models\Rol;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::count();
        $totalAreas = Area::count();
        $totalRoles = Rol::count();

        return view('Admin', compact('totalUsuarios', 'totalAreas', 'totalRoles'));
    }

    
}