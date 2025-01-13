<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class TicketController extends Controller
{
    //
    public function create(Request $request) {
        // echo "borang ticket";

        $categories = Category::all();

        // return $categories;

        return view("tickets.create", compact('categories'));
    }

    public function store(Request $request) {

        $request->validate(
            [
                'subject' => 'required',
                'category_id' => 'required',
                'description' => 'required',
            ]
        );

        echo "submit ticket";
    }
}
