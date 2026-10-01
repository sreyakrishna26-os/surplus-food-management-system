@extends('layouts.Adminmaster')

@section('content')

<style>
    .category-page {
        padding: 35px 25px;
    }

    .page-header {
        background: linear-gradient(135deg, #198754, #146c43);
        color: white;
        padding: 25px 30px;
        border-radius: 15px;
        margin-bottom: 25px;
        box-shadow: 0 5px 18px rgba(0,0,0,0.12);
    }

    .page-header h2 {
        margin: 0;
        font-weight: 600;
        font-size: 28px;
    }

    .page-header p {
        margin: 5px 0 0;
        opacity: 0.9;
        font-size: 14px;
    }

    .header-buttons .btn {
        border-radius: 8px;
        padding: 10px 18px;
        font-weight: 500;
        margin-left: 8px;
    }

    .btn-add-category {
        background: white;
        color: #198754;
        border: none;
    }

    .btn-add-category:hover {
        background: #f1f1f1;
        color: #146c43;
    }

    .btn-add-subcategory {
        background: #ffc107;
        color: #212529;
        border: none;
    }

    .btn-add-subcategory:hover {
        background: #e0a800;
        color: #212529;
    }

    .category-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.08);
        overflow: hidden;
        border: none;
    }

    .category-card-header {
        padding: 18px 25px;
        border-bottom: 1px solid #eee;
        background: #fff;
    }

    .category-card-header h5 {
        margin: 0;
        font-weight: 600;
        color: #333;
    }

    .table {
        margin-bottom: 0;
    }

    .table thead th {
        background: #212529;
        color: white;
        font-weight: 500;
        padding: 15px;
        border: none;
    }

    .table tbody td {
        padding: 15px;
        vertical-align: middle;
    }

    .table tbody tr {
        transition: 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .category-id {
        width: 70px;
        font-weight: 600;
        color: #198754;
    }

    .category-name {
        font-weight: 500;
        color: #333;
    }

    .action-buttons {
        display: flex;
        gap: 7px;
    }

    .action-buttons .btn {
        border-radius: 7px;
        padding: 6px 13px;
        font-size: 13px;
    }

    .empty-row {
        padding: 35px !important;
        color: #777;
    }

    .success-alert {
        border-radius: 10px;
        border: none;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }

    @media (max-width: 768px) {

        .page-header {
            padding: 20px;
        }

        .page-header .d-flex {
            flex-direction: column;
            align-items: flex-start !important;
        }

        .header-buttons {
            margin-top: 15px;
        }

        .header-buttons .btn {
            margin-left: 0;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .category-page {
            padding: 20px 10px;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<div class="container-fluid category-page">

```
<!-- ================= PAGE HEADER ================= -->

<div class="page-header">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h2>
                <i class="fas fa-layer-group me-2"></i>
                Category Management
            </h2>

            <p>
                Manage food categories and subcategories
            </p>
        </div>

        <div class="header-buttons">

            <a href="{{ route('categoryregister') }}"
               class="btn btn-add-category">

                <i class="fas fa-plus me-1"></i>
                Add Category

            </a>

            <a href="{{ route('subcatregister') }}"
               class="btn btn-add-subcategory">

                <i class="fas fa-plus me-1"></i>
                Add Subcategory

            </a>

        </div>

    </div>

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


<!-- ================= CATEGORY TABLE ================= -->

<div class="category-card">

    <div class="category-card-header">

        <h5>
            <i class="fas fa-list me-2 text-success"></i>
            Category List
        </h5>

    </div>


    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th width="190">Action</th>
                </tr>

            </thead>


            <tbody>

            @forelse($categories as $category)

                <tr>

                    <td class="category-id">
                        #{{ $category->cid }}
                    </td>

                    <td class="category-name">
                        {{ $category->cname }}
                    </td>

                    <td>

                        <div class="action-buttons">

                            <a href="{{ route('category_edit', $category->cid) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit me-1"></i>
                                Edit

                            </a>


                            <form action="{{ route('category_delete', $category->cid) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this category?')">

                                    <i class="fas fa-trash me-1"></i>
                                    Delete

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="3"
                        class="text-center empty-row">

                        <i class="fas fa-folder-open fa-2x mb-3 d-block text-secondary"></i>

                        <strong>No Categories Found</strong>

                        <div class="small mt-1">
                            Add a category to get started.
                        </div>

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
```

</div>

@endsection
