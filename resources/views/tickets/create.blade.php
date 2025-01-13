@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <h1>Create your ticket</h1>

            <form action="#" method="POST">
                @csrf

                <div class="form-group mb-4">
                    <label for="title">Subject</label>
                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter your subject">
                </div>

                <div class="form-group mb-4">
                    <label for="title">Category</label>

                    <select name="category_id" class="form-control" id="category_id">
                        <option value="">Select Category</option>
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label for="title">Description</label>

                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <div class="form-group mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>

        </div>
    </div>
@endsection
