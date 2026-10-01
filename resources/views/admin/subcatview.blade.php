@extends('layouts.Adminmaster')

@section('content')

<style>
    .subcategory-page {
        padding: 35px 25px;
    }

    /* ================= HEADER ================= */

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
        font-size: 28px;
        font-weight: 600;
    }

    .page-header p {
        margin: 6px 0 0;
        font-size: 14px;
        opacity: 0.9;
    }

    .header-buttons .btn {
        border-radius: 8px;
        padding: 9px 17px;
        font-weight: 500;
        margin-left: 7px;
    }

    .btn-category {
        background: white;
        color: #198754;
        border: none;
    }

    .btn-category:hover {
        background: #f1f1f1;
        color: #146c43;
    }

    .btn-subcategory {
        background: #ffc107;
        color: #212529;
        border: none;
    }

    .btn-subcategory:hover {
        background: #e0a800;
        color: #212529;
    }

    /* ================= ALERT ================= */

    .success-alert {
        border: none;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }

    /* ================= FILTER CARD ================= */

    .filter-card {
        background: white;
        border: none;
        border-radius: 15px;
        padding: 22px 25px;
        margin-bottom: 25px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.08);
    }

    .filter-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }

    .category-select {
        border-radius: 8px;
        padding: 11px 14px;
        border: 1px solid #dee2e6;
        transition: 0.2s ease;
    }

    .category-select:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.2rem rgba(25,135,84,0.12);
    }

    /* ================= TABLE CARD ================= */

    .table-card {
        background: white;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(0,0,0,0.08);
    }

    .table-card-header {
        padding: 18px 25px;
        border-bottom: 1px solid #eee;
        background: white;
    }

    .table-card-header h5 {
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

    .serial-number {
        color: #198754;
        font-weight: 600;
        width: 80px;
    }

    .subcategory-name {
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

    @media (max-width: 768px) {

        .subcategory-page {
            padding: 20px 10px;
        }

        .page-header {
            padding: 20px;
        }

        .page-header h2 {
            font-size: 23px;
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

        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<div class="container-fluid subcategory-page">

```
<!-- ================= PAGE HEADER ================= -->

<div class="page-header">

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h2>
                <i class="fas fa-tags me-2"></i>
                Subcategory Management
            </h2>

            <p>
                Manage food subcategories under each category
            </p>

        </div>


        <div class="header-buttons">

            <a href="{{ route('categoryregister') }}"
               class="btn btn-category">

                <i class="fas fa-folder-plus me-1"></i>
                Add Category

            </a>


            <a href="{{ route('subcatregister') }}"
               class="btn btn-subcategory">

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


<!-- ================= CATEGORY FILTER ================= -->

<div class="filter-card">

    <label for="categoryid" class="filter-label">

        <i class="fas fa-filter text-success me-2"></i>
        Select Category

    </label>


    <select class="form-select category-select"
            id="categoryid"
            name="categoryid">

        <option value="">
            -- Select Category --
        </option>

        @foreach($categories as $category)

            <option value="{{ $category->cid }}">
                {{ $category->cname }}
            </option>

        @endforeach

    </select>

</div>


<!-- ================= SUBCATEGORY TABLE ================= -->

<div class="table-card">

    <div class="table-card-header">

        <h5>
            <i class="fas fa-list me-2 text-success"></i>
            Subcategory List
        </h5>

    </div>


    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>

                <tr>
                    <th>Sl No</th>
                    <th>Subcategory Name</th>
                    <th width="200">Action</th>
                </tr>

            </thead>


            <tbody id="subcategory">

                <tr>

                    <td colspan="3"
                        class="text-center empty-row">

                        <i class="fas fa-filter fa-2x mb-3 d-block text-secondary"></i>

                        <strong>Select a Category</strong>

                        <div class="small mt-1">
                            Select a category above to view its subcategories.
                        </div>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>
```

</div>

<!-- ================= JQUERY ================= -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

$(document).ready(function () {

    $('#categoryid').change(function () {

        var cid = $(this).val();

        if (cid) {

            $('#subcategory').html(
                '<tr>' +
                    '<td colspan="3" class="text-center empty-row">' +
                        '<i class="fas fa-spinner fa-spin fa-2x mb-3 d-block text-success"></i>' +
                        '<strong>Loading Subcategories...</strong>' +
                    '</td>' +
                '</tr>'
            );


            $.ajax({

                url: '/get-subcategories/' + cid,

                type: 'GET',

                success: function(data) {

                    $('#subcategory').html('');

                    if (data.length > 0) {

                        $.each(data, function(index, value) {

                            var row =
                                '<tr>' +

                                    '<td class="serial-number">' +
                                        (index + 1) +
                                    '</td>' +

                                    '<td class="subcategory-name">' +
                                        value.sname +
                                    '</td>' +

                                    '<td>' +

                                        '<div class="action-buttons">' +

                                            '<a href="/subcategory_edit/' +
                                                value.sid +
                                                '" class="btn btn-warning btn-sm">' +

                                                '<i class="fas fa-edit me-1"></i>' +
                                                'Edit' +

                                            '</a>' +


                                            '<form action="/subcategory_delete/' +
                                                value.sid +
                                                '" method="POST" style="display:inline;">' +

                                                '@csrf' +
                                                '@method("DELETE")' +

                                                '<button type="submit" ' +
                                                    'class="btn btn-danger btn-sm" ' +
                                                    'onclick="return confirm(\'Are you sure you want to delete this subcategory?\')">' +

                                                    '<i class="fas fa-trash me-1"></i>' +
                                                    'Delete' +

                                                '</button>' +

                                            '</form>' +

                                        '</div>' +

                                    '</td>' +

                                '</tr>';

                            $('#subcategory').append(row);

                        });

                    } else {

                        $('#subcategory').html(

                            '<tr>' +

                                '<td colspan="3" class="text-center empty-row">' +

                                    '<i class="fas fa-folder-open fa-2x mb-3 d-block text-secondary"></i>' +

                                    '<strong>No Subcategories Found</strong>' +

                                    '<div class="small mt-1">' +
                                        'There are no subcategories under this category.' +
                                    '</div>' +

                                '</td>' +

                            '</tr>'

                        );

                    }

                },


                error: function() {

                    $('#subcategory').html(

                        '<tr>' +

                            '<td colspan="3" class="text-center empty-row text-danger">' +

                                '<i class="fas fa-exclamation-circle fa-2x mb-3 d-block"></i>' +

                                '<strong>Failed to Load Data</strong>' +

                                '<div class="small mt-1">' +
                                    'Unable to load subcategories. Please try again.' +
                                '</div>' +

                            '</td>' +

                        '</tr>'

                    );

                }

            });

        } else {

            $('#subcategory').html(

                '<tr>' +

                    '<td colspan="3" class="text-center empty-row">' +

                        '<i class="fas fa-filter fa-2x mb-3 d-block text-secondary"></i>' +

                        '<strong>Select a Category</strong>' +

                        '<div class="small mt-1">' +
                            'Select a category above to view its subcategories.' +
                        '</div>' +

                    '</td>' +

                '</tr>'

            );

        }

    });

});

</script>

@endsection
