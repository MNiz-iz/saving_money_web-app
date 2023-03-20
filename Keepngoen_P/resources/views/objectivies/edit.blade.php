<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit goals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <h2>Edit This Goals</h2>
            </div>
            <div><a href="{{ route('objectivies.index') }}" class="btn btn-primary">BACK</a></div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('objectivies.update', $objectivy->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Name Goals</strong>
                            <input type="text" name="name" value="{{ $objectivy->name }}" class="form-control" placeholder="Name Goals">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>picture</strong>
                            <input type="file" name="picture" value="{{ $objectivy->picture }}" class="form-control" placeholder="picture">
                            @error('picture')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>price</strong>
                            <input type="number" name="price" value="{{ $objectivy->price }}" class="form-control" placeholder="price">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>start day</strong>
                            <input type="date" name="start_d" value="{{ $objectivy->start_d }}" class="form-control" placeholder="start_d">
                            @error('start_d')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>end day</strong>
                            <input type="date" name="end_d" value="{{ $objectivy->end_d }}" class="form-control" placeholder="end_d">
                            @error('end_d')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="from-group">
                            <button type="submit" class="btn btn-success">Update data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>