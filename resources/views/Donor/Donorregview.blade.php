@extends('layouts.Adminmaster')

@section('content')

<div class="container-fluid py-4">

    <!-- ================= PAGE HEADER ================= -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                <i class="ti ti-users me-2"></i>
                Donor Management
            </h4>

            <p class="text-muted mb-0">
                View and manage all registered donors.
            </p>
        </div>

         <a
            href="{{ route('donor_pending') }}"
            class="btn btn-warning me-2">

            <i class="ti ti-user-check me-1"></i>

            Pending Requests

        </a>


        <a href="{{ route('donorregister') }}"
           class="btn btn-primary">

            <i class="ti ti-user-plus me-1"></i>
            Add New Donor

        </a>

    </div>


    <!-- ================= SUCCESS MESSAGE ================= -->

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show shadow-sm">

            <i class="ti ti-circle-check me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- ================= ERROR MESSAGE ================= -->

    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show shadow-sm">

            <i class="ti ti-alert-circle me-2"></i>

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- ================= DONOR TABLE CARD ================= -->

    <div class="card border-0 shadow-sm">

        <!-- ================= CARD HEADER ================= -->

        <div class="card-header bg-white py-3">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <h5 class="fw-semibold mb-1">
                        Registered Donors
                    </h5>

                    <small class="text-muted">
                        List of all donors registered in the system.
                    </small>

                </div>


                <!-- ================= SEARCH ================= -->

                <div class="col-md-6">

                    <form action="{{ route('donor_view') }}"
                          method="GET">

                        <div class="input-group">

                            <span class="input-group-text bg-light">
                                <i class="ti ti-search"></i>
                            </span>

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Search donor..."
                                value="{{ request('search') }}"
                            >

                            <button
                                type="submit"
                                class="btn btn-primary">

                                Search

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        <!-- ================= TABLE ================= -->

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4">
                                #
                            </th>

                            <th>
                                Donor
                            </th>

                            <th>
                                Contact
                            </th>

                            <th>
                                Address
                            </th>

                            <th>
                                Location
                            </th>

                            <th>
                                Registration Date
                            </th>

                            <th>
                                License Number
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-center">
                                ID Proof
                            </th>

                            <th class="text-center">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($donors as $key => $donor)

                            <tr>

                                <!-- ================= NUMBER ================= -->

                                <td class="px-4 fw-semibold">

                                    {{ $key + 1 }}

                                </td>


                                <!-- ================= DONOR ================= -->

                                <td>

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3"
                                            style="width:40px;height:40px;">

                                            <i class="ti ti-user"></i>

                                        </div>

                                        <div>

                                            <h6 class="mb-0 fw-semibold">

                                                {{ $donor->donor_name }}

                                            </h6>

                                            <small class="text-muted">

                                                ID:
                                                {{ $donor->donor_id }}

                                            </small>

                                        </div>

                                    </div>

                                </td>


                                <!-- ================= CONTACT ================= -->

                                <td>

                                    <div>

                                        <i class="ti ti-mail me-1 text-muted"></i>

                                        {{ $donor->donor_email }}

                                    </div>

                                    <small class="text-muted">

                                        <i class="ti ti-phone me-1"></i>

                                        {{ $donor->donor_phone }}

                                    </small>

                                </td>


                                <!-- ================= ADDRESS ================= -->

                                <td>

                                    <span>

                                        <i class="ti ti-home me-1 text-primary"></i>

                                        {{ $donor->donor_address }}

                                    </span>

                                </td>


                                <!-- ================= LOCATION ================= -->

                                <td>

                                    @if($donor->location)

                                        <span>

                                            <i class="ti ti-map-pin me-1 text-primary"></i>

                                            {{ $donor->location->location_name }}

                                        </span>

                                    @else

                                        <span class="text-muted">

                                            Not Available

                                        </span>

                                    @endif

                                </td>


                                <!-- ================= REGISTRATION DATE ================= -->

                                <td>

                                    <i class="ti ti-calendar me-1 text-muted"></i>

                                    {{ \Carbon\Carbon::parse($donor->reg_date)->format('d-m-Y') }}

                                </td>


                                <!-- ================= LICENSE ================= -->

                                <td>

                                    @if($donor->license_number)

                                        <span class="badge bg-light text-dark border">

                                            {{ $donor->license_number }}

                                        </span>

                                    @else

                                        <span class="text-muted">

                                            Not Provided

                                        </span>

                                    @endif

                                </td>


                                <!-- ================= STATUS ================= -->

                                <td>

                                    @if($donor->status == 'Active')

                                        <span class="badge bg-success">

                                            <i class="ti ti-check me-1"></i>

                                            Active

                                        </span>

                                    @else

                                        <span class="badge bg-secondary">

                                            <i class="ti ti-x me-1"></i>

                                            Inactive

                                        </span>

                                    @endif

                                </td>


                                <!-- ================= ID PROOF ================= -->

                                <td class="text-center">

                                    @if(!empty($donor->id_proof))

                                        <a
                                            href="{{ url('storage/' . $donor->id_proof) }}"
                                            target="_blank"
                                            class="btn btn-sm btn-outline-primary"
                                            title="View ID Proof">

                                            <i class="ti ti-eye me-1"></i>

                                            View

                                        </a>

                                    @else

                                        <span class="text-muted">

                                            N/A

                                        </span>

                                    @endif

                                </td>


                                <!-- ================= ACTION ================= -->

                                <td class="text-center">

                                    <div class="d-flex justify-content-center gap-1">


                                        <!-- EDIT -->

                                        <a
                                            href="{{ route('donor_edit', $donor->donor_id) }}"
                                            class="btn btn-sm btn-outline-warning"
                                            title="Edit">

                                            <i class="ti ti-edit"></i>

                                        </a>


                                        <!-- DELETE -->

                                        <form
                                            action="{{ route('donor_delete', ['donor_id' => $donor->donor_id]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this donor?');">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Delete">

                                                <i class="ti ti-trash"></i>

                                            </button>

                                        </form>


                                    </div>

                                </td>

                            </tr>


                        @empty

                            <!-- ================= NO DONORS ================= -->

                            <tr>

                                <td colspan="10"
                                    class="text-center py-5">

                                    <div class="mb-3">

                                        <i
                                            class="ti ti-users-off"
                                            style="font-size:50px;color:#adb5bd;">
                                        </i>

                                    </div>


                                    <h6 class="fw-semibold">

                                        No Donors Found

                                    </h6>


                                    <p class="text-muted mb-3">

                                        There are currently no registered donors.

                                    </p>


                                    <a
                                        href="{{ route('donorregister') }}"
                                        class="btn btn-primary">

                                        <i class="ti ti-user-plus me-1"></i>

                                        Register First Donor

                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        <!-- ================= PAGINATION ================= -->

        @if(method_exists($donors, 'links'))

            <div class="card-footer bg-white">

                <div class="d-flex justify-content-end">

                    {{ $donors->links() }}

                </div>

            </div>

        @endif

    </div>

</div>

@endsection