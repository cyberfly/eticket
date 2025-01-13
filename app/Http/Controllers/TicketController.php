<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ticket;

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

        $subject = $request->subject;
        $category_id = $request->category_id;
        $description = $request->description;

        $ticket = new Ticket();
        $ticket->subject = $subject;
        $ticket->category_id = $category_id;
        $ticket->description = $description;
        $ticket->status = 'open';
        $ticket->user_id = auth()->id();

        $ticket->save();

        echo "success submit ticket";
    }
}
