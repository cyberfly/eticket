<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\User;

class AdminTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // echo "senarai ticket admin";

        $tickets = Ticket::query()
                    ->with('category')
                    ->with('user');

        if ($request->filled('category_id')) {
            $tickets->where('category_id', $request->category_id);
        }

        if ($request->filled('user_id')) {
            $tickets->where('user_id', $request->user_id);
        }

        if ($request->filled('keyword')) {
            $tickets->where(function($query) use ($request) {
                $query->where('subject', 'like', '%'.$request->keyword.'%')
                      ->orWhere('description', 'like', '%'.$request->keyword.'%');
            });
        }

        $tickets = $tickets->orderBy('id', 'desc')
                    ->paginate(2);

        // return $tickets;

        $categories = Category::all();

        // define users, dan pass pada compact
        $users = User::all();
        // dekat views, buat sama macam categories

        return view("tickets.index", compact('tickets', 'categories', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function close(Ticket $ticket)
    {
        $ticket->update(['status' => 'closed']);
        
        return redirect()->back()->with('success', 'Ticket has been closed successfully');
    }
}
