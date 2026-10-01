<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\tbl_buyer;
use App\Models\tbl_location;
use App\Models\tbl_login;
use App\Models\tbl_food;
use App\Models\Category;
use App\Models\tbl_purchaserequest;
use App\Models\tbl_payment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class BuyerController extends Controller
{
     public function Buyerhome()
    {
        return view('Buyer.Buyerhome');
    }
    public function buyerregister()
{
    $locations = tbl_location::all();

    return view('Buyer.buyerregister', compact('locations'));
}   
    public function buyer_insert(Request $request)
{
    $request->validate([
        'buyer_name' => 'required|string|max:255',
        'buyer_email' => 'required|email|unique:tbl_buyers,buyer_email',
        'buyer_type' => 'required|in:Family,Organization,Hostel,Others',
        'buyer_phone' => 'required',
        'buyer_address' => 'required',
        'location_id' => 'required|exists:tbl_locations,location_id',
        'registration_date' => 'required|date',
        'username' => 'required|string|unique:tbl_logins,username',
        'password' => 'required|min:6',
    ]);

    // 1. Create login account first
    $login = tbl_login::create([
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'role' => 'Buyer',
        'status' => 'Active',
    ]);

    // 2. Create buyer and connect login_id
    tbl_buyer::create([
        'buyer_name' => $request->buyer_name,
        'buyer_email' => $request->buyer_email,
        'buyer_type' => $request->buyer_type,
        'buyer_phone' => $request->buyer_phone,
        'buyer_address' => $request->buyer_address,
        'location_id' => $request->location_id,
        'registration_date' => $request->registration_date,
        'login_id' => $login->login_id,
    ]);

    return redirect()
        ->route('buyerregister')
        ->with('success', 'Buyer registered successfully.');
}

// =====================================================
    // VIEW LOGGED-IN BUYER'S OWN PROFILE
    // =====================================================

    public function myProfile()
    {
        // Get currently logged-in user's login_id
        $login_id = Auth::id();

        // Find ONLY the buyer connected to this login_id
        $buyer = tbl_buyer::with('location', 'login')
            ->where('login_id', $login_id)
            ->firstOrFail();

        return view('Buyer.myprofile', compact('buyer'));
    }

     // =====================================================
    // EDIT LOGGED-IN BUYER'S OWN PROFILE
    // =====================================================

    public function myProfileEdit()
    {
        $login_id = Auth::id();

        // Find ONLY logged-in buyer
        $buyer = tbl_buyer::with('login')
            ->where('login_id', $login_id)
            ->firstOrFail();

        // Get locations for dropdown
        $locations = tbl_location::all();

        return view(
            'Buyer.myprofile_edit',
            compact('buyer', 'locations')
        );
    }

      // =====================================================
    // UPDATE LOGGED-IN BUYER'S OWN PROFILE
    // =====================================================

    public function myProfileUpdate(Request $request)
    {
        $login_id = Auth::id();

        // Find ONLY logged-in buyer
        $buyer = tbl_buyer::where('login_id', $login_id)
            ->firstOrFail();

        $request->validate([
            'buyer_name' => 'required|string|max:255',

            'buyer_email' => 'required|email|unique:tbl_buyers,buyer_email,' .
                $buyer->buyer_id . ',buyer_id',

            'buyer_type' => 'required|in:Family,Organization,Hostel,Others',

            'buyer_phone' => 'required',

            'buyer_address' => 'required',

            'location_id' => 'required|exists:tbl_locations,location_id',

            'username' => 'required|string|unique:tbl_logins,username,' .
                $login_id . ',login_id',

            'password' => 'nullable|min:6',
        ]);
        // Update buyer table
        $buyer->update([
            'buyer_name' => $request->buyer_name,
            'buyer_email' => $request->buyer_email,
            'buyer_type' => $request->buyer_type,
            'buyer_phone' => $request->buyer_phone,
            'buyer_address' => $request->buyer_address,
            'location_id' => $request->location_id,
        ]);


        // Update login table
        $login = tbl_login::where('login_id', $login_id)
            ->first();

        if ($login) {

            $login->username = $request->username;

            // Change password only if user entered a new password
            if ($request->filled('password')) {
                $login->password = Hash::make($request->password);
            }

            $login->save();
        }
         return redirect()
            ->route('buyer_profile')
            ->with('success', 'Profile updated successfully.');
    }
// =====================================================
    // DELETE LOGGED-IN BUYER'S OWN ACCOUNT
    // =====================================================

    public function myProfileDelete()
    {
        $login_id = Auth::id();

        // Find only logged-in buyer
        $buyer = tbl_buyer::where('login_id', $login_id)
            ->first();

        if ($buyer) {
            $buyer->delete();
        }

        // Delete corresponding login
        tbl_login::where('login_id', $login_id)
            ->delete();

        // Logout
        Auth::logout();

        return redirect('/')
            ->with('success', 'Your account has been deleted successfully.');
    }

    public function viewFoods(Request $request)
{
    $query = tbl_food::with([
        'donor.location',
        'subcategory.category'
    ])
    ->where('status', 'Active')
    ->where('food_regdate', '>=', now()->subMinutes(90));

    // Filter by donor location
    if ($request->location_id) {
        $query->whereHas('donor', function ($q) use ($request) {
            $q->where('location_id', $request->location_id);
        });
    }

    // Filter by category
    if ($request->cid) {
        $query->whereHas('subcategory', function ($q) use ($request) {
            $q->where('cid', $request->cid);
        });
    }

    // Sorting
    if ($request->sort == 'new') {

        $query->orderBy('food_regdate', 'desc');

    } elseif ($request->sort == 'old') {

        $query->orderBy('food_regdate', 'asc');

    } elseif ($request->sort == 'low') {

        $query->orderBy('food_offerprice', 'asc');

    } elseif ($request->sort == 'high') {

        $query->orderBy('food_offerprice', 'desc');

    } else {

        $query->orderBy('food_regdate', 'desc');

    }

    $foods = $query->get();

    $locations = tbl_location::all();
    $categories = Category::all();

    return view('Buyer.viewfoods', compact(
        'foods',
        'locations',
        'categories'
    ));
}

public function foodDetails($food_id)
{
    $food = tbl_food::with([
        'donor.location',
        'subcategory.category'
    ])->where('food_id', $food_id)
      ->where('status', 'Active')
      ->firstOrFail();

    return view('Buyer.fooddetails', compact('food'));
}


public function requestFood(Request $request, $food_id)
{
    // Check whether the food exists and is active
    $food = tbl_food::where('food_id', $food_id)
        ->where('status', 'Active')
        ->first();

    if (!$food) {
        return redirect()
            ->route('buyer.foods')
            ->with('error', 'This food is no longer available.');
    }

    // Validate requested quantity
    $request->validate([
        'request_quantity' => [
            'required',
            'integer',
            'min:1',
            'max:' . $food->food_quantity
        ],
    ]);

    // Check logged-in buyer
    $login_id = Auth::id();

    if (!$login_id) {
        return redirect()
            ->route('login')
            ->with('error', 'Please login as a buyer first.');
    }

    // Find buyer connected to the logged-in account
    $buyer = tbl_buyer::where('login_id', $login_id)->first();

    if (!$buyer) {
        return redirect()
            ->route('Buyerhome')
            ->with('error', 'Buyer profile not found. Please register as a buyer first.');
    }

    // Requested quantity
    $quantity = (int) $request->request_quantity;

    // Calculate total amount
    $total_amount = $food->food_offerprice * $quantity;

    // Create purchase request
    tbl_purchaserequest::create([
        'buyer_id' => $buyer->buyer_id,
        'food_id' => $food->food_id,
        'request_quantity' => $quantity,
        'request_date' => now(),
        'status' => 'Pending',
        'total_amount' => $total_amount,
    ]);

    // Redirect to My Food Requests
    return redirect()
        ->route('buyer.my.requests')
        ->with('success', 'Food request sent successfully to the donor.');
}

public function myFoodRequests()
{
    $login_id = Auth::id();

    $buyer = tbl_buyer::where('login_id', $login_id)
        ->firstOrFail();

    $requests = tbl_purchaserequest::with([
        'food',
        'payment'
    ])
    ->where('buyer_id', $buyer->buyer_id)
    ->orderBy('request_date', 'desc')
    ->get();

    return view(
        'Buyer.myfoodrequests',
        compact('requests')
    );
}

public function paymentPage($request_id)
{
    $login_id = Auth::id();

    $buyer = tbl_buyer::where('login_id', $login_id)
        ->firstOrFail();

    $purchaseRequest = tbl_purchaserequest::with([
        'food',
        'payment'
    ])
    ->where('request_id', $request_id)
    ->where('buyer_id', $buyer->buyer_id)
    ->firstOrFail();

    // Payment is allowed only after donor accepts
    if ($purchaseRequest->status != 'Accepted') {
        return redirect()
            ->route('buyer.my.requests')
            ->with('error', 'Payment is available only after the donor accepts your request.');
    }

    // If already paid, don't allow payment again
    if ($purchaseRequest->payment &&
        $purchaseRequest->payment->payment_status == 'Paid') {

        return redirect()
            ->route('buyer.my.requests')
            ->with('error', 'This request has already been paid.');
    }

    return view(
        'Buyer.payment',
        compact('purchaseRequest')
    );
}

public function makePayment(Request $request, $request_id)
{
    $purchaseRequest = tbl_purchaserequest::findOrFail($request_id);

    $payment = new tbl_payment();

    $payment->request_id = $purchaseRequest->request_id;
    $payment->total_amount = $purchaseRequest->total_amount;
    $payment->payment_date = now();
    $payment->payment_status = 'Paid';

    $payment->save();

    $purchaseRequest->status = 'Paid';
    $purchaseRequest->save();

    return redirect()
        ->route('buyer.my.requests')
        ->with('success', 'Payment successful.');
}
public function paymentReceipt($payment_id)
{
    $payment = tbl_payment::with([
        'purchaseRequest.buyer',
        'purchaseRequest.food.donor'
    ])->findOrFail($payment_id);

    return view('Buyer.paymentreceipt', compact('payment'));
}

public function downloadReceipt($payment_id)
{
    $payment = tbl_payment::with([
        'purchaseRequest.buyer',
        'purchaseRequest.food.donor'
    ])->findOrFail($payment_id);

    $pdf = Pdf::loadView('Buyer.paymentreceipt', compact('payment'));

    return $pdf->download(
        'Payment_Receipt_' . $payment->payment_id . '.pdf'
    );
}
}