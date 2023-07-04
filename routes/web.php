<?php

use App\Http\Controllers\Admin\AboutMeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactMessagesController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\MultiImageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PartnerMultiImageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\WorkingProccessController;
use App\Http\Controllers\BlogDetailsController;
use App\Http\Controllers\Frontend\AboutDetailsController;
use App\Http\Controllers\Frontend\BlogDetailsController as FrontendBlogDetailsController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PortfolioDetailsController as FrontendPortfolioDetailsController;
use App\Http\Controllers\Frontend\PortfoliosController;
use App\Http\Controllers\Frontend\ResumeController;
use App\Http\Controllers\Frontend\ServiceDetailsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\rontend\PortfolioDetailsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware('auth', 'verified')->group(function () {

    Route::middleware('isAdmin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::controller(AdminProfileController::class)->group(function() {
            Route::get('/admin/profile', 'index')->name('admin.profile');
            Route::post('/admin/profile/update/{id}','update')->name('admin.profile.update');
            Route::get('/admin/change/password', 'changePassword')->name('admin.change.password');
            Route::post('/admin/update/password', 'updatePassword')->name('admin.update.password');
        });

        Route::controller(MultiImageController::class)->group(function() {
            Route::get('/admin/all/multi/image/', 'index')->name('all.multi.image');
            Route::get('/admin/about/multi/image/', 'create')->name('add.multi.image');
            Route::post('/admin/store/multi/image', 'store')->name('store.multi.image');
            Route::get('/admin/edit/multi/image/{id}', 'edit')->name('edit.multi.image');
            Route::post('/admin/update/multi/image/{id}', 'update')->name('update.multi.image');
            Route::get('/admin/delete/multi/image/{id}', 'destroy')->name('delete.multi.image');
        });

        Route::controller(PortfolioController::class)->group(function() {
            Route::get('/admin/portfolios', 'index')->name('index.portfolios');
            Route::get('/admin/create/portfolios', 'create')->name('create.portfolios');
            Route::post('/admin/store/portfolios', 'store')->name('store.portfolios');
            Route::get('/admin/edit/portfolios/{id}', 'edit')->name('edit.portfolios');
            Route::post('/admin/update/portfolios/{id}', 'update')->name('update.portfolios');
            Route::get('/admin/delete/portfolio/{id}', 'destroy')->name('delete.portfolios');
        });

        Route::controller(BlogCategoryController::class)->group(function() {
            Route::get('/admin/blog/category', 'index')->name('index.category');
            Route::get('/admin/blog/category/create', 'create')->name('create.category');
            Route::post('/admin/blog/category/store', 'store')->name('store.category');
            Route::get('/admin/blog/category/edit/{id}', 'edit')->name('edit.category');
            Route::post('/admin/blog/category/update/{id}', 'update')->name('update.category');
            Route::get('/admin/blog/category/delete/{id}', 'destroy')->name('delete.category');
        });

        Route::controller(ServiceController::class)->group(function() {
            Route::get('/admin/services', 'index')->name('index.service');
            Route::get('/admin/services/create', 'create')->name('create.service');
            Route::post('/admin/services/store', 'store')->name('store.service');
            Route::get('/admin/services/edit/{id}', 'edit')->name('edit.service');
            Route::post('/admin/services/update/{id}', 'update')->name('update.service');
            Route::get('/admin/services/delete/{id}', 'destroy')->name('delete.service');
        });

        Route::controller(WorkingProccessController::class)->group(function() {
            Route::get('/admin/Working-Processes', 'index')->name('index.working.process');
            Route::get('/admin/Working-Processes/create', 'create')->name('create.working.process');
            Route::post('/admin/Working-Processes/store', 'store')->name('store.working.process');
            Route::get('/admin/Working-Processes/edit/{id}', 'edit')->name('edit.working.process');
            Route::post('/admin/Working-Processes/update/{id}', 'update')->name('update.working.process');
            Route::get('/admin/Working-Processes/delete/{id}', 'destroy')->name('delete.working.process');
        });

        Route::controller(BlogController::class)->group(function() {
            Route::get('/admin/blogs', 'index')->name('index.blog');
            Route::get('/admin/blogs/create', 'create')->name('create.blog');
            Route::post('/admin/blogs/store', 'store')->name('store.blog');
            Route::get('/admin/blogs/edit/{id}', 'edit')->name('edit.blog');
            Route::post('/admin/blogs/update/{id}', 'update')->name('update.blog');
            Route::get('/admin/blogs/delete/{id}', 'destroy')->name('delete.blog');
        });

        Route::controller(PartnerMultiImageController::class)->group(function() {
            Route::get('/admin/partner/all/multi/image/', 'index')->name('all.multi.partner.image');
            Route::get('/admin/partners/multi/image/', 'create')->name('add.multi.partner.image');
            Route::post('/admin/partners/store/multi/image', 'store')->name('store.multi.partner.image');
            Route::get('/admin/partners/edit/multi/image/{id}', 'edit')->name('edit.multi.partner.image');
            Route::post('/admin/partners/update/multi/image/{id}', 'update')->name('update.multi.partner.image');
            Route::get('/admin/partners/delete/multi/image/{id}', 'destroy')->name('delete.multi.partner.image');
        });

        Route::controller(MessageController::class)->group(function() {
            Route::get('/admin/messages', 'index')->name('admin.contact.index');
            Route::get('/admin/messages/send_email/{id}', 'send_email')->name('send.email');
            Route::get('/admin/messages/view_details/{id}', 'viewDetails')->name('view.contact.details');
            Route::post('/admin/messages/send_user_email/{id}', 'send_user_email')->name('send.user.email');
            Route::get('/admin/messages/destroy/{id}', 'destroy')->name('admin.contact.destroy');
        });

        Route::controller(SearchController::class)->group(function(){
            Route::get('/admin/search/portfolio', 'searchPortfolio')->name('admin.search.portfolio');
            Route::get('/admin/search/blog', 'searchBlog')->name('admin.search.blog');
            Route::get('/admin/search/service', 'searchService')->name('admin.search.service');
            Route::get('/admin/search/Working-Process', 'searchWorkingProcess')->name('admin.search.working.process');
        });

        Route::controller(PartnerController::class)->group(function() {
            Route::get('/admin/partners', 'index')->name('partner.index');
            Route::post('/admin/partners/{id}', 'update')->name('partner.update');
        });

        Route::controller(FooterController::class)->group(function(){
            Route::get('/admin/footer', 'index')->name('footer.index');
            Route::post('/admin/footer/update/{id}', 'update')->name('footer.update');
        });

        Route::controller(BannerController::class)->group(function(){
            Route::get('/admin/banner', 'index')->name('banner.index');
            Route::post('/admin/banner/update/{id}', 'update')->name('banner.update');
        });

        Route::controller(AboutMeController::class)->group(function(){
            Route::get('/admin/about', 'index')->name('about.index');
            Route::post('/admin/about/update/{id}', 'update')->name('about.update');
        });
    }); // Admin Middleware End

    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile','edit')->name('profile.edit');
        Route::patch('/profile','update')->name('profile.update');
        Route::delete('/profile','destroy')->name('profile.destroy');
    });

    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

    Route::controller(FrontendBlogDetailsController::class)->group(function() {
        Route::get('/blog/details/{id}', 'index')->name('blog.details');
        Route::get('/category/blog/{id}', 'categoryBlogs')->name('blogs.by.category');
        Route::get('/blogs', 'allBlogs')->name('home.blog');
    });

    Route::controller(PortfoliosController::class)->group(function() {
        Route::get('/portfolios', 'index')->name('portfolios.index');
        Route::get('/portfolio/details/{id}', 'portfolioDetails')->name('portfolio.details');
    });

    Route::controller(ContactController::class)->group(function() {
        Route::get('/contact', 'index')->name('contact.index');
        Route::post('/contact/store', 'store')->name('contact.store');
    });

    Route::controller(ServiceDetailsController::class)->group(function() {
        Route::get('/service/details', 'index')->name('services');
        Route::get('/service/details/{id}', 'serviceDetails')->name('service.details');
    });

    Route::get('/about/details', [AboutDetailsController::class, 'index'])->name('about.details');

    Route::get('/download/resume', [ResumeController::class, 'index'])->name('download.resume');

    Route::get('/', function () {
        return view('frontend.index');
    });
});

require __DIR__.'/auth.php';
