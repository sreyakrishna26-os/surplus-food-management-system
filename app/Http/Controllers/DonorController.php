<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use App\Models\tbl_login;
use App\Models\tbl_donor;
use App\Models\tbl_location;
use App\Models\tbl_food;
use App\Models\tbl_foodquantity;
use App\Models\tbl_purchaserequest;
use App\Models\tbl_payment;


class DonorController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Donor Home
    |--------------------------------------------------------------------------
    */

    public function Donorhome()
    {
        return view('Donor.Donorhome');
    }


    /*
    |--------------------------------------------------------------------------
    | Donor Registration Page
    |--------------------------------------------------------------------------
    */

    public function donorregister()
    {
        $locations = tbl_location::all();

        return view(
            'Donor.Donorregister',
            compact('locations')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Insert Donor
    |--------------------------------------------------------------------------
    */

    public function donor_insert(Request $request)
    {
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'donor_email' => 'required|email|max:255',
            'username' => 'required|string|max:255|unique:tbl_logins,username',
            'password' => 'required|string|min:6|confirmed',
            'donor_phone' => 'required|string|max:15',
            'donor_address' => 'required|string|max:255',
            'id_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'reg_date' => 'required|date',
            'location_id' => 'required|exists:tbl_locations,location_id',
            'license_number' => 'nullable|string|max:255',
        ]);

        $idProofPath = null;

        try {

            DB::beginTransaction();

            /*
            |--------------------------------------------------------------------------
            | Upload ID Proof
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('id_proof')) {

                $idProofPath = $request
                    ->file('id_proof')
                    ->store('id_proofs', 'public');
            }


            /*
            |--------------------------------------------------------------------------
            | Create Login Account
            |--------------------------------------------------------------------------
            */

            $login = tbl_login::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 'Donor',

                // DONOR APPROVAL REMAINS
                'status' => 'Pending',
            ]);


            /*
            |--------------------------------------------------------------------------
            | Create Donor Record
            |--------------------------------------------------------------------------
            */

            tbl_donor::create([
                'login_id' => $login->login_id,
                'donor_name' => $request->donor_name,
                'donor_email' => $request->donor_email,
                'donor_phone' => $request->donor_phone,
                'donor_address' => $request->donor_address,
                'id_proof' => $idProofPath,
                'reg_date' => $request->reg_date,
                'location_id' => $request->location_id,
                'license_number' => $request->license_number,

                // DONOR APPROVAL REMAINS
                'status' => 'Pending',
            ]);

            DB::commit();

            return redirect()
                ->route('donorregister')
                ->with(
                    'success',
                    'Your registration request has been submitted successfully. Please wait for admin approval.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            if (
                $idProofPath &&
                Storage::disk('public')->exists($idProofPath)
            ) {
                Storage::disk('public')->delete($idProofPath);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Failed to submit registration request. Please try again.'
                );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Donor View
    |--------------------------------------------------------------------------
    */

    public function donor_view()
    {
        $donors = tbl_donor::with([
            'location',
            'login'
        ])->get();

        return view(
            'Donor.Donorregview',
            compact('donors')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Donor Edit Page
    |--------------------------------------------------------------------------
    */

    public function donor_edit($donor_id)
    {
        $donor = tbl_donor::findOrFail($donor_id);

        $login = tbl_login::findOrFail(
            $donor->login_id
        );

        $locations = tbl_location::all();

        return view(
            'Donor.Donoredit',
            compact(
                'donor',
                'login',
                'locations'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Donor
    |--------------------------------------------------------------------------
    */

    public function donor_update(
        Request $request,
        $donor_id
    ) {
        $donor = tbl_donor::findOrFail($donor_id);

        if (empty($donor->login_id)) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Login account is not linked with this donor.'
                );
        }

        $login = tbl_login::where(
            'login_id',
            $donor->login_id
        )->first();

        if (!$login) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Login account not found for this donor.'
                );
        }

        $request->validate([

            'donor_name' =>
                'required|string|max:255',

            'donor_email' =>
                'required|email|max:255',

            'username' => [
                'required',
                'string',
                'max:255',

                Rule::unique(
                    'tbl_logins',
                    'username'
                )->ignore(
                    $login->login_id,
                    'login_id'
                ),
            ],

            'password' =>
                'nullable|string|min:6|confirmed',

            'donor_phone' =>
                'required|string|max:15',

            'donor_address' =>
                'required|string|max:255',

            'id_proof' =>
                'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',

            'reg_date' =>
                'required|date',

            'location_id' =>
                'required|exists:tbl_locations,location_id',

            'license_number' =>
                'nullable|string|max:255',

            'status' =>
                'required|in:Active,Inactive',
        ]);

        $oldIdProof = $donor->id_proof;
        $newIdProofPath = null;

        try {

            DB::beginTransaction();

            /*
            |--------------------------------------------------------------------------
            | Update Login
            |--------------------------------------------------------------------------
            */

            $login->username = $request->username;
            $login->role = 'Donor';
            $login->status = $request->status;

            if ($request->filled('password')) {

                $login->password =
                    Hash::make(
                        $request->password
                    );
            }

            $login->save();


            /*
            |--------------------------------------------------------------------------
            | Upload New ID Proof
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('id_proof')) {

                $newIdProofPath =
                    $request
                        ->file('id_proof')
                        ->store(
                            'id_proofs',
                            'public'
                        );

                $donor->id_proof =
                    $newIdProofPath;
            }


            /*
            |--------------------------------------------------------------------------
            | Update Donor
            |--------------------------------------------------------------------------
            */

            $donor->donor_name =
                $request->donor_name;

            $donor->donor_email =
                $request->donor_email;

            $donor->donor_phone =
                $request->donor_phone;

            $donor->donor_address =
                $request->donor_address;

            $donor->reg_date =
                $request->reg_date;

            $donor->location_id =
                $request->location_id;

            $donor->license_number =
                $request->license_number;

            $donor->status =
                $request->status;

            $donor->save();

            DB::commit();


            /*
            |--------------------------------------------------------------------------
            | Delete Old ID Proof
            |--------------------------------------------------------------------------
            */

            if (
                $newIdProofPath &&
                $oldIdProof &&
                Storage::disk('public')->exists($oldIdProof)
            ) {

                Storage::disk('public')->delete(
                    $oldIdProof
                );
            }

            return redirect()
                ->route('donor_view')
                ->with(
                    'success',
                    'Donor updated successfully.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            if (
                $newIdProofPath &&
                Storage::disk('public')->exists($newIdProofPath)
            ) {

                Storage::disk('public')->delete(
                    $newIdProofPath
                );
            }

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Failed to update donor: ' .
                    $e->getMessage()
                );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Donor
    |--------------------------------------------------------------------------
    */

    public function donor_delete($donor_id)
    {
        $donor = tbl_donor::findOrFail(
            $donor_id
        );

        $idProofPath =
            $donor->id_proof;

        try {

            DB::beginTransaction();

            /*
            |--------------------------------------------------------------------------
            | Delete Login Account
            |--------------------------------------------------------------------------
            */

            if ($donor->login_id) {

                $login = tbl_login::find(
                    $donor->login_id
                );

                if ($login) {
                    $login->delete();
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Delete Donor
            |--------------------------------------------------------------------------
            */

            $donor->delete();

            DB::commit();


            /*
            |--------------------------------------------------------------------------
            | Delete ID Proof File
            |--------------------------------------------------------------------------
            */

            if (
                $idProofPath &&
                Storage::disk('public')->exists($idProofPath)
            ) {

                Storage::disk('public')->delete(
                    $idProofPath
                );
            }

            return redirect()
                ->route('donor_view')
                ->with(
                    'success',
                    'Donor deleted successfully.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Failed to delete donor: ' .
                    $e->getMessage()
                );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Admin - Pending Donor Requests
    |--------------------------------------------------------------------------
    */

    public function donor_pending()
    {
        $donors = tbl_donor::with([
            'location',
            'login'
        ])
        ->where('status', 'Pending')
        ->get();

        return view(
            'admin.donorpending',
            compact('donors')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Admin - View Pending Donor Request
    |--------------------------------------------------------------------------
    */

    public function adminView($donor_id)
    {
        $donor = tbl_donor::with([
            'location',
            'login'
        ])->findOrFail($donor_id);

        return view(
            'admin.donorpendingview',
            compact('donor')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Admin - Accept Donor
    |--------------------------------------------------------------------------
    */

    public function donor_accept($donor_id)
    {
        $donor = tbl_donor::findOrFail($donor_id);

        $donor->status = 'Active';
        $donor->save();

        if ($donor->login_id) {

            $login = tbl_login::find(
                $donor->login_id
            );

            if ($login) {

                $login->status = 'Active';
                $login->save();
            }
        }

        return redirect()
            ->route('donor_pending')
            ->with(
                'success',
                'Donor registration accepted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Admin - Reject Donor
    |--------------------------------------------------------------------------
    */

    public function donor_reject($donor_id)
    {
        $donor = tbl_donor::findOrFail($donor_id);

        $donor->status = 'Rejected';
        $donor->save();

        if ($donor->login_id) {

            $login = tbl_login::find(
                $donor->login_id
            );

            if ($login) {

                $login->status = 'Rejected';
                $login->save();
            }
        }

        return redirect()
            ->route('donor_pending')
            ->with(
                'success',
                'Donor registration rejected successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | All Donors - Admin
    |--------------------------------------------------------------------------
    */

    public function allDonors()
    {
        $donors = tbl_donor::all();

        return view(
            'admin.donors',
            compact('donors')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | View Donor - Admin
    |--------------------------------------------------------------------------
    */

    public function view($donor_id)
    {
        $donor = tbl_donor::findOrFail($donor_id);

        return view(
            'admin.donor_view',
            compact('donor')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Food Registration Page
    |--------------------------------------------------------------------------
    */

    public function foodregister()
    {
        $subcategories = DB::table('subcategories')->get();

        return view(
            'Donor.foodregister',
            compact('subcategories')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Insert Food
    |--------------------------------------------------------------------------
    |
    | IMPORTANT:
    | Food does NOT require admin approval.
    | Newly registered food is immediately Active.
    |
    |--------------------------------------------------------------------------
    */

    public function food_insert(Request $request)
    {
        $request->validate([
            'food_name' =>
                'required|string|max:255',

            'food_type' =>
                'required|string|max:50',

            'food_quantity' =>
                'required|integer|min:1',

            'food_price' =>
                'required|numeric|min:0',

            'food_offerprice' =>
                'required|numeric|min:0',

            'food_image' =>
                'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'food_expiry_date' =>
                'required|date|after_or_equal:today',

            'sid' =>
                'required|integer',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Get Logged-in Donor
        |--------------------------------------------------------------------------
        */

        $login_id = Auth::id();

        $donor = tbl_donor::where(
            'login_id',
            $login_id
        )->first();

        if (!$donor) {

            return back()
                ->with(
                    'error',
                    'Donor account not found.'
                )
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Upload Food Image
        |--------------------------------------------------------------------------
        */

        $imageName = null;

        if ($request->hasFile('food_image')) {

            $image = $request->file('food_image');

            $imageName =
                time() . '_' .
                $image->getClientOriginalName();

            $image->move(
                public_path('food_images'),
                $imageName
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Insert Food
        |--------------------------------------------------------------------------
        */

        tbl_food::create([

            'food_name' =>
                $request->food_name,

            'food_type' =>
                $request->food_type,

            'food_quantity' =>
                $request->food_quantity,

            'food_price' =>
                $request->food_price,

            'food_offerprice' =>
                $request->food_offerprice,

            'food_image' =>
                $imageName,

            'food_expiry_date' =>
                $request->food_expiry_date,

            'food_regdate' =>
                 now(),

            'donor_id' =>
                $donor->donor_id,

            'sid' =>
                $request->sid,

            // FOOD DOES NOT NEED ADMIN APPROVAL
            'status' =>
                'Active',
        ]);


        return redirect()
            ->route('foodregister')
            ->with(
                'success',
                'Food registered successfully and is now available to buyers.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Food View
    |--------------------------------------------------------------------------
    */

public function food_view(Request $request)
{
    $login_id = Auth::id();

    $donor = tbl_donor::where(
        'login_id',
        $login_id
    )->first();

    if (!$donor) {
        return redirect()
            ->route('Donorhome')
            ->with(
                'error',
                'Donor account not found.'
            );
    }

    // If expired history is requested
    if ($request->get('history') == 'expired') {

        $foods = tbl_food::onlyTrashed()
            ->where(
                'donor_id',
                $donor->donor_id
            )
            ->orderBy(
                'food_regdate',
                'desc'
            )
            ->get();

        return view(
            'Donor.foodview',
            compact('foods')
        );
    }

    // Default: show only foods that are still sellable
    $foods = tbl_food::where(
        'donor_id',
        $donor->donor_id
    )
    ->orderBy(
        'food_regdate',
        'desc'
    )
    ->get();

    return view(
        'Donor.foodview',
        compact('foods')
    );
}

    /*
    |--------------------------------------------------------------------------
    | Food Edit
    |--------------------------------------------------------------------------
    */

    public function food_edit($food_id)
    {
        $login_id = Auth::id();

        $donor = tbl_donor::where(
            'login_id',
            $login_id
        )->first();

        if (!$donor) {

            return redirect()
                ->route('Donorhome')
                ->with(
                    'error',
                    'Donor account not found.'
                );
        }


        $food = tbl_food::where(
            'food_id',
            $food_id
        )
        ->where(
            'donor_id',
            $donor->donor_id
        )
        ->firstOrFail();


        $subcategories =
            DB::table('subcategories')->get();


        return view(
            'Donor.foodedit',
            compact(
                'food',
                'subcategories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Food Update
    |--------------------------------------------------------------------------
    */

    public function food_update(
        Request $request,
        $food_id
    ) {
        $login_id = Auth::id();

        $donor = tbl_donor::where(
            'login_id',
            $login_id
        )->first();

        if (!$donor) {

            return redirect()
                ->route('Donorhome')
                ->with(
                    'error',
                    'Donor account not found.'
                );
        }


        $food = tbl_food::where(
            'food_id',
            $food_id
        )
        ->where(
            'donor_id',
            $donor->donor_id
        )
        ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'food_name' =>
                'required|string|max:255',

            'food_type' =>
                'required|string|max:50',

            'food_quantity' =>
                'required|integer|min:1',

            'food_price' =>
                'required|numeric|min:0',

            'food_offerprice' =>
                'required|numeric|min:0',

            'food_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'food_expiry_date' =>
                'required|date',

            'sid' =>
                'required|integer',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Update Food Details
        |--------------------------------------------------------------------------
        */

        $food->food_name =
            $request->food_name;

        $food->food_type =
            $request->food_type;

        $food->food_quantity =
            $request->food_quantity;

        $food->food_price =
            $request->food_price;

        $food->food_offerprice =
            $request->food_offerprice;

        $food->food_expiry_date =
            $request->food_expiry_date;

        $food->sid =
            $request->sid;


        /*
        |--------------------------------------------------------------------------
        | Upload New Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('food_image')) {

            if (
                $food->food_image &&
                file_exists(
                    public_path(
                        'food_images/' .
                        $food->food_image
                    )
                )
            ) {

                unlink(
                    public_path(
                        'food_images/' .
                        $food->food_image
                    )
                );
            }


            $image =
                $request->file('food_image');

            $imageName =
                time() . '_' .
                $image->getClientOriginalName();

            $image->move(
                public_path('food_images'),
                $imageName
            );

            $food->food_image =
                $imageName;
        }


        $food->save();


        return redirect()
            ->route('food_view')
            ->with(
                'success',
                'Food updated successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Food Delete
    |--------------------------------------------------------------------------
    */

    public function food_delete($food_id)
    {
        $login_id = Auth::id();

        $donor = tbl_donor::where(
            'login_id',
            $login_id
        )->first();

        if (!$donor) {

            return redirect()
                ->route('Donorhome')
                ->with(
                    'error',
                    'Donor account not found.'
                );
        }


        $food = tbl_food::where(
            'food_id',
            $food_id
        )
        ->where(
            'donor_id',
            $donor->donor_id
        )
        ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Delete Food Image
        |--------------------------------------------------------------------------
        */

        if (
            $food->food_image &&
            file_exists(
                public_path(
                    'food_images/' .
                    $food->food_image
                )
            )
        ) {

            unlink(
                public_path(
                    'food_images/' .
                    $food->food_image
                )
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Food
        |--------------------------------------------------------------------------
        */

        $food->delete();


        return redirect()
            ->route('food_view')
            ->with(
                'success',
                'Food deleted successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Donor - Food Purchase Requests
    |--------------------------------------------------------------------------
    |
    | These are BUYER purchase requests.
    | They are NOT removed.
    |
    |--------------------------------------------------------------------------
    */

    public function foodRequests()
    {
        $login_id = Auth::id();

        $donor = tbl_donor::where(
            'login_id',
            $login_id
        )->firstOrFail();


        $requests = tbl_purchaserequest::with([
            'buyer.location',
            'food'
        ])
        ->whereHas('food', function ($query) use ($donor) {

            $query->where(
                'donor_id',
                $donor->donor_id
            );

        })
        ->orderBy(
            'request_date',
            'desc'
        )
        ->get();


        return view(
            'Donor.foodrequests',
            compact('requests')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Accept Food Purchase Request
    |--------------------------------------------------------------------------
    */

    public function acceptFoodRequest($request_id)
    {
        $login_id = Auth::id();

        $donor = tbl_donor::where(
            'login_id',
            $login_id
        )->firstOrFail();


        $purchaseRequest =
            tbl_purchaserequest::with('food')
            ->where(
                'request_id',
                $request_id
            )
            ->whereHas(
                'food',
                function ($query) use ($donor) {

                    $query->where(
                        'donor_id',
                        $donor->donor_id
                    );

                }
            )
            ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Check Request Status
        |--------------------------------------------------------------------------
        */

        if (
            $purchaseRequest->status != 'Pending'
        ) {

            return redirect()
                ->route('donor.food.requests')
                ->with(
                    'error',
                    'This request has already been processed.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Check Food Quantity
        |--------------------------------------------------------------------------
        */

        $food = $purchaseRequest->food;

        if (
            !$food ||
            $food->food_quantity <
            $purchaseRequest->request_quantity
        ) {

            return redirect()
                ->route('donor.food.requests')
                ->with(
                    'error',
                    'Not enough food quantity available.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Reduce Food Quantity
        |--------------------------------------------------------------------------
        */

        $food->food_quantity =
            $food->food_quantity -
            $purchaseRequest->request_quantity;

        $food->save();


        /*
        |--------------------------------------------------------------------------
        | Accept Request
        |--------------------------------------------------------------------------
        */

        $purchaseRequest->status =
            'Accepted';

        $purchaseRequest->save();


        /*
        |--------------------------------------------------------------------------
        | Create Payment
        |--------------------------------------------------------------------------
        */

        tbl_payment::create([

            'request_id' =>
                $purchaseRequest->request_id,

            'total_amount' =>
                $purchaseRequest->total_amount,

            'payment_date' =>
                now()->toDateString(),

            'payment_status' =>
                'Pending',
        ]);


        return redirect()
            ->route('donor.food.requests')
            ->with(
                'success',
                'Food request accepted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Reject Food Purchase Request
    |--------------------------------------------------------------------------
    */

    public function rejectFoodRequest($request_id)
    {
        $login_id = Auth::id();

        $donor = tbl_donor::where(
            'login_id',
            $login_id
        )->firstOrFail();


        $purchaseRequest =
            tbl_purchaserequest::with('food')
            ->where(
                'request_id',
                $request_id
            )
            ->whereHas(
                'food',
                function ($query) use ($donor) {

                    $query->where(
                        'donor_id',
                        $donor->donor_id
                    );

                }
            )
            ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Reject Only Pending Requests
        |--------------------------------------------------------------------------
        */

        if (
            $purchaseRequest->status != 'Pending'
        ) {

            return redirect()
                ->route('donor.food.requests')
                ->with(
                    'error',
                    'This request has already been processed.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Update Request Status
        |--------------------------------------------------------------------------
        */

        $purchaseRequest->status =
            'Rejected';

        $purchaseRequest->save();


        return redirect()
            ->route('donor.food.requests')
            ->with(
                'success',
                'Food request rejected successfully.'
            );
    }
}