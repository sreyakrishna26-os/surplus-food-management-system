@extends('layouts.Adminmaster')

@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-body">

            <h4 class="card-title fw-semibold mb-4">Location Edit</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('location_update', $location->location_id) }}" method="POST">
                        @csrf

                        {{-- District --}}
                        <div class="mb-3">
                            <label for="district_id" class="form-label">
                                District
                            </label>

                            <select
                                class="form-control @error('district_id') is-invalid @enderror"
                                id="district_id"
                                name="district_id"
                                required
                            >

                                <option value="">Select District</option>

                                @foreach($districts as $district)

                                    <option
                                        value="{{ $district->district_id }}"
                                        {{ old('district_id', $location->district_id) == $district->district_id ? 'selected' : '' }}
                                    >
                                        {{ $district->district_name }}
                                    </option>

                                @endforeach

                            </select>

                            @error('district_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Location Name --}}
                        <div class="mb-3">
                            <label for="location_name" class="form-label">
                                Location Name
                            </label>

                            <input
                                type="text"
                                class="form-control @error('location_name') is-invalid @enderror"
                                id="location_name"
                                name="location_name"
                                value="{{ old('location_name', $location->location_name) }}"
                                placeholder="Enter Location Name"
                                required
                            >

                            @error('location_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Update Location
                        </button>

                        <a href="{{ route('location_view') }}"
                           class="btn btn-secondary">
                            Cancel
                        </a>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection