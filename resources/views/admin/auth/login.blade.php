@extends('layouts.main')

@section('content')
    <section class="card card-glow" style="max-width:460px; margin:auto;">
        <span class="pill">Admin Portal</span>
        <h1 class="page-title" style="margin-top:0.85rem;">Login Admin</h1>
        <p class="muted">Masuk menggunakan akun admin untuk mengakses dashboard.</p>

        <form action="{{ route('admin.login.store') }}" method="POST" style="display:grid; gap:0.9rem; margin-top:1rem;">
            @csrf
            <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required>
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required>
            </div>
            <label class="checkline">
                <input name="remember" type="checkbox" value="1">
                <span>Ingat saya</span>
            </label>
            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </form>
    </section>
@endsection
