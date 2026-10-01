<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Guest.guest');
});


 Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//guest home page
Route::get('/guest', function () {
    return view('Guest.guest');
});
Route::middleware('auth')->group(function () 
{
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('Adminhome',[AdminController::Class,'Adminhome'])->name('Adminhome');
Route::get('/Buyerhome',[BuyerController::Class,'Buyerhome'])->name('Buyerhome');
Route::get('categoryregister',[AdminController::Class,'categoryregister'])->name('categoryregister');
Route::post('category_insert', [AdminController::class, 'category_insert'])->name('category_insert');
Route::get('category_view', [AdminController::class, 'category_view'])->name('category_view');
Route::get('category_edit/{cid}', [AdminController::class, 'category_edit'])->name('category_edit');
Route::post('category_update/{cid}', [AdminController::class, 'category_update'])->name('category_update');
Route::get('category_delete/{cid}', [AdminController::class, 'category_delete'])->name('category_delete');
Route::get('subcatregister',[AdminController::Class,'subcatregister'])->name('subcatregister');
Route::post('subcategory_insert', [AdminController::class, 'subcategory_insert'])->name('subcategory_insert');
Route::get('subcategory_view', [AdminController::class, 'subcategory_view'])->name('subcategory_view');
Route::get('subcategory_edit/{sid}', [AdminController::class, 'subcategory_edit'])->name('subcategory_edit');
Route::post('subcategory_update/{sid}', [AdminController::class, 'subcategory_update'])->name('subcategory_update');
Route::delete('subcategory_delete/{sid}', [AdminController::class, 'subcategory_delete'])->name('subcategory_delete');
Route::get('/get-subcategories/{cid}', [AdminController::class, 'getSubcategories']);
Route::get('districtregister',[AdminController::Class,'districtregister'])->name('districtregister');
Route::post('district_insert', [AdminController::class, 'district_insert'])->name('district_insert');
Route::get('district_view', [AdminController::class, 'district_view'])->name('district_view');
Route::get('district_edit/{district_id}', [AdminController::class, 'district_edit'])->name('district_edit');
Route::post('district_update/{district_id}', [AdminController::class, 'district_update'])->name('district_update');
Route::delete('/district_delete/{district_id}', [AdminController::class, 'district_delete'])->name('district_delete');
Route::get('locationregister',[AdminController::Class,'locationregister'])->name('locationregister');
Route::post('location_insert', [AdminController::class, 'location_insert'])->name('location_insert');   
Route::get('location_view', [AdminController::class, 'location_view'])->name('location_view');
Route::get('location_edit/{location_id}', [AdminController::class, 'location_edit'])->name('location_edit');
Route::post('location_update/{location_id}', [AdminController::class, 'location_update'])->name('location_update');
Route::delete('/location_delete/{location_id}', [AdminController::class, 'location_delete'])->name('location_delete'); 

Route::get('Donorhome',[DonorController::Class,'Donorhome'])->name('Donorhome');
Route::get('donorregister',[DonorController::Class,'donorregister'])->name('donorregister');    
Route::post('donor_insert', [DonorController::class, 'donor_insert'])->name('donor_insert');
Route::get('donor_view', [DonorController::class, 'donor_view'])->name('donor_list');
Route::get('donor_view', [DonorController::class, 'donor_view'])
    ->name('donor_view');
Route::get('donor_edit/{donor_id}', [DonorController::class, 'donor_edit'])->name('donor_edit');
Route::put('donor_update/{donor_id}', [DonorController::class, 'donor_update'])->name('donor_update');
Route::delete('/donor_delete/{donor_id}', [DonorController::class, 'donor_delete'])->name('donor_delete'); 
Route::get('/donor_pending', [DonorController::class, 'donor_pending'])->name('donor_pending');
Route::get('/admin/donor/view/{donor_id}', [DonorController::class, 'adminView'])->name('admin_donor_view');
Route::put('/donor_accept/{donor_id}', [DonorController::class, 'donor_accept']) ->name('donor_accept');
Route::put('/donor_reject/{donor_id}', [DonorController::class, 'donor_reject'])->name('donor_reject');
Route::middleware('auth')->group(function () {Route::get('/admin/donors', [DonorController::class, 'allDonors'])->name('admin.donors');
Route::get('/admin/donor/view/{donor_id}', [DonorController::class, 'view'])->name('donor_view');});
Route::middleware('auth')->group(function () {

    // Admin: Show all donors
    Route::get('/admin/donors', [DonorController::class, 'allDonors'])
        ->name('admin.donors');

    // Admin: Show one selected donor
    Route::get('/admin/donor/view/{donor_id}', [DonorController::class, 'view'])
        ->name('donor_view');

});
Route::get('/donor_pending', [DonorController::class, 'donor_pending'])->name('donor_pending');

Route::get('/admin/donor/view/{donor_id}', [DonorController::class, 'adminView'])->name('admin_donor_view');


Route::get(
    '/foodregister',
    [DonorController::class, 'foodregister']
)->name('foodregister');

Route::post(
    '/food_insert',
    [DonorController::class, 'food_insert']
)->name('food_insert');

Route::get(
    '/food_view',
    [DonorController::class, 'food_view']
)->name('food_view');

Route::get(
    '/food_edit/{food_id}',
    [DonorController::class, 'food_edit']
)->name('food_edit');

Route::post(
    '/food_update/{food_id}',
    [DonorController::class, 'food_update']
)->name('food_update');

Route::get(
    '/food_delete/{food_id}',
    [DonorController::class, 'food_delete']
)->name('food_delete');



// ================= ADMIN FOOD ROUTES =================

Route::get('/admin/foods', [AdminController::class, 'food_view'])
    ->name('admin.foods');

Route::get('/admin/foods/filter', [AdminController::class, 'food_filter'])
 ->name('admin.foods.filter');

 Route::get('/buyerregister', [BuyerController::class, 'buyerregister'])
    ->name('buyerregister');

Route::post('/buyer_insert', [BuyerController::class, 'buyer_insert'])
    ->name('buyer_insert');
    // ================= ADMIN FOOD =================

Route::get('/admin/foods', [AdminController::class, 'food_view'])
    ->name('admin.foods');

Route::get('/admin/foods/filter', [AdminController::class, 'food_filter'])
    ->name('admin.foods.filter');

Route::put('/admin/food/accept/{food_id}', [AdminController::class, 'food_accept'])
    ->name('admin.food.accept');

Route::put('/admin/food/reject/{food_id}', [AdminController::class, 'food_reject'])
    ->name('admin.food.reject');

    // =====================================================
// LOGGED-IN BUYER PROFILE
// =====================================================

Route::middleware('auth')->group(function () {

    // View own profile
    Route::get('/buyer/profile', [BuyerController::class, 'myProfile'])
        ->name('buyer_profile');

    // Edit own profile
    Route::get('/buyer/profile/edit', [BuyerController::class, 'myProfileEdit'])
        ->name('buyer_profile_edit');

    // Update own profile
    Route::put('/buyer/profile/update', [BuyerController::class, 'myProfileUpdate'])
        ->name('buyer_profile_update');

    // Delete own account
    Route::delete('/buyer/profile/delete', [BuyerController::class, 'myProfileDelete'])
        ->name('buyer_profile_delete');

});

Route::get('/buyer/foods', [BuyerController::class, 'viewFoods'])
    ->name('buyer.foods');

Route::get('/buyer/food/{food_id}', [BuyerController::class, 'foodDetails'])
    ->name('buyer.food.details');
Route::middleware('auth')->group(function () {

    Route::post('/buyer/food/{food_id}/request', [BuyerController::class, 'requestFood'])
        ->name('buyer.food.request');

}); 

Route::middleware('auth')->group(function () {

    // Donor: View food requests
    Route::get(
        '/donor/food-requests',
        [DonorController::class, 'foodRequests']
    )->name('donor.food.requests');


    // Donor: Accept food request
    Route::put(
        '/donor/food-request/{request_id}/accept',
        [DonorController::class, 'acceptFoodRequest']
    )->name('donor.food.request.accept');


    // Donor: Reject food request
    Route::put(
        '/donor/food-request/{request_id}/reject',
        [DonorController::class, 'rejectFoodRequest']
    )->name('donor.food.request.reject');

});
Route::middleware('auth')->group(function () { 
    Route::post( '/buyer/food/{food_id}/request', [BuyerController::class, 'requestFood'] )->name('buyer.food.request'); 
    Route::get( '/buyer/my-food-requests', [BuyerController::class, 'myFoodRequests'] )->name('buyer.my.requests');
    Route::get( '/buyer/payment/{request_id}', [BuyerController::class, 'paymentPage'] )->name('buyer.payment'); 
    Route::post( '/buyer/payment/{request_id}', [BuyerController::class, 'makePayment'] )->name('buyer.payment.process');
});
   

Route::get('/buyer/foods', [BuyerController::class, 'viewFoods']) ->name('buyer.foods');
Route::get('/buyer/food/{food_id}', [BuyerController::class, 'foodDetails']) ->name('buyer.food.details');

Route::get('/buyer/my-food-requests', [BuyerController::class, 'myFoodRequests'])
    ->name('buyer.my.requests');

Route::get('/buyer/payment/{request_id}', [BuyerController::class, 'paymentPage'])
    ->name('buyer.payment');

Route::post('/buyer/payment/{request_id}', [BuyerController::class, 'makePayment'])
    ->name('buyer.payment.process');

Route::get('/buyer/payment/receipt/{payment_id}', 
    [BuyerController::class, 'paymentReceipt'])
    ->name('buyer.payment.receipt');

Route::get('/buyer/payment/receipt/{payment_id}/download', 
    [BuyerController::class, 'downloadReceipt'])
    ->name('buyer.payment.download');

require __DIR__.'/auth.php';