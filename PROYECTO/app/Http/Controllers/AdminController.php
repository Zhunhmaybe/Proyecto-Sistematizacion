<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Area;
use App\Models\Rol;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsuarios = Usuario::count();
        $totalAreas = Area::count();
        $totalRoles = Rol::count();

        return view('Admin', compact('totalUsuarios', 'totalAreas', 'totalRoles'));
    }
}
