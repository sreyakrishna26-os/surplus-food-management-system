@extends('layouts.Donormaster')

@section('content')

<style>
    .foods-table th,
    .foods-table td {
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
    }

    .foods-table th {
        font-size: 14px;
    }

    .foods-table td {
        font-size: 14px;
    }

    .food-image {
        width: 80px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 6px;
    }

    .countdown {
        font-weight: 500;
    }

    .page-buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
</style>


<div class="container mt-5">

    {{-- Page heading and buttons --}}
    <div class="page-buttons">

        <h2>
            @if(request('history') == 'expired')
                Expired Food History
            @else
                My Registered Foods
            @endif
        </h2>


        <div>

            @if(request('history') == 'expired')

                {{-- Back to sellable foods --}}
                <a href="{{ route('food_view') }}"
                   class="btn btn-primary">
                    Back to Sellable Foods
                </a>

            @else

                {{-- Expired food history --}}
                <a href="{{ route('food_view', ['history' => 'expired']) }}"
                   class="btn btn-secondary">
                    Expired Food History
                </a>

                {{-- Add food --}}
                <a href="{{ route('foodregister') }}"
                   class="btn btn-success">
                    Add Food
                </a>

            @endif

        </div>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Error Message --}}
    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif


    @if($foods->count() > 0)

        <div class="table-responsive">

            <table class="table table-bordered table-hover foods-table">

                <thead class="table-dark">

                    <tr>

                        <th>#</th>

                        <th>Image</th>

                        <th>Food Name</th>

                        <th>Type</th>

                        <th>Quantity</th>

                        <th>Price</th>

                        <th>Offer Price</th>

                        <th>Expiry Date</th>

                        <th>
                            @if(request('history') == 'expired')
                                Status
                            @else
                                Remaining Time
                            @endif
                        </th>

                        <th>Status</th>

                        @if(request('history') != 'expired')
                            <th>Actions</th>
                        @endif

                    </tr>

                </thead>


                <tbody>

                    @foreach($foods as $index => $food)

                        <tr>

                            {{-- Number --}}
                            <td>
                                {{ $index + 1 }}
                            </td>


                            {{-- Image --}}
                            <td>

                                @if($food->food_image)

                                    <img
                                        src="{{ asset('food_images/' . $food->food_image) }}"
                                        alt="{{ $food->food_name }}"
                                        class="food-image"
                                    >

                                @else

                                    No Image

                                @endif

                            </td>


                            {{-- Food Name --}}
                            <td>
                                {{ $food->food_name }}
                            </td>


                            {{-- Food Type --}}
                            <td>
                                {{ $food->food_type }}
                            </td>


                            {{-- Quantity --}}
                            <td>
                                {{ $food->food_quantity }}
                            </td>


                            {{-- Price --}}
                            <td>
                                ₹{{ number_format($food->food_price, 2) }}
                            </td>


                            {{-- Offer Price --}}
                            <td>
                                ₹{{ number_format($food->food_offerprice, 2) }}
                            </td>


                            {{-- Expiry Date --}}
                            <td>
                                {{ \Carbon\Carbon::parse($food->food_expiry_date)->format('d-m-Y') }}
                            </td>


                            {{-- Remaining Time / Expired Status --}}
                            <td>

                                @if($food->trashed())

                                    <span class="badge bg-danger">
                                        Expired
                                    </span>

                                @else

                                    <span
                                        class="countdown"
                                        data-expiry="{{ $food->food_regdate->copy()->addMinutes(90)->toIso8601String() }}">
                                        Loading...
                                    </span>

                                @endif

                            </td>


                            {{-- Status --}}
                            <td>

                                @if($food->trashed())

                                    <span class="badge bg-danger">
                                        Expired
                                    </span>

                                @elseif($food->status == 'Active')

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @elseif($food->status == 'Rejected')

                                    <span class="badge bg-danger">
                                        Rejected
                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}
                            @if(request('history') != 'expired')

                                <td>

                                    <div class="action-buttons">

                                        <a href="{{ route('food_edit', $food->food_id) }}"
                                           class="btn btn-sm btn-primary">
                                            Edit
                                        </a>

                                        <a href="{{ route('food_delete', $food->food_id) }}"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Are you sure you want to delete this food?');">
                                            Delete
                                        </a>

                                    </div>

                                </td>

                            @endif

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="alert alert-info text-center">

            @if(request('history') == 'expired')

                No expired food history found.

            @else

                No food is currently available for selling.

            @endif

        </div>

    @endif

</div>


{{-- Countdown Script --}}
@if(request('history') != 'expired')

<script>

    function updateCountdowns() {

        const countdowns = document.querySelectorAll('.countdown');

        countdowns.forEach(function(element) {

            const expiryTime = new Date(
                element.getAttribute('data-expiry')
            ).getTime();

            const now = new Date().getTime();

            const difference = expiryTime - now;


            if (difference <= 0) {

                element.innerHTML =
                    '<span class="text-danger">Expired</span>';

                return;

            }


            const totalSeconds =
                Math.floor(difference / 1000);

            const hours =
                Math.floor(totalSeconds / 3600);

            const minutes =
                Math.floor((totalSeconds % 3600) / 60);

            const seconds =
                totalSeconds % 60;


            element.innerHTML =
                hours + 'h ' +
                minutes + 'm ' +
                seconds + 's';

        });

    }


    updateCountdowns();

    setInterval(updateCountdowns, 1000);

</script>

@endif

@endsection