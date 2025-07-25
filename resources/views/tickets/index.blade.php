@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <h1>My Tickets List</h1>

            @include('partials.alert')

            @hasrole('user')

            <div class="my-4">
                <a href="{{ route('tickets.create') }}" class="btn btn-info">Create Ticket</a>
            </div>

            @endhasrole

            {{-- filter --}}
            @hasrole('admin')
            <div>
                <form action="{{ route('admin.tickets.index') }}" method="GET">

                    <div class="form-group mb-4">
                        <label for="title">Category</label>
    
                        <select name="category_id" class="form-control" id="category_id">
                            <option value="">Select Category</option>
    
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="title">User</label>
    
                        <select name="user_id" class="form-control" id="user_id">
                            <option value="">Select User</option>
    
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="title">Keyword</label>
    
                        <input type="text" name="keyword" id="" value="{{ request('keyword') }}" class="form-control">
                    </div>

                    <button class="btn btn-info" type="submit">Search</button>

                </form>
            </div>
            @endhasrole
            {{-- end filter --}}

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
                                <th>Submitted By</th>
                                @hasrole('admin')
                                <th>Actions</th>
                                @endhasrole
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
                                    <td>{{ $ticket->category->name }}</td>
                                    <td>{{ $ticket->description }}</td>
                                    <td>{{ $ticket->created_at->format('M d, Y') }}</td>
                                    <td>{{ $ticket->user->name }}</td>
                                    @hasrole('admin')
                                    <td>
                                        @if($ticket->status == 'open')
                                        <form action="{{ route('admin.tickets.close', $ticket->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to close this ticket?')">
                                                Close Ticket
                                            </button>
                                        </form>
                                    @endif
                                    </td>
                                    @endhasrole
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="my-4">
                        {{ $tickets->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            @else
                <div class="alert alert-info">
                    No tickets found.
                </div>
            @endif


        </div>
    </div>
@endsection
