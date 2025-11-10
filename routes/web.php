<?php


use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\InquiryController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/clear-route-cache', function () {
    Artisan::call('route:clear');
    return "Route cache cleared!";
});
Route::get('/clear-app-cache', function () {
    Artisan::call('cache:clear');
    return "Application cache cleared!";
});


Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/about-us', [IndexController::class, 'about'])->name('about-us');
Route::get('/blog', [IndexController::class, 'blog'])->name('blog');
Route::get('/blog-detail/{slug}', [IndexController::class, 'blog_detail'])->name('blog-detail');
Route::get('/digital-content-marketing', [IndexController::class, 'digital_content_marketing'])->name('digital-content-marketing');
Route::get('/ecommerce-seo', [IndexController::class, 'ecommerce_seo'])->name('ecommerce-seo');
Route::get('/local-seo', [IndexController::class, 'local_seo'])->name('local-seo');
Route::get('/ppc-services', [IndexController::class, 'ppc_service'])->name('ppc-services');
Route::get('/privacy', [IndexController::class, 'privacy'])->name('privacy');
Route::get('/refund-policy', [IndexController::class, 'refund'])->name('refund');
Route::get('/search-engine-optimization', [IndexController::class, 'search_engine_optimization'])->name('search-engine-optimization');
Route::get('/social-media-marketing', [IndexController::class, 'social_media_marketing'])->name('social-media-marketing');
Route::get('/terms-condition', [IndexController::class, 'terms_condition'])->name('terms-condition');
Route::get('/web-design', [IndexController::class, 'web_design'])->name('web-design');
Route::get('/web-development', [IndexController::class, 'web_development'])->name('web-development');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::post('/subscribe', [IndexController::class, 'subscribe_store'])->name('subscribe');

Route::post('/send-otp', [IndexController::class, 'sendOtpForForm'])->name('send.otpss');
Route::post('/verify-otp', [IndexController::class, 'verifyOtp'])->name('verify.otp');
Route::post('/store-contact', [IndexController::class, 'storeFrom'])->name('store.contact');

//========================Login Or Register With Otp Into One Form=====================//

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AuthController::class, 'login'])->name('adminlogin');
Route::post('/send-otps', [AuthController::class, 'sendOtp'])->name('send.otp');

Route::any('/register', [AuthController::class, 'register'])->name('register');
Route::post('/verify-register', [AuthController::class, 'verifyOtpAndRegister'])->name('verify.register');
Route::post('/verify-login', [AuthController::class, 'verifyOtpAndLogin'])->name('verify.login');

// Forgot Password Routes
Route::post('/forgot-password/send-otp', [AuthController::class, 'sendForgotPasswordOtp'])->name('forgot.password.send.otp');
Route::post('/forgot-password/verify-otp', [AuthController::class, 'verifyForgotPasswordOtp'])->name('forgot.password.verify.otp');
Route::post('/forgot-password/reset', [AuthController::class, 'resetPassword'])->name('forgot.password.reset');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'dashboardPage'])->name('dashboard');
    Route::get('/setting', [AuthController::class, 'metaPage'])->name('metaPage');
    Route::post('/settings/update', [AuthController::class, 'updateSetting'])->name('setting.update');
    Route::post('/settings/new-meta', [AuthController::class, 'new_meta_add'])->name('settings.new_meta');
    Route::get('settings/edit-meta/{id}', [AuthController::class, 'editSettingForm'])->name('settings.edit_meta');

    //new routes of meta 7nov,25
    //Settings pages
    Route::get('/pages-list', [AuthController::class, 'pagesList'])->name('pages.list');
    Route::get('/pages-create', [AuthController::class, 'pagesCreate'])->name('pages.create');
    Route::post('/pages-create-post', [AuthController::class, 'pagesCreatePost'])->name('pages.create.post');
    Route::delete('/pages-destroy/{id}', [AuthController::class, 'pagesDestroy'])->name('pages.destroy');

    //Meta
    Route::get('/meta-list', [AuthController::class, 'metaList'])->name('meta.list');
    Route::get('/meta-create', [AuthController::class, 'metaCreate'])->name('meta.create');
    Route::post('/meta-create-post', [AuthController::class, 'metaCreatePost'])->name('meta.create.post');
    Route::get('/meta-edit/{id}', [AuthController::class, 'metaEdit'])->name('meta.edit');
    Route::post('/meta-edit-post', [AuthController::class, 'metaEditPost'])->name('meta.edit.post');
    Route::delete('/meta-destroy/{id}', [AuthController::class, 'metaDestroy'])->name('meta.destroy');

    //new routes of meta ends


    // Admin Blogs
    Route::get('/blogs', [BlogController::class, 'index'])->name('admin.blog');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

    // Admin Blogs Category
    Route::get('/blog-category', [BlogCategoryController::class, 'index'])->name('blog.category');
    Route::post('/blog-category/store', [BlogCategoryController::class, 'store'])->name('blog-category.store');
    Route::get('/blog-category/edit/{id}', [BlogCategoryController::class, 'edit'])->name('blog-category.edit');
    Route::post('/blog-category/update/{id}', [BlogCategoryController::class, 'update'])->name('blog-category.update');
    Route::delete('/blog-category/destroy/{id}', [BlogCategoryController::class, 'destroy'])->name('blog-category.destroy');

    //Customer inquery
    Route::get('/inquiry-list', [InquiryController::class, 'inquery_list'])->name('inquiry.list');
    Route::get('/inquiry-detail/{id}', [InquiryController::class, 'inquery_show'])->name('inquery.show');
    Route::any('/inquery-destroy/{id}', [InquiryController::class, 'inquery_destroy'])->name('inquery.destroy');

    //bulk-delete
    Route::delete('/customer_inquery-bulk-delete', [AuthController::class, 'customer_inquerybulkDelete'])->name('customer_inquery.bulk-delete');

});

Route::post('/ckeditor/upload', [BlogController::class, 'uploadimage'])->name('ckeditor.upload');


