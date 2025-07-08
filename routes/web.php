<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminManageUserController;
use App\Http\Controllers\AuthFrontendController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandSeriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceSupportController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\VlogsController;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Mail;

Route::get('/printer/{brand_slug}', [HomeController::class, 'hp_printer'])->name('printer');
Route::get('/service/{brand_slug}/{service_slug}', [HomeController::class, 'show'])->name('service_detail');

Route::get('/installation', [HomeController::class, 'installation'])->name('installation');

Route::fallback(function () {
    return redirect('/404');
});
Route::get('/404', [HomeController::class, 'notfound'])->name('notfound');
Route::get('/common', [HomeController::class, 'common'])->name('common');

Route::get('/user-register', [AuthFrontendController::class, 'register_frontend'])->name('register_frontend');
Route::post('/register-frontend-store', [AuthFrontendController::class, 'register_frontendStore'])->name('register.frontend.store');
Route::get('/user-login', [AuthFrontendController::class, 'login_frontend'])->name('login_frontend');
Route::post('/login_frontend', [AuthFrontendController::class, 'login_frontend_auth'])->name('login.frontend.auth');
Route::post('/user-logout', [AuthFrontendController::class, 'user_logout'])->name('user.logout');
Route::get('/account', [HomeController::class, 'account'])->name('account');
Route::post('/account-update', [AuthFrontendController::class, 'updateAccount'])->name('update.account');

//order invoice
Route::get('order/invoice/{id}', [OrderController::class, 'downloadInvoice'])->name('order.invoice.download');

//support service printer route
Route::any('/store-PrinterSupportForm', [ServiceSupportController::class, 'storePrinterSupportForm'])->name('store-PrinterSupportForm');
// Route::get('/sitemap.xml', [BlogController::class, 'generateSitemap']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blogs', [HomeController::class, 'blog'])->name('blogs');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/epson-printer-suppport', [HomeController::class, 'epson_business'])->name('epson_business');
Route::get('/canon-printer-support', [HomeController::class, 'epson_service'])->name('epson_service');
// Route::get('/installation', [HomeController::class,'hprinter']);
Route::get('/printers-installation-and-troubleshooting', [HomeController::class, 'installation_printer'])->name('installation_printer');
Route::get('/brother-printer-support', [HomeController::class, 'hpprinter'])->name('hpprinter');
Route::get('/all-printer-services', [HomeController::class, 'services'])->name('services');
Route::get('/support-hp-printer', [HomeController::class, 'supporthpprinter'])->name('supporthpprinter');
Route::get('/hp-printers-support', [HomeController::class, 'testroute'])->name('testroute');
Route::get('/privacy-policy', [HomeController::class, 'privacypolicy'])->name('privacy.policy');
Route::get('/terms-of-service', [HomeController::class, 'termspage'])->name('terms.service');
Route::get('/package/{slug}', [HomeController::class, 'package_detail'])->name('package.detail');
Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');

Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');

Route::get('/virtual-chat', [HomeController::class, 'virtualchat'])->name('virtual_chat');
Route::get('/iframe_index', [HomeController::class, 'iframeindex'])->name('iframe_index');
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::get('/search-suggestions', [HomeController::class, 'suggestions'])->name('search.suggestions');

Route::get('/iframe_new_loader', [HomeController::class, 'iframenewloader'])->name('iframe_new_loader');
Route::get('/iframe_select_wifi_usb', [HomeController::class, 'iframeselectwifiusb'])->name('iframe_select_wifi_usb');
Route::get('/iframe_wifi_setup_loading', [HomeController::class, 'iframewifisetuploading'])->name('iframe_wifi_setup_loading');
Route::get('/iframe_printer_type_usb', [HomeController::class, 'iframeprintertypeusb'])->name('iframe_printer_type_usb');
Route::get('/iframe_fixing', [HomeController::class, 'iframefixing'])->name('iframe_fixing');
Route::get('/iframe_form', [HomeController::class, 'iframeform'])->name('iframe_form');
Route::post('/iframe_send_mail', [HomeController::class, 'iframesendmail'])->name('iframe_send_mail');

Route::post('/get-solution', [HomeController::class, 'getsolution'])->name('get_solution');
Route::get('/error', [HomeController::class, 'errorpage'])->name('error.page');
Route::get('/blogs/{slug}', [BlogController::class, 'blog_details'])->name('blog.blog_details');
Route::get('/blog-search/{term}', [BlogController::class, 'searchTitles'])->name('blog.search');

//members route 23june,25

Route::get('/members', [HomeController::class, 'member'])->name('members');
Route::get('/carts/{id}', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout/{id}', [HomeController::class, 'checkout'])->name('checkout');

Route::get('/video', [HomeController::class, 'video'])->name('video');
Route::get('/vlog/{slug}', [HomeController::class, 'videoDetail'])->name('video_detail');

Route::any('/register', [AdminController::class, 'register'])->name('register');
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');
Route::post('/commonstore', [InquiryController::class, 'commonstore'])->name('commonstore.store');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('/dashboard', [AdminController::class, 'dashboardPage'])->name('dashboard');
    Route::get('/setting', [AdminController::class, 'metaPage'])->name('metaPage');
    Route::post('/settings/update', [AdminController::class, 'updateSetting'])->name('setting.update');
    Route::post('/settings/new-meta', [AdminController::class, 'new_meta_add'])->name('settings.new_meta');
    Route::get('settings/edit-meta/{id}', [AdminController::class, 'editSettingForm'])->name('settings.edit_meta');

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

    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

    //assistance form saving routes
    Route::any('/assistance-index', [ContactController::class, 'AssistanceListing'])->name('assistance-index');
    Route::any('/assistance-show/{id}', [ContactController::class, 'AssistanceShow'])->name('assistance.show');
    Route::any('/assistance-destroy/{id}', [ContactController::class, 'AssistanceDelete'])->name('assistance.destroy');

    Route::any('/support-page', [ServiceSupportController::class, 'supportListing'])->name('support-index');
    Route::get('/support/{id}/edit', [ServiceSupportController::class, 'edit'])->name('support.edit');
    Route::get('support/create', [ServiceSupportController::class, 'create'])->name('support.create');
    Route::post('/support', [ServiceSupportController::class, 'store'])->name('support.store');
    Route::put('/support/{id}', [ServiceSupportController::class, 'update'])->name('support.update');
    Route::delete('/support/{id}', [ServiceSupportController::class, 'destroy'])->name('support.destroy');

    //contact form saving routes

    Route::any('/contactmodal-store', [ContactController::class, 'contactmodalstore'])->name('contactmodal-store');
    Route::any('/contact-index', [ContactController::class, 'ContactListing'])->name('contact-index');
    Route::any('/contact-show/{id}', [ContactController::class, 'ContactShow'])->name('contact.show');
    Route::any('/contact-edit/{id}', [ContactController::class, 'ContactEdit'])->name('contact.edit');
    Route::any('/contact-create', [ContactController::class, 'Contactcreate'])->name('contact.create');
    Route::any('/contact-destroy/{id}', [ContactController::class, 'ContactDelete'])->name('contact.destroy');

    //brand routes
    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
    Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');

    // Brand Series Routes
    Route::get('brand-series', [BrandSeriesController::class, 'index'])->name('brand_series.index');
    Route::get('brand-series/create', [BrandSeriesController::class, 'create'])->name('brand_series.create');
    Route::post('brand-series/store', [BrandSeriesController::class, 'store'])->name('brand_series.store');
    Route::get('brand-series/{id}/edit', [BrandSeriesController::class, 'edit'])->name('brand_series.edit');
    Route::post('brand-series/{id}/update', [BrandSeriesController::class, 'update'])->name('brand_series.update');
    Route::delete('brand-series/{id}/destroy', [BrandSeriesController::class, 'destroy'])->name('brand_series.destroy');

    // Service Routes
    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

    // FAQ Routes
    Route::get('/admin/faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::get('/admin/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('/admin/faqs', [FaqController::class, 'store'])->name('faqs.store');
    Route::get('/admin/faqs/{id}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('/admin/faqs/{id}', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('/admin/faqs/{id}', [FaqController::class, 'destroy'])->name('faqs.destroy');
    Route::get('/get-services/{brand_id}', [FaqController::class, 'getServices']);

    // Vlog Routes
    Route::get('vlog', [VlogsController::class, 'index'])->name('vlog.index');
    Route::get('vlog/create', [VlogsController::class, 'create'])->name('vlog.create');
    Route::post('vlog/store', [VlogsController::class, 'store'])->name('vlog.store');
    Route::get('vlog/edit/{id}', [VlogsController::class, 'edit'])->name('vlog.edit');
    Route::put('vlog/update/{id}', [VlogsController::class, 'update'])->name('vlog.update');
    Route::delete('vlog/delete/{id}', [VlogsController::class, 'delete'])->name('vlog.delete');

    // Package Routes
    Route::get('packages', [PackageController::class, 'index'])->name('packages.index');
    Route::get('packages/create', [PackageController::class, 'create'])->name('packages.create');
    Route::post('packages/store', [PackageController::class, 'store'])->name('packages.store');
    Route::get('packages/edit/{id}', [PackageController::class, 'edit'])->name('packages.edit');
    Route::post('packages/update/{id}', [PackageController::class, 'update'])->name('packages.update');
    Route::post('packages/delete/{id}', [PackageController::class, 'destroy'])->name('packages.delete');

    // user manage
    Route::get('manage-users', [AdminManageUserController::class, 'manage_users'])->name('manage.users');
    Route::get('view-user/{id}', [AdminManageUserController::class, 'view_user'])->name('user.view');
    Route::any('delete-user/{id}', [AdminManageUserController::class, 'delete_user'])->name('user.delete');

    // reviews
    Route::get('reviews', [ReviewController::class, 'reviews_list'])->name('reviews');
    Route::any('reviews.delete/{id}', [ReviewController::class, 'reviews_delete'])->name('reviews.delete');
    Route::post('/reviews/toggle-status/{id}', [ReviewController::class, 'reviewsStatusUpdate'])->name('reviews.toggleStatus');

    //orders
    Route::get('orders', [OrderController::class, 'orders_list'])->name('orders');
    Route::get('order-view/{id}', [OrderController::class, 'order_view'])->name('order.view');

    //Subscribe
        Route::get('Subscribe', [SubscribeController::class, 'index'])->name('subscribe.index');
        Route::any('subscribe-delete/{id}', [SubscribeController::class, 'delete'])->name('subscribe.delete');
});

Route::any('/contact-add', [ContactController::class, 'contactstore'])->name('contact-add');
Route::get('/our-blog-section', [BlogController::class, 'blog_page'])->name('our-blog');
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AdminController::class, 'login'])->name('adminlogin');

//end of contact form saving routes

Route::post('/ckeditor/upload', [BlogController::class, 'uploadimage'])->name('ckeditor.upload');
Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('services.show');


Route::get('/clear-route-cache', function () {
    \Artisan::call('route:clear');
    return "Route cache cleared!";
});
Route::get('/clear-app-cache', function () {
    \Artisan::call('cache:clear');
    return "Application cache cleared!";
});
