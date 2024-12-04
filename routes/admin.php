<?php


use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\WhyUseController;
use App\Http\Controllers\Admin\WorkController;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomPageController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;

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



//====================Admin Authentication=========================


    Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('login.admin');
    Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth:admin'], 'where' => ['locale' => '[a-zA-Z]{2}']], function () {

        Route::get('/view', [NewsLetterController::class, 'index'])->name('newsletter.list');

        // Route::get('/general',[GeneralController::class,'genview'])->name('settings.General.general');
        Route::get('/smtp', [MailController::class, 'mailview'])->name('settings.Smtp.mail');
        Route::post('/test-mail', [MailController::class, 'testMail'])->name('settings.test.mail');


        Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);
        Route::get('/cc', 'DashboardController@cacheClear')->name('cacheClear');



        //Admin Setting
        Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
            Route::get('general', [AdminSettingsController::class, 'general'])->name('general');
            Route::post('general/store', [AdminSettingsController::class, 'generalStore'])->name('general_store');

            Route::get('home-content', [HomeContentController::class, 'index'])->name('home.content');
            Route::post('home-content/update', [HomeContentController::class, 'update'])->name('homeContent.update');
            Route::get('about-content', [HomeContentController::class, 'about'])->name('about.content');
            Route::post('about-content/update', [HomeContentController::class, 'aboutUpdate'])->name('about.content.update');
            Route::get('client-image/{id}/delete', [HomeContentController::class, 'deleteClientImage'])->name('pageImage.delete');
        });





        Route::get('ajax/text-editor/image', ['as' => 'text-editor.image', 'uses' => 'CustomPageController@postEditorImageUpload']);
        //Custom Page
        Route::group(['prefix' => 'cpage', 'as' => 'cpage.'], function () {
            Route::get('/', [CustomPageController::class, 'index'])->name('index');
            Route::get('{id}/view', [CustomPageController::class, 'view'])->name('view');
            Route::get('{id}/edit', [CustomPageController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [CustomPageController::class, 'update'])->name('update');
        });


        //Faq
        Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
            Route::get('/', [FaqController::class, 'index'])->name('index');
            Route::get('create', [FaqController::class, 'create'])->name('create');
            Route::post('store', [FaqController::class, 'store'])->name('store');
            Route::get('{id}/view', [FaqController::class, 'view'])->name('view');
            Route::get('{id}/edit', [FaqController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [FaqController::class, 'update'])->name('update');
            Route::get('{id}/delete', [FaqController::class, 'delete'])->name('delete');
        });





        // Setting
        Route::get('pages', [AdminSettingsController::class, 'pages'])->name('pages');
        Route::get('page/{home}', [AdminSettingsController::class, 'editHomePage'])->name('edit.home');
        Route::post('page/{home}/update', [AdminSettingsController::class, 'updateHomePage'])->name('update.home');



        // Users
        Route::get('roles', [RolesController::class, 'index'])->name('roles.index');
        Route::get('roles/create', [RolesController::class, 'create'])->name('roles.create');
        Route::post('roles/store', [RolesController::class, 'store'])->name('roles.store');
        Route::get('roles/{id}/show', [RolesController::class, 'show'])->name('roles.show');
        Route::get('roles/{id}/edit', [RolesController::class, 'edit'])->name('roles.edit');
        Route::post('roles/{id}/update', [RolesController::class, 'update'])->name('roles.update');
         Route::delete('roles/{id}/destroy', [RolesController::class, 'destroy'])->name('roles.delete');


        Route::get('admins', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::get('/{id}/password-edit', [UserController::class, 'passwordEdit'])->name('user.password.edit');
        Route::post('/{id}/password-update', [UserController::class, 'passwordUpdate'])->name('user.password.update');
        Route::post('/{id}/update', [UserController::class, 'update'])->name('user.update');




        // admin profile
        Route::get('profile', [DashboardController::class, 'adminProfile'])->name('profile');
        Route::get('profile-edit', [DashboardController::class, 'profileEdit'])->name('profile.edit');
        Route::post('profile-update', [DashboardController::class, 'profileUpdate'])->name('profile.update');
        Route::post('password-update', [DashboardController::class, 'passwordUpdate'])->name('password.update');



        //Blog Category
        Route::group(['prefix' => 'blog-category', 'as' => 'blog-category.'], function () {
            Route::get('/', [BlogCategoryController::class, 'index'])->name('index');
            Route::post('/store', [BlogCategoryController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [BlogCategoryController::class, 'edit'])->name('edit');
            Route::post('/{id}/update', [BlogCategoryController::class, 'update'])->name('update');
            Route::get('/{id}/delete', [BlogCategoryController::class, 'delete'])->name('delete');
        });

        //Blog Post
        Route::group(['prefix' => 'blog-post', 'as' => 'blog-post.'], function () {
            Route::get('/', [BlogPostController::class, 'index'])->name('index');
            Route::get('create', [BlogPostController::class, 'create'])->name('create');
            Route::post('store', [BlogPostController::class, 'store'])->name('store');
            Route::get('{id}/edit', [BlogPostController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [BlogPostController::class, 'update'])->name('update');
            Route::get('{id}/view', [BlogPostController::class, 'view'])->name('view');
            Route::get('{id}/delete', [BlogPostController::class, 'delete'])->name('delete');
        });
        //Service
        Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
            Route::get('/', [ServiceController::class, 'index'])->name('index');
            Route::get('create', [ServiceController::class, 'create'])->name('create');
            Route::post('store', [ServiceController::class, 'store'])->name('store');
            Route::get('{id}/edit', [ServiceController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [ServiceController::class, 'update'])->name('update');
            Route::get('{id}/view', [ServiceController::class, 'view'])->name('view');
            Route::get('{id}/delete', [ServiceController::class, 'delete'])->name('delete');
        });
        //Work
        Route::group(['prefix' => 'work', 'as' => 'work.'], function () {
            Route::get('/', [WorkController::class, 'index'])->name('index');
            Route::get('create', [WorkController::class, 'create'])->name('create');
            Route::post('store', [WorkController::class, 'store'])->name('store');
            Route::get('{id}/edit', [WorkController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [WorkController::class, 'update'])->name('update');
            Route::get('{id}/view', [WorkController::class, 'view'])->name('view');
            Route::get('{id}/delete', [WorkController::class, 'delete'])->name('delete');
        });
        //Why Use
        Route::group(['prefix' => 'why-use', 'as' => 'why-use.'], function () {
            Route::get('/', [WhyUseController::class, 'index'])->name('index');
            Route::get('create', [WhyUseController::class, 'create'])->name('create');
            Route::post('store', [WhyUseController::class, 'store'])->name('store');
            Route::get('{id}/edit', [WhyUseController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [WhyUseController::class, 'update'])->name('update');
            Route::get('{id}/view', [WhyUseController::class, 'view'])->name('view');
            Route::get('{id}/delete', [WhyUseController::class, 'delete'])->name('delete');
        });

        //Contact
        Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
            Route::get('/', [ContactController::class, 'index'])->name('index');
            Route::get('{id}/view', [ContactController::class, 'view'])->name('view');
            Route::get('{id}/delete', [ContactController::class, 'delete'])->name('delete');
        });

        //Seo
        Route::group(['prefix' => 'seo', 'as' => 'seo.'], function () {
            Route::get('/', [SeoController::class, 'index'])->name('index');
            Route::get('{id}/edit', [SeoController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [SeoController::class, 'update'])->name('update');
            Route::get('{id}/view', [SeoController::class, 'view'])->name('view');
        });

    });

