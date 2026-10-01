@extends('layouts.Buyermaster')

@section('content')

<div class="container mt-5 mb-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow-sm">

                <div class="card-header bg-warning">

                    <h4 class="mb-0">
                        Edit My Profile
                    </h4>

                </div>


                <div class="card-body">

                    {{-- Validation Errors --}}
                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <strong>
                                Please correct the following errors:
                            </strong>

                            <ul class="mb-0 mt-2">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form action="{{ route('buyer_profile_update') }}"
                          method="POST">

                        @csrf

                        @method('PUT')


                        {{-- Buyer Name --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Buyer Name
                            </label>

                            <input type="text"
                                   name="buyer_name"
                                   class="form-control"
                                   value="{{ old('buyer_name', $buyer->buyer_name) }}"
                                   required>

                        </div>


                        {{-- Email --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                   name="buyer_email"
                                   class="form-control"
                                   value="{{ old('buyer_email', $buyer->buyer_email) }}"
                                   required>

                        </div>


                        {{-- Buyer Type --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Buyer Type
                            </label>

                            <select name="buyer_type"
                                    class="form-select"
                                    required>

                                <option value="Family"
                                    {{ old('buyer_type', $buyer->buyer_type) == 'Family' ? 'selected' : '' }}>
                                    Family
                                </option>

                                <option value="Organization"
                                    {{ old('buyer_type', $buyer->buyer_type) == 'Organization' ? 'selected' : '' }}>
                                    Organization
                                </option>

                                <option value="Hostel"
                                    {{ old('buyer_type', $buyer->buyer_type) == 'Hostel' ? 'selected' : '' }}>
                                    Hostel
                                </option>

                                <option value="Others"
                                    {{ old('buyer_type', $buyer->buyer_type) == 'Others' ? 'selected' : '' }}>
                                    Others
                                </option>

                            </select>

                        </div>


                        {{-- Phone --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Phone Number
                            </label>

                            <input type="text"
                                   name="buyer_phone"
                                   class="form-control"
                                   value="{{ old('buyer_phone', $buyer->buyer_phone) }}"
                                   required>

                        </div>


                        {{-- Address --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Address
                            </label>

                            <textarea name="buyer_address"
                                      class="form-control"
                                      rows="3"
                                      required>{{ old('buyer_address', $buyer->buyer_address) }}</textarea>

                        </div>


                        {{-- Location --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Location
                            </label>

                            <select name="location_id"
                                    class="form-select"
                                    required>

                                @foreach($locations as $location)

                                    <option value="{{ $location->location_id }}"
                                        {{ old('location_id', $buyer->location_id) == $location->location_id ? 'selected' : '' }}>

                                        {{ $location->location_name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <hr>


                        <h5 class="mb-3">
                            Login Details
                        </h5>


                        {{-- Username --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Username
                            </label>

                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   value="{{ old('username', $buyer->login->username ?? '') }}"
                                   required>

                        </div>


                        {{-- New Password --}}
                        <div class="mb-3">

                            <label class="form-label">
                                New Password
                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Leave blank to keep current password">

                            <small class="text-muted">
                                Leave blank if you don't want to change your password.
                            </small>

                        </div>


                        {{-- Buttons --}}
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('buyer_profile') }}"
                               class="btn btn-secondary">

                                Cancel

                            </a>

                            <button type="submit"
                                    class="btn btn-warning">

                                Update Profile

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection