<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;

use App\Http\Controllers\Backend\Admin\AdminCargoController;



// OTHER

use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ServiceController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\PagesController;

use App\Http\Controllers\Backend\InformationController;

use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\FeatureController;

use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\TestimonialController;

use App\Models\Slider;

use App\Models\User;

// USER ACCOUNT
use App\Http\Controllers\Backend\Account\UserAccountController;
use App\Http\Controllers\Backend\Account\UserCargoController;
use App\Http\Controllers\Backend\Account\UserIncomeExpenceController;


// use Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    // return view('dashboard');  this is the default jetstream dashboard
    // return view('admin.index');
    return view('dashboard.admin.index');
})->name('dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    // $id = Auth::user()->id;
    // $user = User::find(Auth::user()->id);
    // return view('dashboard', compact('user'));
    // return view('dashboard.useraccount.index', compact('user'));
    $user = User::find(Auth::user()->id);
    return view('dashboard.index', compact('user'));
// })->name('dashboard')->middleware('auth:admin');
})->name('udashboard');


// TO PREVENT ADMIN ACESS WITH MIDLEWARE
// Route::middleware(['auth:admin'])->group(function(){

    // ADMIN ROUTES
    Route::get('admin/logout',[AdminController::class, 'destroy'])->name('admin.logout'); // use the destroy method from App\Http\Controllers\AdminController;

    Route::get('admin/profile',[AdminProfileController::class, 'viewAdminProfile'])->name('admin.profile'); 
    Route::get('admin/edit_profile',[AdminProfileController::class, 'editAdminProfile'])->name('admin.edit_profile'); 
    Route::post('admin/edit_profile_store_update',[AdminProfileController::class, 'storeAdminProfileUpdate'])->name('admin.profile.store_update');
    Route::get('admin/change_password',[AdminProfileController::class, 'adminChangePassword'])->name('admin.change_password'); 
    Route::post('admin/store_password_update',[AdminProfileController::class, 'adminUpdatePassword'])->name('admin.store_password_update');

    Route::prefix('admin')->group(function(){

        // CARGO - CARGO TYPE
        Route::get('/cargo/cargotype/manage', [AdminCargoController::class, 'manageCargoTypes'])->name('admin-manage-cargo-types');
        Route::get('/cargo/cargotype/loadform/{action}/{val}', [AdminCargoController::class, 'loadForm']);
        Route::get('/cargo/cargotype/edit/{val}', [AdminCargoController::class, 'editCategoryType']);
        Route::post('/cargo/cargotype/store',[AdminCargoController::class, 'storeCategoryType'])->name('store_new_cargo_type');
        Route::post('/cargo/cargotype/store-or-update',[AdminCargoController::class, 'storeOrUpdateCategoryType']);
        Route::get('/cargo/cargotype/delete/{id}', [AdminCargoController::class, 'deleteCategoryType'])->name('delete_cargo_type');

        // NEW 
        Route::get('/cargo/cargotype/add', [AdminCargoController::class, 'addNewCargoType'])->name('admin-add-cargo-type');
        Route::post('/cargo/cargotype/store',[AdminCargoController::class, 'storeCategoryType'])->name('admin-store-cargo-type');

        // CARGO - SHIPMENT TRANSACTIONS
        Route::get('/cargo/shipment-transction/view-list', [AdminCargoController::class, 'viewShipmentList'])->name('admin-view-shipment-list');
        Route::get('/cargo/shipment-transction/add-new/{id}', [AdminCargoController::class, 'addNewShipment'])->name('add-new-shipment');
        Route::post('/cargo/shipment-transction/store-new', [AdminCargoController::class, 'storeNewShipment'])->name('store-new-shipment');

        Route::get('/cargo/shipment-transction/edit/{id}', [AdminCargoController::class, 'editShipment'])->name('edit-shipment');
        Route::post('/cargo/shipment-transction/store-update', [AdminCargoController::class, 'storeShipmentUpdate'])->name('store-shipment-update');

        // Route::post('/cargo/shipment-transction/edit/{id}', [AdminCargoController::class, 'storeNewShipment'])->name('edit-shipment');
        Route::get('/cargo/shipment-transction/delete/{cargo_id}', [AdminCargoController::class, 'deleteShipment'])->name('delete-shipment');
         
        Route::get('/cargo/shipment-transction/view-details/{id}/{ref_code}', [AdminCargoController::class, 'viewShipmentDetails'])->name('view-transaction-details');
        Route::get('/cargo/shipment-transction/change-status/{id}/{val}', [AdminCargoController::class, 'updateShipmentStatus'])->name('change-shipment-status');
        Route::get('/cargo/shipment-transction/print-shipment/{id}/{code}', [AdminCargoController::class, 'printShipmentPdf'])->name('print-shipment');
        Route::get('/cargo/shipment-transction/download-shipment/{id}/{code}', [AdminCargoController::class, 'downloadShipmentPdf'])->name('download-shipment');
        
        
        // BRAND
        Route::get('/brand/view', [BrandController::class, 'viewBrand'])->name('view_all_brand');
        Route::post('/brand/store_brand',[BrandController::class, 'storeBrand'])->name('store.new_brand');
        Route::get('/brand/edit/{id}', [BrandController::class, 'editBrand'])->name('brand.edit');
        Route::post('/brand/store_brand_update',[BrandController::class, 'storeBrandUpdate'])->name('store.brand_update');
        Route::get('/brand/delete/{id}', [BrandController::class, 'deleteBrand'])->name('brand.delete');
    
        // CATEGORY
        Route::get('/category/view', [CategoryController::class, 'viewCategory'])->name('view_all_category');
        Route::post('/category/store_category',[CategoryController::class, 'storeCategory'])->name('store.new_category');
        Route::get('/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
        Route::post('/category/store_category_update/{id}',[CategoryController::class, 'storeCategoryUpdate'])->name('store.category_update');
        Route::get('/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
    
        // SUB CATEGORY
        Route::get('/subcategory/view', [SubCategoryController::class, 'viewSubCategory'])->name('view_all_subcategory');
        Route::post('/subcategory/store_subcategory',[SubCategoryController::class, 'storeSubCategory'])->name('store.new_subcategory');
        Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'editSubCategory'])->name('subcategory.edit');
        Route::post('/subcategory/store_category_update',[SubCategoryController::class, 'storeSubCategoryUpdate'])->name('store.subcategory_update');
        Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('subcategory.delete');
    
        // SUB SUB CATEGORY
        Route::get('/sub/subcategory/view', [SubCategoryController::class, 'viewSubSubCategory'])->name('view_all_subsubcategory');
        Route::post('/sub/subcategory/store_subcategory',[SubCategoryController::class, 'storeSubSubCategory'])->name('store.new_subsubcategory');
        Route::get('/sub/subcategory/edit/{id}', [SubCategoryController::class, 'editSubSubCategory'])->name('subsubcategory.edit');
        Route::post('/sub/subcategory/store_category_update',[SubCategoryController::class, 'storeSubSubCategoryUpdate'])->name('store.subsubcategory_update');
        Route::get('/sub/subcategory/delete/{id}', [SubCategoryController::class, 'deleteSubSubCategory'])->name('subsubcategory.delete');
        
        Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'getSubCategory']); // No name if needed to be reached using url 
        Route::get('/sub/subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'getSubSubCategory']);
    
        Route::get('/product/add', [ProductController::class, 'addProduct'])->name('add_product');
        Route::post('/product/store_product',[ProductController::class, 'storeProduct'])->name('store.new_product');
        Route::get('/product/manage_product', [ProductController::class, 'manageProduct'])->name('manage_product');
        
        Route::get('/product/edit/{id}', [ProductController::class, 'editProduct'])->name('product.edit');
        Route::post('/product/store_product_update',[ProductController::class, 'storeProductUpdate'])->name('store.product_update');
        Route::get('/product/copy/{id}', [ProductController::class, 'copyProduct'])->name('product.copy');
        
        Route::post('/product/thambnail_image_update',[ProductController::class, 'productThambnailImageUpdate'])->name('update.product_thambnailImage');
        Route::post('/product/multi_image_update',[ProductController::class, 'updateMultiImage'])->name('update.product_multi_images');
        Route::post('/product/multi_image_update_store',[ProductController::class, 'updateStoreMultiImage'])->name('update.store.product_multi_images');
        
        Route::get('/product/multi_image_delete/{id}',[ProductController::class, 'multiImageDelete'])->name('product.multiimg.delete');
        
        Route::get('/product/inactive/{id}', [ProductController::class, 'productInactive'])->name('product.inactive');
        Route::get('/product/active/{id}', [ProductController::class, 'productActive'])->name('product.active');
        
        Route::get('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');
    
        // FRONTEND 
        Route::get('/slider/view', [SliderController::class, 'sliderView'])->name('manage-slider');
        Route::post('/slider/store', [SliderController::class, 'sliderStore'])->name('slider.store');
        Route::get('/slider/edit/{id}', [SliderController::class, 'sliderEdit'])->name('slider.edit');
        Route::post('/slider/update', [SliderController::class, 'sliderUpdate'])->name('slider.update');
    
        Route::get('/slider/inactive/{id}', [SliderController::class, 'sliderInactive'])->name('slider.inactive');
        Route::get('/slider/active/{id}', [SliderController::class, 'sliderActive'])->name('slider.active');
        
        Route::get('/slider/delete/{id}', [SliderController::class, 'sliderDelete'])->name('slider.delete');
    
        // ABOUT 
        Route::get('/about/view', [AboutController::class, 'viewAbout'])->name('view_about');
        Route::post('/about/store_about',[AboutController::class, 'storeAbout'])->name('store.about');
        Route::get('/about/edit/{id}', [AboutController::class, 'editAbout'])->name('about.edit');
        Route::post('/about/store_brand_update',[AboutController::class, 'storeAboutUpdate'])->name('store.about_update');
    
        // SERVICES
        Route::get('/services/view', [ServiceController::class, 'viewService'])->name('view_all_service');
        Route::post('/services/store_service',[ServiceController::class, 'storeService'])->name('store.new_service');
        Route::get('/services/edit/{id}', [ServiceController::class, 'editService'])->name('service.edit');
        Route::post('/services/store_service_update/{id}',[ServiceController::class, 'storeServiceUpdate'])->name('store.service_update');
        Route::get('/services/delete/{id}', [ServiceController::class, 'deleteService'])->name('service.delete');
    
        // CONTACT
        Route::get('/contact/view', [ContactController::class, 'viewContact'])->name('view_contact');
        Route::post('/contact/store_contact',[ContactController::class, 'storeContact'])->name('store.contact');
        Route::get('/contact/edit/{id}', [ContactController::class, 'editContact'])->name('contact.edit');
        Route::post('/contact/store_contact_update/{id}',[ContactController::class, 'storeContactUpdate'])->name('store.contact_update');
        Route::get('/contact/delete/{id}', [ContactController::class, 'deleteContact'])->name('contact.delete');
    
        // COUPON
        // Route::get('/view', [CouponController::class, 'couponView'])->name('manage-coupon');
        Route::post('/coupn/store', [CouponController::class, 'couponStore'])->name('coupon.store');
        Route::get('/coupn/edit/{id}', [CouponController::class, 'couponEdit'])->name('coupon.edit');
        Route::post('/coupn/update/{id}', [CouponController::class, 'couponUpdate'])->name('coupon.update');
        Route::get('/coupn/delete/{id}', [CouponController::class, 'couponDelete'])->name('coupon.delete');
    
        // SHIPPING
        Route::get('/shipping/division/view', [ShippingAreaController::class, 'divisionView'])->name('manage-division');
        Route::post('/shipping/division/store', [ShippingAreaController::class, 'divisionStore'])->name('division.store');
        Route::get('/shipping/edit/{id}', [ShippingAreaController::class, 'divisionEdit'])->name('division.edit');
        Route::post('/shipping/update/{id}', [ShippingAreaController::class, 'divisionUpdate'])->name('division.update');
        Route::get('/shipping/delete/{id}', [ShippingAreaController::class, 'divisionDelete'])->name('division.delete');
    
        // Ship District 
        Route::get('/shipping/district/view', [ShippingAreaController::class, 'districtView'])->name('manage-district');
        Route::post('/shipping/district/store', [ShippingAreaController::class, 'districtStore'])->name('district.store');
        Route::get('/shipping/district/edit/{id}', [ShippingAreaController::class, 'districtEdit'])->name('district.edit');
        Route::post('/shipping/district/update/{id}', [ShippingAreaController::class, 'districtUpdate'])->name('district.update');
        Route::get('/shipping/district/delete/{id}', [ShippingAreaController::class, 'districtDelete'])->name('district.delete');
    
        // Ship State 
        Route::get('/shipping/state/view', [ShippingAreaController::class, 'stateView'])->name('manage-state');
        Route::post('/shipping/state/store', [ShippingAreaController::class, 'stateStore'])->name('state.store');
        Route::get('/shipping/state/edit/{id}', [ShippingAreaController::class, 'stateEdit'])->name('state.edit');
        Route::post('/shipping/state/update/{id}', [ShippingAreaController::class, 'stateUpdate'])->name('state.update');
        Route::get('/shipping/state/delete/{id}', [ShippingAreaController::class, 'stateDelete'])->name('state.delete');
    });

    // 

    Route::prefix('users')->group(function(){
        // Accounts
        // Route::get('account/manage-accounts',[UserModuleController::class, 'manageUsers'])->name('user-manage-users');
        // Route::get('account/create-user',[UserModuleController::class, 'createUser'])->name('user-create-user');
        // Route::post('account/user-store',[UserModuleController::class, 'storeNewUser'])->name('user.store_new_user');
    
        // Route::get('account/user-edit/{id}',[UserModuleController::class, 'editUsers'])->name('user-edit-user');
        // Route::post('account/user-update-store',[UserModuleController::class, 'storeUpdate'])->name('user.store_user_update');
        // Route::get('account/edit',[UserModuleController::class, 'editUsers'])->name('edit-account');
    
        // ACOUNT PROFILE
        Route::get('/account/logout',[UserAccountController::class, 'userLogout'])->name('user.logout');
        Route::get('/account/profile',[UserAccountController::class, 'userProfile'])->name('user.profile');
        Route::get('account/profile/edit/{id}',[UserAccountController::class, 'editUserProfile'])->name('user.edit_profile'); 
        Route::post('account/profile_store_update',[UserAccountController::class, 'storeUserProfileUpdate'])->name('user.profile.store.update');
        Route::get('/account/password/change',[UserAccountController::class, 'userChangePassword'])->name('user.change_password');
        Route::post('account/password/update/store',[UserAccountController::class, 'userUpdatePassword'])->name('user.store_password_update');

        // CARGO - CARGO TYPE
        Route::get('/cargo/cargotype/manage', [UserCargoController::class, 'manageCargoTypes'])->name('user-manage-cargo-types');
        Route::get('/cargo/cargotype/loadform/{action}/{val}', [UserCargoController::class, 'loadForm']);
        Route::get('/cargo/cargotype/edit/{val}', [UserCargoController::class, 'editCategoryType']);
        Route::post('/cargo/cargotype/store',[UserCargoController::class, 'storeCategoryType'])->name('user_store_new_cargo_type');
        Route::post('/cargo/cargotype/store-or-update',[UserCargoController::class, 'storeOrUpdateCategoryType']);
        Route::get('/cargo/cargotype/delete/{id}', [UserCargoController::class, 'deleteCategoryType'])->name('user_delete_cargo_type');

        // NEW 
        Route::get('/cargo/cargotype/add', [UserCargoController::class, 'addNewCargoType'])->name('user-add-cargo-type');
        Route::post('/cargo/cargotype/store',[UserCargoController::class, 'storeCategoryType'])->name('user-store-cargo-type');
        Route::get('/cargo/cargotype/edit/{id}', [UserCargoController::class, 'editCargoType'])->name('user-edit-cargo-type');
        Route::post('/cargo/cargotype/store-update',[UserCargoController::class, 'storeCategoryTypeUpdate'])->name('user-store-cargo-type-update');
        Route::get('/cargo/cargotype/delete/{id}',[UserCargoController::class, 'deleteCategoryType'])->name('user-delete-cargo-type');
        
        
        // CARGO - SHIPMENT TRANSACTIONS
        Route::get('/cargo/shipment-transction/view-list', [UserCargoController::class, 'viewShipmentList'])->name('user-view-shipment-list');
        Route::get('/cargo/shipment-transction/add-new/{id}', [UserCargoController::class, 'addNewShipment'])->name('user-add-new-shipment');
        Route::post('/cargo/shipment-transction/store-new', [UserCargoController::class, 'storeNewShipment'])->name('user-store-new-shipment');

        Route::get('/cargo/shipment-transction/edit/{id}', [UserCargoController::class, 'editShipment'])->name('user-edit-shipment');
        Route::post('/cargo/shipment-transction/store-update', [UserCargoController::class, 'storeShipmentUpdate'])->name('user-store-shipment-update');

        // Route::post('/cargo/shipment-transction/edit/{id}', [UserCargoController::class, 'storeNewShipment'])->name('edit-shipment');
        Route::get('/cargo/shipment-transction/delete/{cargo_id}', [UserCargoController::class, 'deleteShipment'])->name('user-delete-shipment');
         
        Route::get('/cargo/shipment-transction/view-details/{id}/{ref_code}', [UserCargoController::class, 'viewShipmentDetails'])->name('user-view-transaction-details');
        Route::get('/cargo/shipment-transction/change-status/{id}/{val}', [UserCargoController::class, 'updateShipmentStatus'])->name('user-change-shipment-status');
        Route::get('/cargo/shipment-transction/print-shipment/{id}/{code}', [UserCargoController::class, 'printShipmentPdf'])->name('user-print-shipment');
        Route::get('/cargo/shipment-transction/download-shipment/{id}/{code}', [UserCargoController::class, 'downloadShipmentPdf'])->name('user-download-shipment');
        
        //INCOME EXPENCE
        Route::get('/income-expence/manage', [UserIncomeExpenceController::class, 'manage_all'])->name('user-manage-income-expences');
        Route::get('/income-expence/add', [UserIncomeExpenceController::class, 'addNewOperation'])->name('user-add-income-expence');
        Route::post('/income-expence/store',[UserIncomeExpenceController::class, 'storeIncomeOrExpence'])->name('user-store-income-expence');
        Route::get('/income-expence/edit/{id}', [UserIncomeExpenceController::class, 'ediIncomeExpence'])->name('user-edit-income-expence');
        Route::post('/income-expence/store-update',[UserIncomeExpenceController::class, 'storeIncomeOrExpenceUpdate'])->name('user-store-income-expence-update');
        Route::get('/income-expence/delete/{id}',[UserIncomeExpenceController::class, 'deleteIncomeOrExpence'])->name('user-delete-income-expence');


        
        // SUPPLIER
        // Route::get('supplier-info/view/{id}',[SupplierCommonController::class, 'viewUserSupplierInfo'])->name('user.view_supplier_info');
        // Route::get('suppliers/manage',[SupplierCommonController::class, 'manageViewSuppliers'])->name('user-manage-view-suppliers');
        // Route::get('supplier/view/{id}',[SupplierCommonController::class, 'viewSupplier'])->name('user.view_supplier');
        // Route::get('supplier/edit/{id}',[SupplierCommonController::class, 'editSupplier'])->name('user.edit_supplierForm');
        // Route::post('supplier/update/store/{id}',[SupplierCommonController::class, 'storeSupplierUpdate'])->name('user.store_supplier_update_form');
        // Route::get('supplier/mail-editor/{id}',[SupplierCommonController::class, 'mailEditor'])->name('user.tosupplier_mail_editor');
        // Route::post('supplier/send-mail-to-supplier',[SupplierCommonController::class, 'sendMailToSupplier'])->name('user.send-mail-to-supplier');
        
        // Route::get('supplier/create-user/{supplierform}',[UserModuleController::class, 'createUserFromSupplier'])->name('user.create_user_from_supplier');
        // Route::post('supplier/user/store',[UserModuleController::class, 'storeNewSupplierUser'])->name('user.store_supplier_user');
    
    
        // DOCUMETS
        // Route::get('documents/manage',[DocumentsController::class, 'manageDocuments'])->name('user.manage_documents');
        // Route::get('documents/view',[DocumentsController::class, 'viewDocuments'])->name('user.view_documents');
        // Route::post('documents/store',[DocumentsController::class, 'storeNewdocuments'])->name('user.store_new_document');
    
        // TEKLIFER 
        // Route::get('offers/manage-all',[OffersController::class, 'viewAllOffers'])->name('user-manage-all-offers');
        // Route::get('offers/user-offers',[OffersController::class, 'viewUserOffers'])->name('user-manage-user-offers');
        // Route::get('offers/new',[OffersController::class, 'createNewOffer'])->name('user-create-new-offer');
        // Route::post('offers/store',[OffersController::class, 'storeNewOffer'])->name('user.store_new_offer');
        // Route::get('offers/view/{id}',[OffersController::class, 'viewOffer'])->name('user.view_offer');
        // Route::get('offers/edit/{id}',[OffersController::class, 'editOffer'])->name('user.edit_offer');
        // Route::post('offers/update/store',[OffersController::class, 'storeOfferUpdate'])->name('user.store_offer_update');
        // Route::get('offers/delete',[OffersController::class, 'deleteOffer'])->name('user.delete_offer');
    
        // TEKLIFER
        // Route::get('sample-test/manage-all',[SamplesTestsController::class, 'viewAllSamples'])->name('user.manage-all-sample-tests');
        // Route::get('sample-test/user-sample-tests',[SamplesTestsController::class, 'viewUserSampleTest'])->name('user.manage-user-sample-test');
        // Route::get('sample-test/new',[SamplesTestsController::class, 'createNewSampleTestForm'])->name('user.create-new-sample-test');
        // Route::post('sample-test/store',[SamplesTestsController::class, 'storeSampleTestForm'])->name('user.store_sample_test');
        // Route::get('sample-test/view/{id}',[SamplesTestsController::class, 'viewstoreSample'])->name('user.view_sample');
        // Route::get('sample-test/edit/{id}',[SamplesTestsController::class, 'editSampleTestForm'])->name('user.edit_sample');
        // Route::post('sample-test/update/store',[SamplesTestsController::class, 'storeSampleTestFormUpdate'])->name('user.store_update_sample');
        // Route::get('sample-test/delete',[SamplesTestsController::class, 'deleteSampleTestForm'])->name('user.delete_sample');
    });



    // User Frontend Routes
    Route::get('/',[IndexController::class, 'index']); // use the destroy method from App\Http\Controllers\AdminController;
    // Route::get('/user/logout',[IndexController::class, 'userLogout'])->name('user.logout');
    // Route::get('/user/profile',[IndexController::class, 'userProfile'])->name('user.profile');
    // Route::post('user/profile_store_update',[IndexController::class, 'storeUserProfileUpdate'])->name('user.profile.store.update');
    // Route::get('/user/change_password',[IndexController::class, 'userChangePassword'])->name('user.change.password');
    // Route::post('user/store_password_update',[IndexController::class, 'userUpdatePassword'])->name('user.store_password_update');

    // ADMIN Feature Routes
    // Route::prefix('feature')->group(function(){
    //     Route::get('/view', [FeatureController::class, 'viewFeature'])->name('view_all_feature');
    //     Route::post('/store_feature',[FeatureController::class, 'storeFeature'])->name('store.new_feature');
    //     Route::get('/edit/{id}', [FeatureController::class, 'editFeature'])->name('feature.edit');
    //     Route::post('/store_feature_update/{id}',[FeatureController::class, 'storeFeatureUpdate'])->name('store.feature_update');
    //     Route::get('/delete/{id}', [FeatureController::class, 'deleteFeature'])->name('feature.delete');
    // });

    // ADMIN Service Routes
    // Route::prefix('service')->group(function(){
    //     Route::get('/view', [ServiceController::class, 'viewService'])->name('view_all_service');
    //     Route::post('/store_service',[ServiceController::class, 'storeService'])->name('store.new_service');
    //     Route::get('/edit/{id}', [ServiceController::class, 'editService'])->name('service.edit');
    //     Route::post('/store_service_update/{id}',[ServiceController::class, 'storeServiceUpdate'])->name('store.service_update');
    //     Route::get('/delete/{id}', [ServiceController::class, 'deleteService'])->name('service.delete');
    // });

    // ADMIN Contact Routes
    // Route::prefix('contact')->group(function(){
    //     Route::get('/view', [ContactController::class, 'viewContact'])->name('view_contact');
    //     Route::post('/store_contact',[ContactController::class, 'storeContact'])->name('store.contact');
    //     Route::get('/edit/{id}', [ContactController::class, 'editContact'])->name('contact.edit');
    //     Route::post('/store_contact_update/{id}',[ContactController::class, 'storeContactUpdate'])->name('store.contact_update');
    //     Route::get('/delete/{id}', [ContactController::class, 'deleteContact'])->name('contact.delete');
    // });

    // ADMIN About Routes
    // Route::prefix('about')->group(function(){
    //     Route::get('/view', [AboutController::class, 'viewAbout'])->name('view_about');
    //     Route::post('/store_about',[AboutController::class, 'storeAbout'])->name('store.about');
    //     Route::get('/edit/{id}', [AboutController::class, 'editAbout'])->name('about.edit');
    //     Route::post('/store_brand_update',[AboutController::class, 'storeAboutUpdate'])->name('store.about_update');
    // });

    // ADMIN News Routes
    // Route::prefix('information')->group(function(){
    //     Route::get('/add', [InformationController::class, 'addInformation'])->name('add_information');
    //     Route::post('/store_information',[InformationController::class, 'storeInformation'])->name('store.new_information');
    //     Route::get('/manage_information', [InformationController::class, 'manageInformation'])->name('manage_information');
        
    //     Route::get('/edit/{id}', [InformationController::class, 'editInformation'])->name('information.edit');
    //     Route::post('/store_information_update',[InformationController::class, 'storeInformationUpdate'])->name('store.information_update');
    //     Route::post('/thambnail_image_update',[InformationController::class, 'infrmationThambnailImageUpdate'])->name('update.information_thambnailImage');
        
        
    //     Route::get('/inactive/{id}', [InformationController::class, 'informationInactive'])->name('information.inactive');
    //     Route::get('/active/{id}', [InformationController::class, 'informationActive'])->name('information.active');
        
    //     Route::get('/delete/{id}', [InformationController::class, 'deleteInformation'])->name('information.delete');
    // });


    // ADMIN Project Routes
    // Route::prefix('project')->group(function(){
    //     Route::get('/add', [ProjectController::class, 'addProject'])->name('add_project');
    //     Route::post('/store_project',[ProjectController::class, 'storeProject'])->name('store.new_project');
    //     Route::get('/manage_project', [ProjectController::class, 'manageProject'])->name('manage_project');
        
    //     Route::get('/edit/{id}', [ProjectController::class, 'editProject'])->name('project.edit');
    //     Route::post('/store_project_update',[ProjectController::class, 'storeProjectUpdate'])->name('store.project_update');
    //     Route::post('/thambnail_image_update',[ProjectController::class, 'projectThambnailImageUpdate'])->name('update.project_thambnailImage');
    //     Route::post('/multi_image_update',[ProjectController::class, 'updateMultiImage'])->name('update.project_multi_images');
    //     Route::get('/multi_image_delete/{id}',[ProjectController::class, 'multiImageDelete'])->name('project.multiimg.delete');
        
    //     Route::get('/inactive/{id}', [ProjectController::class, 'projectInactive'])->name('project.inactive');
    //     Route::get('/active/{id}', [ProjectController::class, 'projectActive'])->name('project.active');
        
    //     Route::get('/delete/{id}', [ProjectController::class, 'deleteProject'])->name('project.delete');
    // });

    // Route::prefix('slider')->group(function(){
    //     Route::get('/view', [SliderController::class, 'sliderView'])->name('manage-slider');
    //     Route::post('/store', [SliderController::class, 'sliderStore'])->name('slider.store');
    //     Route::get('/edit/{id}', [SliderController::class, 'sliderEdit'])->name('slider.edit');
    //     Route::post('/update', [SliderController::class, 'sliderUpdate'])->name('slider.update');

    //     Route::get('/inactive/{id}', [SliderController::class, 'sliderInactive'])->name('slider.inactive');
    //     Route::get('/active/{id}', [SliderController::class, 'sliderActive'])->name('slider.active');
        
    //     Route::get('/delete/{id}', [SliderController::class, 'sliderDelete'])->name('slider.delete');
    // });

    // ADMIN Team Routes
    // Route::prefix('team')->group(function(){
    //     Route::get('/view', [TeamController::class, 'viewTeam'])->name('view_all_team');
    //     Route::post('/store_team',[TeamController::class, 'storeTeam'])->name('store.new_team');
    //     Route::get('/edit/{id}', [TeamController::class, 'editTeam'])->name('team.edit');
    //     Route::post('/store_team_update/{id}',[TeamController::class, 'storeTeamUpdate'])->name('store.team_update');
    //     Route::get('/delete/{id}', [TeamController::class, 'deleteTeam'])->name('team.delete');
    // });

    // TESTIMONIALS    
    // Route::prefix('testimonial')->group(function(){
    //     Route::get('/view', [TestimonialController::class, 'viewTestimonials'])->name('view_testimonials');
    //     Route::post('/store_testimonial',[TestimonialController::class, 'storeTestimonial'])->name('store.new_testimonial');
    //     Route::get('/edit/{id}', [TestimonialController::class, 'editTestimonial'])->name('testimonial.edit');
    //     Route::post('/store_testimonial_update/{id}',[TestimonialController::class, 'storeTestimonialUpdate'])->name('store.testimonial_update');
    //     Route::get('/inactive/{id}', [TestimonialController::class, 'testimonialInactive'])->name('testimonial.inactive');
    //     Route::get('/active/{id}', [TestimonialController::class, 'testimonialActive'])->name('testimonial.active');
        
    //     Route::get('/delete/{id}', [TestimonialController::class, 'deleteTestimonial'])->name('testimonial.delete');
    // });

// });  // end Middleware admin

 
//// Frontend All Routes /////
/// Multi Language All Routes ////

Route::get('/language/french', [LanguageController::class, 'french'])->name('french.language');
Route::get('/language/english', [LanguageController::class, 'english'])->name('english.language');


// ABOUT - CONTACT - REFERENCES
Route::get('/about', [PagesController::class, 'aboutPage'])->name('about_page'); 
// Route::get('/about', [PagesController::class, 'servicesPage'])->name('services_page'); 



Route::get('/contact-us', [PagesController::class, 'contactPage'])->name('contact_us'); 
Route::POST('/send-contact-message', [ContactController::class, 'sendRequestMessage'])->name('send-contact-message');

Route::get('/services', [PagesController::class, 'servicePage'])->name('services_page'); 

Route::get('/references', [PagesController::class, 'referencesPage'])->name('references'); 


// Frontend Product Details Page url 
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'productDetails']); 
//Category based products
Route::get('/category/products/{cat_id}/{slug}', [IndexController::class, 'catWiseProducts'])->name('catbasedproducts');
// Frontend SubCategory wise Data
Route::get('/subcategory/products/{subcat_id}/{slug}', [IndexController::class, 'subCatWiseProduct'])->name('subcatbasedproducts');
// Frontend Sub-SubCategory wise Data
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'subSubCatWiseProduct']);






Route::get('/projects',[IndexController::class, 'projects'])->name('projects');
Route::get('/team-members',[IndexController::class, 'projects'])->name('team_member');


// Information 
Route::get('/information',[IndexController::class, 'informationPage'])->name('information');
Route::get('/information-details/{id}/{title}',[IndexController::class, 'informationDetails'])->name('information_details');

// SEND EMAIL FORM
Route::POST('/send-email', [ContactController::class, 'sendEmail'])->name('send.mail');

Route::POST('/send-appointment', [ContactController::class, 'sendAppointment'])->name('send.appointment');







