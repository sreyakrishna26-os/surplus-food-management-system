@extends('layouts.Adminmaster')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Category</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category_update', $category->cid) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text"
                   name="cname"
                   class="form-control"
                   value="{{ old('cname', $category->cname) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('category_view') }}" class="btn btn-secondary">Cancel</a>
    </form>

</div>

</body>
</html>
@endsection