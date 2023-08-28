<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(): View
    {
        if (auth()->check()) {
            $role_id = auth()->user()->role_id;
        
            if ($role_id) {
                $role = Role::find($role_id);
        
                if ($role) {
                    $role_title = $role->role_title;
                    $role = strtolower($role_title);
        
                    return view('home', compact('role'));
                }
            }
        }
        
        return view('home');
        
    }
}
