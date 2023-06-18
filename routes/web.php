<?php

use App\Http\Controllers\Admin\AboutMeController;
use App\Http\Controllers\Admin\AdminController;
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

Route::get('/blog/details/{id}', [FrontendBlogDetailsController::class, 'index'])->name('blog.details');
Route::get('/category/blog/{id}', [FrontendBlogDetailsController::class, 'categoryBlogs'])->name('blogs.by.category');
Route::get('/blogs', [FrontendBlogDetailsController::class, 'allBlogs'])->name('home.blog');

Route::get('/portfolios', [PortfoliosController::class, 'index'])->name('portfolios.index');
Route::get('/portfolio/details/{id}', [PortfoliosController::class, 'portfolioDetails'])->name('portfolio.details');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about/details', [AboutDetailsController::class, 'index'])->name('about.details');

Route::get('/service/details', [ServiceDetailsController::class, 'index'])->name('services');
Route::get('/service/details/{id}', [ServiceDetailsController::class, 'serviceDetails'])->name('service.details');

Route::get('/download/resume', [ResumeController::class, 'index'])->name('download.resume');

Route::get('/', function () {
    return view('frontend.index');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

    Route::middleware('isAdmin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('/admin/all/multi/image/', [MultiImageController::class, 'index'])->name('all.multi.image');
        Route::get('/admin/about/multi/image/', [MultiImageController::class, 'create'])->name('add.multi.image');
        Route::post('/admin/store/multi/image', [MultiImageController::class, 'store'])->name('store.multi.image');
        Route::get('/admin/edit/multi/image/{id}', [MultiImageController::class, 'edit'])->name('edit.multi.image');
        Route::post('/admin/update/multi/image/{id}', [MultiImageController::class, 'update'])->name('update.multi.image');
        Route::get('/admin/delete/multi/image/{id}', [MultiImageController::class, 'destroy'])->name('delete.multi.image');

        Route::get('/admin/portfolios', [PortfolioController::class, 'index'])->name('index.portfolios');
        Route::get('/admin/create/portfolios', [PortfolioController::class, 'create'])->name('create.portfolios');
        Route::post('/admin/store/portfolios', [PortfolioController::class, 'store'])->name('store.portfolios');
        Route::get('/admin/edit/portfolios/{id}', [PortfolioController::class, 'edit'])->name('edit.portfolios');
        Route::post('/admin/update/portfolios/{id}', [PortfolioController::class, 'update'])->name('update.portfolios');
        Route::get('/admin/delete/portfolio/{id}', [PortfolioController::class, 'destroy'])->name('delete.portfolios');
        Route::get('/admin/search/portfolio', [SearchController::class, 'searchPortfolio'])->name('admin.search.portfolio');

        Route::get('/admin/blog/category', [BlogCategoryController::class, 'index'])->name('index.category');
        Route::get('/admin/blog/category/create', [BlogCategoryController::class, 'create'])->name('create.category');
        Route::post('/admin/blog/category/store', [BlogCategoryController::class, 'store'])->name('store.category');
        Route::get('/admin/blog/category/edit/{id}', [BlogCategoryController::class, 'edit'])->name('edit.category');
        Route::post('/admin/blog/category/update/{id}', [BlogCategoryController::class, 'update'])->name('update.category');
        Route::get('/admin/blog/category/delete/{id}', [BlogCategoryController::class, 'destroy'])->name('delete.category');
        Route::get('/admin/search/blog', [SearchController::class, 'searchBlog'])->name('admin.search.blog');

        Route::get('/admin/services', [ServiceController::class, 'index'])->name('index.service');
        Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('create.service');
        Route::post('/admin/services/store', [ServiceController::class, 'store'])->name('store.service');
        Route::get('/admin/services/edit/{id}', [ServiceController::class, 'edit'])->name('edit.service');
        Route::post('/admin/services/update/{id}', [ServiceController::class, 'update'])->name('update.service');
        Route::get('/admin/services/delete/{id}', [ServiceController::class, 'destroy'])->name('delete.service');
        Route::get('/admin/search/service', [SearchController::class, 'searchService'])->name('admin.search.service');

        Route::get('/admin/Working-Processes', [WorkingProccessController::class, 'index'])->name('index.working.process');
        Route::get('/admin/Working-Processes/create', [WorkingProccessController::class, 'create'])->name('create.working.process');
        Route::post('/admin/Working-Processes/store', [WorkingProccessController::class, 'store'])->name('store.working.process');
        Route::get('/admin/Working-Processes/edit/{id}', [WorkingProccessController::class, 'edit'])->name('edit.working.process');
        Route::post('/admin/Working-Processes/update/{id}', [WorkingProccessController::class, 'update'])->name('update.working.process');
        Route::get('/admin/Working-Processes/delete/{id}', [WorkingProccessController::class, 'destroy'])->name('delete.working.process');
        Route::get('/admin/search/Working-Process', [SearchController::class, 'searchWorkingProcess'])->name('admin.search.working.process');

        Route::get('/admin/blogs', [BlogController::class, 'index'])->name('index.blog');
        Route::get('/admin/blogs/create', [BlogController::class, 'create'])->name('create.blog');
        Route::post('/admin/blogs/store', [BlogController::class, 'store'])->name('store.blog');
        Route::get('/admin/blogs/edit/{id}', [BlogController::class, 'edit'])->name('edit.blog');
        Route::post('/admin/blogs/update/{id}', [BlogController::class, 'update'])->name('update.blog');
        Route::get('/admin/blogs/delete/{id}', [BlogController::class, 'destroy'])->name('delete.blog');

        Route::get('/admin/partners', [PartnerController::class, 'index'])->name('partner.index');
        Route::post('/admin/partners/{id}', [PartnerController::class, 'update'])->name('partner.update');

        Route::get('/admin/partner/all/multi/image/', [PartnerMultiImageController::class, 'index'])->name('all.multi.partner.image');
        Route::get('/admin/partners/multi/image/', [PartnerMultiImageController::class, 'create'])->name('add.multi.partner.image');
        Route::post('/admin/partners/store/multi/image', [PartnerMultiImageController::class, 'store'])->name('store.multi.partner.image');
        Route::get('/admin/partners/edit/multi/image/{id}', [PartnerMultiImageController::class, 'edit'])->name('edit.multi.partner.image');
        Route::post('/admin/partners/update/multi/image/{id}', [PartnerMultiImageController::class, 'update'])->name('update.multi.partner.image');
        Route::get('/admin/partners/delete/multi/image/{id}', [PartnerMultiImageController::class, 'destroy'])->name('delete.multi.partner.image');

        Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.contact.index');
        Route::get('/admin/messages/send_email/{id}', [MessageController::class, 'send_email'])->name('send.email');
        Route::get('/admin/messages/view_details/{id}', [MessageController::class, 'viewDetails'])->name('view.contact.details');
        Route::post('/admin/messages/send_user_email/{id}', [MessageController::class, 'send_user_email'])->name('send.user.email');
        Route::get('/admin/messages/destroy/{id}', [MessageController::class, 'destroy'])->name('admin.contact.destroy');

        Route::get('/admin/footer', [FooterController::class, 'index'])->name('footer.index');
        Route::post('/admin/footer/update/{id}', [FooterController::class, 'update'])->name('footer.update');

        Route::get('/admin/banner', [BannerController::class, 'index'])->name('banner.index');
        Route::post('/admin/banner/update/{id}', [BannerController::class, 'update'])->name('banner.update');

        Route::get('/admin/about', [AboutMeController::class, 'index'])->name('about.index');
        Route::post('/admin/about/update/{id}', [AboutMeController::class, 'update'])->name('about.update');
    });
});

require __DIR__.'/auth.php';
