@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

        <!-- เนื้อหาหน้าโฮม -->
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>
                        Your Goals!!
                    </h2>
                </div>
                
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No.<th>
                    <th>Picture</th>
                    <th>Goal<th>
                    <th>StartDay<th>
                    <th>EndDay<th>
                    <th>Price</th>
                </tr>
            
            </table>

        </div>

    </div>
</div>
@endsection
