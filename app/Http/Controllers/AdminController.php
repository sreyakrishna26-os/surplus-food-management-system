<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\tbl_district;
use App\Models\tbl_location;
use App\Models\tbl_donor;
use App\Models\tbl_login;
use App\Models\tbl_food;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function Adminhome()
    {
        return view('admin.Adminhome');
    }
    public function categoryregister()
    {
        return view('admin.categoryregister');
    }

    
    public function category_insert(Request $request)
    {
        $request->validate([
            'cname' => 'required|string|max:255',
        ]);

        
        Category::create([
            'cname' => $request->input('cname'),
        ]);

        return redirect()->route('categoryregister')->with('success', 'Category registered successfully.');
    }
    public function category_view()
    {
        $categories = Category::all();
        return view('admin.categoryview', compact('categories'));
    }
    public function category_edit($cid)
    {
        $category = Category::findOrFail($cid);
        return view('admin.categoryedit', compact('category'));
    }
    public function category_update(Request $request, $cid)
    {
        $request->validate([
            'cname' => 'required|string|max:255',
        ]); 

        $category = Category::findOrFail($cid);
        $category->update([
            'cname' => $request->input('cname'),
        ]);

        return redirect()->route('category_view')->with('success', 'Category updated successfully.');
    }
    public function category_delete($cid)
    {
        $category = Category::findOrFail($cid);
        $category->delete();

        return redirect()->route('category_view')->with('success', 'Category deleted successfully.');
    }
    public function subcatregister()
    {
        $categories = Category::all();
        return view('admin.subcatregister', compact('categories'));
    }
    public function subcategory_insert(Request $request)
    {
        $request->validate([
            'sname' => 'required|string|max:255',
            'cid' => 'required|exists:categories,cid',
        ]);

        Subcategory::create([
            'sname' => $request->input('sname'),
            'cid' => $request->input('cid'),
        ]);

        return redirect()->route('subcatregister')->with('success', 'Subcategory created successfully.');
    }
    public function subcategory_view()
    {
        $categories = Category::all();
        $subcategories = Subcategory::with('category')->get();
        return view('admin.subcatview', compact('subcategories', 'categories'));
    }
    public function getSubcategories($cid)
    {
        $subcategories = Subcategory::where('cid', $cid)->get();
        return response()->json($subcategories);
    }
    public function getSubcategoriesByCategory($cid)
    {
        $subcategories = Subcategory::where('cid', $cid)->get();
        return response()->json($subcategories);
    }
    public function subcategory_edit($sid)
    {
        $subcategory = Subcategory::findOrFail($sid);
        $categories = Category::all();
        return view('admin.subcatedit', compact('subcategory', 'categories'));
    }
    public function subcategory_update(Request $request, $sid)
    {
        $request->validate([
            'sname' => 'required|string|max:255',
            'cid' => 'required|exists:categories,cid',
        ]);

        $subcategory = Subcategory::findOrFail($sid);
        $subcategory->update([
            'sname' => $request->input('sname'),
            'cid' => $request->input('cid'),
        ]);

        return redirect()->route('subcategory_view')->with('success', 'Subcategory updated successfully.');
    }
    public function subcategory_delete($sid)
    {
        $subcategory = Subcategory::findOrFail($sid);
        $subcategory->delete();

        return redirect()->route('subcategory_view')->with('success', 'Subcategory deleted successfully.');
    }  
    public function districtregister()
    {
        return view('admin.districtregister');
    }
    public function district_insert(Request $request)
    {
        $request->validate([
            'district_name' => 'required|string|max:255',
        ]); 

        tbl_district::create([
            'district_name' => $request->input('district_name'),
        ]);

        return redirect()->route('districtregister')->with('success', 'District created successfully.');
    }
    public function district_view()
    {
        $districts = tbl_district::all();
        return view('admin.districtview', compact('districts'));
    }   
    public function district_edit($district_id)
    {
        $district = tbl_district::findOrFail($district_id);
        return view('admin.districtedit', compact('district'));
    }
    public function district_update(Request $request, $district_id)
{
    $request->validate([
        'district_name' => 'required|string|max:255',
    ]);

    $district = tbl_district::findOrFail($district_id);

    $district->update([
        'district_name' => $request->input('district_name'),
    ]);

    return redirect()->route('district_view')
                     ->with('success', 'District updated successfully.');
}       
    public function district_delete($district_id)
    {
        $district = tbl_district::findOrFail($district_id);
        $district->delete();

        return redirect()->route('district_view')->with('success', 'District deleted successfully.');
    } 
    public function locationregister()
    {
        $districts = tbl_district::all();
        return view('admin.locationregister', compact('districts'));
    }
    public function location_insert(Request $request)
    {
        $request->validate([
            'location_name' => 'required|string|max:255',
            'district_id' => 'required|exists:tbl_districts,district_id',
        ]); 

        tbl_location::create([
            'location_name' => $request->input('location_name'),
            'district_id' => $request->input('district_id'),
        ]);

        return redirect()->route('locationregister')->with('success', 'Location created successfully.');     
    }
    public function location_view()
{
    $locations = tbl_location::with('district')->get();
    $districts = tbl_district::all();

    return view('admin.Locationview', compact('locations', 'districts'));
}
    public function location_edit($location_id)
    {
        $location = tbl_location::findOrFail($location_id);
        $districts = tbl_district::all();
        return view('admin.locationedit', compact('location', 'districts'));
    }
    public function location_update(Request $request, $location_id)
    {
        $request->validate([
            'location_name' => 'required|string|max:255',
            'district_id' => 'required|exists:tbl_districts,district_id',
        ]);

        $location = tbl_location::findOrFail($location_id);
        $location->update([
            'location_name' => $request->input('location_name'),
            'district_id' => $request->input('district_id'),
        ]);

        return redirect()->route('location_view')->with('success', 'Location updated successfully.');
    }
    public function location_delete($location_id)
    {
        $location = tbl_location::findOrFail($location_id);
        $location->delete();    

        return redirect()->route('location_view')->with('success', 'Location deleted successfully.');
    }


    /*|--------------------------------------------------------------------------
| Pending Donor Requests
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
        'Donor.DonorPending',
        compact('donors')
    );
}

/*
|--------------------------------------------------------------------------
| Accept Donor Registration
|--------------------------------------------------------------------------
*/

public function donor_accept($donor_id)
{
    $donor = tbl_donor::findOrFail($donor_id);

    if ($donor->status !== 'Pending') {

        return redirect()
            ->route('donor_pending')
            ->with(
                'error',
                'This registration request has already been processed.'
            );
    }

    $login = tbl_login::find($donor->login_id);

    if (!$login) {

        return redirect()
            ->route('donor_pending')
            ->with(
                'error',
                'Login account not found.'
            );
    }

    try {

        DB::beginTransaction();

        // Activate login account
        $login->status = 'Active';
        $login->role = 'Donor';
        $login->save();

        // Activate donor
        $donor->status = 'Active';
        $donor->save();

        DB::commit();

        return redirect()
            ->route('donor_pending')
            ->with(
                'success',
                'Donor registration approved successfully.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        return redirect()
            ->route('donor_pending')
            ->with(
                'error',
                'Failed to approve donor.'
            );
    }
}

/*
|--------------------------------------------------------------------------
| Reject Donor Registration
|--------------------------------------------------------------------------
*/

public function donor_reject($donor_id)
{
    $donor = tbl_donor::findOrFail($donor_id);

    if ($donor->status !== 'Pending') {

        return redirect()
            ->route('donor_pending')
            ->with(
                'error',
                'This registration request has already been processed.'
            );
    }

    try {

        DB::beginTransaction();

        // Reject login account
        $login = tbl_login::find($donor->login_id);

        if ($login) {

            $login->status = 'Rejected';
            $login->save();
        }

        // Reject donor
        $donor->status = 'Rejected';
        $donor->save();

        DB::commit();

        return redirect()
            ->route('donor_pending')
            ->with(
                'success',
                'Donor registration rejected.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        return redirect()
            ->route('donor_pending')
            ->with(
                'error',
                'Failed to reject donor.'
            );
    }
}

// ================= VIEW REGISTERED FOODS =================

public function food_view()
{
    $foods = tbl_food::orderBy('food_regdate', 'desc')->get();

    return view('admin.foodview', compact('foods'));
}


// ================= FILTER FOODS BY DATE =================

public function food_filter(Request $request)
{
    $request->validate([
        'from_date' => 'nullable|date',
        'to_date' => 'nullable|date|after_or_equal:from_date',
    ]);

    $query = tbl_food::query();

    if ($request->filled('from_date')) {
        $query->whereDate('food_regdate', '>=', $request->from_date);
    }

    if ($request->filled('to_date')) {
        $query->whereDate('food_regdate', '<=', $request->to_date);
    }

    $foods = $query
        ->orderBy('food_regdate', 'desc')
        ->get();

    return view('admin.foodview', compact('foods'));
}

public function food_accept($food_id)
    {
        $food = tbl_food::findOrFail($food_id);

        $food->status = 'Active';
        $food->save();

        return redirect()
            ->back()
            ->with('success', 'Food accepted successfully.');
    }


    public function food_reject($food_id)
    {
        $food = tbl_food::findOrFail($food_id);

        $food->status = 'Rejected';
        $food->save();

        return redirect()
            ->back()
            ->with('success', 'Food rejected successfully.');
    }


    
}