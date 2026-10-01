@extends('layouts.Adminmaster')

@section('content')

<div class="container mt-5">
    <h2>Edit Subcategory</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('subcategory_update', $subcategory->sid) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Category</label>

            <select name="cid" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->cid }}"
                        {{ $subcategory->cid == $category->cid ? 'selected' : '' }}>
                        {{ $category->cname }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Subcategory Name</label>

            <input type="text"
                   name="sname"
                   class="form-control"
                   value="{{ old('sname', $subcategory->sname) }}">
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('subcategory_view') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>
</div>

@endsection