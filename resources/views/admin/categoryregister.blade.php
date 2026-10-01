@extends('layouts.Adminmaster')

@section('content')

<style>
    .category-page {
        padding: 35px 25px;
    }

    .registration-header {
        background: linear-gradient(135deg, #198754, #146c43);
        color: white;
        padding: 25px 30px;
        border-radius: 15px;
        margin-bottom: 25px;
        box-shadow: 0 5px 18px rgba(0,0,0,0.12);
    }

    .registration-header h2 {
        margin: 0;
        font-size: 28px;
        font-weight: 600;
    }

    .registration-header p {
        margin: 6px 0 0;
        font-size: 14px;
        opacity: 0.9;
    }

    .registration-card {
        background: #fff;
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    .registration-card-header {
        padding: 18px 25px;
        border-bottom: 1px solid #eee;
        background: #fff;
    }

    .registration-card-header h5 {
        margin: 0;
        font-weight: 600;
        color: #333;
    }

    .registration-card-body {
        padding: 30px;
    }

    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }

    .form-control {
        border-radius: 8px;
        padding: 11px 14px;
        border: 1px solid #dee2e6;
        transition: 0.2s ease;
    }

    .form-control:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.2rem rgba(25,135,84,0.12);
    }

    .form-text {
        font-size: 13px;
        color: #777;
        margin-top: 6px;
    }

    .button-group {
        margin-top: 25px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .button-group .btn {
        border-radius: 8px;
        padding: 9px 18px;
        font-weight: 500;
    }

    .btn-save {
        background: #198754;
        border-color: #198754;
        color: white;
    }

    .btn-save:hover {
        background: #146c43;
        border-color: #146c43;
        color: white;
    }

    .btn-cancel {
        background: #6c757d;
        border-color: #6c757d;
        color: white;
    }

    .btn-view {
        background: #212529;
        border-color: #212529;
        color: white;
    }

    .btn-view:hover {
        background: #343a40;
        border-color: #343a40;
        color: white;
    }

    .success-alert {
        border: none;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }

    .input-icon {
        position: relative;
    }

    .input-icon i {
        position: absolute;
        left: 14px;
        top: 13px;
        color: #198754;
        z-index: 2;
    }

    .input-icon .form-control {
        padding-left: 40px;
    }

    @media (max-width: 768px) {

        .category-page {
            padding: 20px 10px;
        }

        .registration-header {
            padding: 20px;
        }

        .registration-header h2 {
            font-size: 23px;
        }

        .registration-card-body {
            padding: 20px;
        }

        .button-group {
            flex-direction: column;
        }

        .button-group .btn {
            width: 100%;
        }
    }
</style>

<div class="container-fluid category-page">

```
<!-- ================= PAGE HEADER ================= -->

<div class="registration-header">

    <h2>
        <i class="fas fa-folder-plus me-2"></i>
        Category Registration
    </h2>

    <p>
        Add a new food category to the system
    </p>

</div>


<!-- ================= SUCCESS MESSAGE ================= -->

@if(session('success'))

    <div class="alert alert-success success-alert alert-dismissible fade show">

        <i class="fas fa-check-circle me-2"></i>

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


<!-- ================= REGISTRATION CARD ================= -->

<div class="registration-card">

    <div class="registration-card-header">

        <h5>
            <i class="fas fa-plus-circle text-success me-2"></i>
            Add Category
        </h5>

    </div>


    <div class="registration-card-body">

        <form action="{{ route('category_insert') }}" method="POST">

            @csrf


            <!-- CATEGORY NAME -->

            <div class="mb-3">

                <label for="cname" class="form-label">
                    Category Name
                </label>

                <div class="input-icon">

                    <i class="fas fa-tag"></i>

                    <input
                        type="text"
                        class="form-control @error('cname') is-invalid @enderror"
                        id="cname"
                        name="cname"
                        value="{{ old('cname') }}"
                        placeholder="Enter category name"
                    >

                    @error('cname')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                <div class="form-text">
                    Enter the name of the food category.
                </div>

            </div>


            <!-- BUTTONS -->

            <div class="button-group">

                <button type="submit"
                        class="btn btn-save">

                    <i class="fas fa-save me-1"></i>
                    Save Category

                </button>


                <a href="{{ route('category_insert') }}"
                   class="btn btn-cancel">

                    <i class="fas fa-times me-1"></i>
                    Cancel

                </a>


                <a href="{{ route('category_view') }}"
                   class="btn btn-view">

                    <i class="fas fa-list me-1"></i>
                    View Categories

                </a>

            </div>


        </form>

    </div>

</div>

</div>

@endsection
