@extends('layouts.Donormaster')

@section('content')

<style>
    .food-register-wrapper {
        padding: 40px 20px;
        background: #f5f7f6;
        min-height: calc(100vh - 80px);
    }

    .food-register-card {
        max-width: 1000px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    }

    .food-register-header {
        background: linear-gradient(135deg, #198754, #28a745);
        color: #ffffff;
        padding: 28px 35px;
    }

    .food-register-header h3 {
        margin: 0;
        font-weight: 700;
        font-size: 26px;
    }

    .food-register-header p {
        margin: 6px 0 0;
        opacity: 0.9;
        font-size: 14px;
    }

    .food-register-body {
        padding: 35px;
    }

    .section-title {
        font-size: 18px;
        font-weight: 700;
        color: #198754;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e9ecef;
    }

    .form-label {
        font-weight: 600;
        color: #343a40;
        margin-bottom: 7px;
    }

    .form-control,
    .form-select {
        border: 1px solid #dfe3e6;
        border-radius: 9px;
        padding: 11px 13px;
        min-height: 46px;
        transition: 0.2s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.12);
    }

    .required-star {
        color: #dc3545;
    }

    .image-upload-box {
        border: 2px dashed #cfd8d3;
        border-radius: 12px;
        padding: 22px;
        text-align: center;
        background: #fafcfb;
        transition: 0.2s ease;
    }

    .image-upload-box:hover {
        border-color: #198754;
        background: #f4faf6;
    }

    .image-upload-box i {
        font-size: 35px;
        color: #198754;
        margin-bottom: 8px;
    }

    .image-preview {
        display: none;
        margin-top: 15px;
        max-width: 180px;
        max-height: 130px;
        border-radius: 10px;
        object-fit: cover;
        border: 1px solid #dee2e6;
    }

    .alert {
        border-radius: 10px;
        border: none;
    }

    .action-area {
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid #e9ecef;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-custom {
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
    }

    .info-box {
        background: #f0f9f4;
        border-left: 4px solid #198754;
        border-radius: 8px;
        padding: 13px 16px;
        margin-bottom: 25px;
        color: #495057;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .food-register-wrapper {
            padding: 20px 10px;
        }

        .food-register-body {
            padding: 22px;
        }

        .food-register-header {
            padding: 22px;
        }

        .action-area .btn {
            width: 100%;
        }
    }
</style>


<div class="food-register-wrapper">

    <div class="food-register-card">

        {{-- Header --}}
        <div class="food-register-header">
            <h3>
                <i class="fas fa-utensils me-2"></i>
                Food Registration
            </h3>

            <p>
                Register your available food and make it visible to buyers.
            </p>
        </div>


        <div class="food-register-body">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
            @endif


            {{-- Error Message --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                </div>
            @endif


            {{-- Validation Errors --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Please correct the following errors:
                    </strong>

                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            {{-- Information --}}
            <div class="info-box">
                <i class="fas fa-info-circle me-2"></i>
                After registration, your food will be available to buyers.
            </div>


            <form action="{{ route('food_insert') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                {{-- Basic Information --}}
                <div class="section-title">
                    <i class="fas fa-info-circle me-2"></i>
                    Food Information
                </div>


                <div class="row g-4">

                    {{-- Food Name --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Food Name
                            <span class="required-star">*</span>
                        </label>

                        <input type="text"
                               name="food_name"
                               class="form-control"
                               value="{{ old('food_name') }}"
                               placeholder="Enter food name"
                               required>
                    </div>


                    {{-- Food Type --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Food Type
                            <span class="required-star">*</span>
                        </label>

                        <select name="food_type"
                                class="form-select"
                                required>

                            <option value="">
                                -- Select Food Type --
                            </option>

                            <option value="Veg"
                                {{ old('food_type') == 'Veg' ? 'selected' : '' }}>
                                Vegetarian
                            </option>

                            <option value="Non-Veg"
                                {{ old('food_type') == 'Non-Veg' ? 'selected' : '' }}>
                                Non-Vegetarian
                            </option>

                        </select>
                    </div>


                    {{-- Subcategory --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Subcategory
                            <span class="required-star">*</span>
                        </label>

                        <select name="sid"
                                class="form-select"
                                required>

                            <option value="">
                                -- Select Subcategory --
                            </option>

                            @foreach($subcategories as $subcategory)

                                <option value="{{ $subcategory->sid }}"
                                    {{ old('sid') == $subcategory->sid ? 'selected' : '' }}>

                                    {{ $subcategory->sname }}

                                </option>

                            @endforeach

                        </select>
                    </div>


                    {{-- Quantity --}}
                    <div class="col-md-6">
                        <label class="form-label">
                            Quantity
                            <span class="required-star">*</span>
                        </label>

                        <input type="number"
                               name="food_quantity"
                               class="form-control"
                               value="{{ old('food_quantity') }}"
                               min="1"
                               placeholder="Enter quantity"
                               required>
                    </div>

                </div>


                {{-- Pricing --}}
                <div class="section-title mt-5">
                    <i class="fas fa-tag me-2"></i>
                    Pricing
                </div>


                <div class="row g-4">

                    {{-- Price --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Price
                            <span class="required-star">*</span>
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                ₹
                            </span>

                            <input type="number"
                                   name="food_price"
                                   class="form-control"
                                   value="{{ old('food_price') }}"
                                   min="0"
                                   step="0.01"
                                   placeholder="Enter price"
                                   required>

                        </div>

                    </div>


                    {{-- Offer Price --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Offer Price
                            <span class="required-star">*</span>
                        </label>

                        <div class="input-group">

                            <span class="input-group-text">
                                ₹
                            </span>

                            <input type="number"
                                   name="food_offerprice"
                                   class="form-control"
                                   value="{{ old('food_offerprice') }}"
                                   min="0"
                                   step="0.01"
                                   placeholder="Enter offer price"
                                   required>

                        </div>

                    </div>

                </div>


                {{-- Image and Expiry --}}
                <div class="section-title mt-5">
                    <i class="fas fa-image me-2"></i>
                    Food Details
                </div>


                <div class="row g-4">

                    {{-- Food Image --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Food Image
                            <span class="required-star">*</span>
                        </label>

                        <div class="image-upload-box">

                            <i class="fas fa-cloud-upload-alt d-block"></i>

                            <p class="mb-2">
                                Upload a clear image of the food
                            </p>

                            <input type="file"
                                   name="food_image"
                                   id="food_image"
                                   class="form-control"
                                   accept="image/*"
                                   required>

                            <img id="imagePreview"
                                 class="image-preview"
                                 alt="Food Preview">

                        </div>

                    </div>


                    {{-- Expiry Date --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Food Expiry Date
                            <span class="required-star">*</span>
                        </label>

                        <input type="date"
                               name="food_expiry_date"
                               class="form-control"
                               min="{{ date('Y-m-d') }}"
                               value="{{ old('food_expiry_date') }}"
                               required>

                        <small class="text-muted d-block mt-2">
                            <i class="fas fa-calendar-alt me-1"></i>
                            Select the date until which the food is available.
                        </small>

                    </div>

                </div>


                {{-- Buttons --}}
                <div class="action-area">

                    <button type="submit"
                            class="btn btn-success btn-custom">

                        <i class="fas fa-plus-circle me-2"></i>
                        Register Food

                    </button>


                    <a href="{{ route('food_view') }}"
                       class="btn btn-info text-white btn-custom">

                        <i class="fas fa-list me-2"></i>
                        View My Foods

                    </a>


                    <a href="{{ route('Donorhome') }}"
                       class="btn btn-secondary btn-custom">

                        <i class="fas fa-arrow-left me-2"></i>
                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- Image Preview Script --}}
<script>

    document.getElementById('food_image').addEventListener('change', function(event) {

        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');

        if (file) {

            const reader = new FileReader();

            reader.onload = function(e) {

                preview.src = e.target.result;
                preview.style.display = 'block';

            };

            reader.readAsDataURL(file);

        } else {

            preview.src = '';
            preview.style.display = 'none';

        }

    });

</script>

@endsection