<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    public function create(Request $request) {
        // echo "borang ticket";
        return view("tickets.create");
    }

    public function store(Request $request) {
        echo "submit ticket";
    }
}
