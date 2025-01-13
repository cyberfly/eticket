@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <h1>My Tickets List</h1>

            @include('partials.alert')

            @if ($tickets->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->subject }}</td>
                                    <td><span
                                            class="badge bg-{{ $ticket->status == 'open' ? 'success' : 'secondary' }}">{{ ucfirst($ticket->status) }}</span>
                                    </td>
                                    <td>{{ $ticket->category_id }}</td>
                                    <td>{{ $ticket->description }}</td>
                                    <td>{{ $ticket->created_at->format('M d, Y') }}</td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            @else
                <div class="alert alert-info">
                    No tickets found.
                </div>
            @endif


        </div>
    </div>
@endsection
