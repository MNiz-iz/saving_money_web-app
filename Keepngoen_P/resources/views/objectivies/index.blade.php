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
                    <th>No.</th>
                    <th>Name</th>
                    <th>Picture</th>
                    <th>StartDay</th>
                    <th>EndDay</th>
                    <th>Price</th>
                    <th>Saving perDay</th>
                    <th>Savings total</th>
                    <th>Action For Saving</th>
                    <th>Manage Goals</th>
                </tr>
                @foreach ($datas as $goals)
                    <tr>
                        <td>{{ $goals->id }}</td>
                        <td>{{ $goals->name }}</td>
                        <td> <img src="{{ asset('uploads/goals/'.$goals->picture) }}" width="150px" alt="Image"></td>
                        <td>{{ $goals->start_d }}</td>
                        <td>{{ $goals->end_d }}</td>
                        <td>{{ $goals->goal_Keep }}</td>
                        <td>{{ $goals->saving_perDay }}</td>
                        <td>{{ $goals->sum_saving }}</td>
                        <td><a href="{{ route('upgoal.show', $goals->id) }}" class="btn btn-primary btn-lg">KeepNgoen_NOW</a></td>
                        <td><form action="{{ route('objectivies.destroy', $goals->id) }}" method="POST">
                            <a href="{{ route('objectivies.edit', $goals->id) }}" method="POST" class="btn btn-warning" style="width:150px">Edit This Goal  !!</a>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger mt-3" style="width:150px">Delete This Goal</button>
                        </form></td>
                        
                    </tr>
                @endforeach
            </table>
            {!! $datas->links('pagination::bootstrap-5') !!}
            <a href="{{ route('objectivies.create') }}" class="btn btn-success btn-lg">Create Your Goals</a>
            <a href="{{ route('upkeep.index') }}" class="btn btn-primary btn-lg">Your completed goals</a>
        </div>

    </div>
</div>
@endsection