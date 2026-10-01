@extends('layouts.Donormaster')

@section('content')

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                Edit Food
            </h4>

        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <strong>Please correct the following errors:</strong>

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form action="{{ route('food_update', $food->food_id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                <div class="mb-3">

                    <label class="form-label">
                        Food Name
                    </label>

                    <input type="text"
                           name="food_name"
                           class="form-control"
                           value="{{ old('food_name', $food->food_name) }}"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Food Type
                    </label>

                    <select name="food_type"
                            class="form-control"
                            required>

                        <option value="Veg"
                            {{ old('food_type', $food->food_type) == 'Veg' ? 'selected' : '' }}>
                            Vegetarian
                        </option>

                        <option value="Non-Veg"
                            {{ old('food_type', $food->food_type) == 'Non-Veg' ? 'selected' : '' }}>
                            Non-Vegetarian
                        </option>

                    </select>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Quantity
                    </label>

                    <input type="number"
                           name="food_quantity"
                           class="form-control"
                           min="1"
                           value="{{ old('food_quantity', $food->food_quantity) }}"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Price
                    </label>

                    <input type="number"
                           name="food_price"
                           class="form-control"
                           min="0"
                           step="0.01"
                           value="{{ old('food_price', $food->food_price) }}"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Offer Price
                    </label>

                    <input type="number"
                           name="food_offerprice"
                           class="form-control"
                           min="0"
                           step="0.01"
                           value="{{ old('food_offerprice', $food->food_offerprice) }}"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Current Food Image
                    </label>

                    <br>

                    @if($food->food_image)

                        <img src="{{ asset('food_images/' . $food->food_image) }}"
                             width="120"
                             height="90"
                             style="object-fit: cover;">

                    @else

                        No Image

                    @endif

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Change Food Image
                    </label>

                    <input type="file"
                           name="food_image"
                           class="form-control"
                           accept="image/*">

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Food Expiry Date
                    </label>

                    <input type="date"
                           name="food_expiry_date"
                           class="form-control"
                           value="{{ old('food_expiry_date', $food->food_expiry_date) }}"
                           required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Subcategory
                    </label>

                    <select name="sid"
                            class="form-control"
                            required>

                        <option value="">
                            -- Select Subcategory --
                        </option>

                        @foreach($subcategories as $subcategory)

                            <option value="{{ $subcategory->sid }}"
                                {{ old('sid', $food->sid) == $subcategory->sid ? 'selected' : '' }}>

                                {{ $subcategory->sname }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="mt-4">

                    <button type="submit"
                            class="btn btn-primary">

                        Update Food

                    </button>

                    <a href="{{ route('food_view') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection