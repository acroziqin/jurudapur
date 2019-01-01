@extends('layouts.master')

@section('title', 'Jurudapur')

@section('content')
    <main class="container d-flex align-items-center">
        <div class="row justify-content-center align-items-center" style="flex: 1;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5">
                <div class="card w-100 p-4">
                    <h3>Login</h3>
                    <form action="/login">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="rememberme" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Ingat Saya</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
