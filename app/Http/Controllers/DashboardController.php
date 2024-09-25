<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $users = [
            [
                "name" => "Lukino",
                "vek" => "19"
            ],
            [
                "name" => "Maxik",
                "vek" => "13"
            ],
            [
                "name" => "Saska",
                "vek" => "1"
            ]
        ];

        return view(
            'dashboard',
            [
                "users" => $users    
            ]
        );
    }
}
