@extends('layouts.frontend');

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-5">
        @session('status')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession
        <div class="card">
            <div class="card-header">
                <h4>Log In</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Login</button>
                </form>
            </div>
        </div>
        <p class="text-center">Don't have an account? <a href="{{ route('register.form') }}">Register here</a></p>
    </div>
</div>

