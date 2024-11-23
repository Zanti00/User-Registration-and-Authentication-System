@extends('layouts.frontend');

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4>Register</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-success float-end">Register</button>
                </form>
            </div>
        </div>
        <p class="text-center">Already have an account? <a href="{{ route('login.form') }}">Login here</a></p>
    </div>
</div>

