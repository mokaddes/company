<?php


use App\Models\BlogCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomPageController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Admin\LanguageController as AdminLanguageController;
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
        // {{--('BRAND')--}}
        Route::get('/view', [NewsLetterController::class, 'index'])->name('newsletter.list');


        Route::get('/sc', [SettingsController::class, 'setview'])->name('settings.MobileApp.index');
        Route::post('/sc/update', [SettingsController::class, 'MobileAppUpdate'])->name('settings.MobileApp.update');

        Route::get('/currency', [CurrencyController::class, 'currenview'])->name('settings.Currency.index');

        // Route::get('/general',[GeneralController::class,'genview'])->name('settings.General.general');
        Route::get('/smtp', [MailController::class, 'mailview'])->name('settings.Smtp.mail');
        Route::post('/smtp/update', [SettingsController::class, 'SmtpUpdate'])->name('settings.smtp.update');
        Route::post('/test-mail', [MailController::class, 'testMail'])->name('settings.test.mail');


        Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@dashboard']);
        Route::get('/cc', 'DashboardController@cacheClear')->name('cacheClear');
        // Route::get('settings', ['as' => 'settings', 'uses' => 'SettingsController@settings']);


        //Admin Setting
        Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
            Route::get('general', [AdminSettingsController::class, 'general'])->name('general');
            Route::post('general/store', [AdminSettingsController::class, 'generalStore'])->name('general_store');
            Route::get('languages', [AdminLanguageController::class, 'index'])->name('language');
            Route::post('language/store', [AdminLanguageController::class, 'store'])->name('language.store');
            Route::get('language/{id}/edit', [AdminLanguageController::class, 'edit'])->name('language.edit');
            Route::post('language/{id}/update', [AdminLanguageController::class, 'update'])->name('language.update');
            Route::get('language/{id}/delete', [AdminLanguageController::class, 'delete'])->name('language.delete');

            Route::get('home-content', [HomeContentController::class, 'index'])->name('home.content');
            Route::post('home-content/update', [HomeContentController::class, 'update'])->name('homeContent.update');
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

        Route::get('settings', [AdminSettingsController::class, 'settings'])->name('settings');
        Route::post('change-settings', [AdminSettingsController::class, 'changeSettings'])->name('change.settings');
        Route::get('tax-setting', [AdminSettingsController::class, 'taxSetting'])->name('tax.setting');
        Route::post('update-tex-setting', [AdminSettingsController::class, 'updateTaxSetting'])->name('update.tax.setting');
        Route::post('update-email-setting', [AdminSettingsController::class, 'updateEmailSetting'])->name('update.email.setting');



        // Users
        Route::get('roles', [RolesController::class, 'index'])->name('roles.index');
        Route::get('roles/create', [RolesController::class, 'create'])->name('roles.create');
        Route::post('roles/store', [RolesController::class, 'store'])->name('roles.store');
        Route::get('roles/{id}/show', [RolesController::class, 'show'])->name('roles.show');
        Route::get('roles/{id}/edit', [RolesController::class, 'edit'])->name('roles.edit');
        Route::post('roles/{id}/update', [RolesController::class, 'update'])->name('roles.update');
        // Route::delete('roles/{id}/destroy', [RolesController::class, 'destroy'])->name('roles.destroy');


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

        //Contact
        Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
            Route::get('/', [ContactController::class, 'index'])->name('index');
            // Route::get('create', [ContactController::class, 'create'])->name('create');
            // Route::post('store', [ContactController::class, 'store'])->name('store');
            // Route::get('{id}/edit', [ContactController::class, 'edit'])->name('edit');
            // Route::post('{id}/update', [ContactController::class, 'update'])->name('update');
            Route::get('{id}/view', [ContactController::class, 'view'])->name('view');
            Route::get('{id}/delete', [ContactController::class, 'delete'])->name('delete');
        });

        //Seo
        Route::group(['prefix' => 'seo', 'as' => 'seo.'], function () {
            Route::get('/', [SeoController::class, 'index'])->name('index');
            // Route::get('create', [SeoController::class, 'create'])->name('create');
            // Route::post('store', [SeoController::class, 'store'])->name('store');
            Route::get('{id}/edit', [SeoController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [SeoController::class, 'update'])->name('update');
            Route::get('{id}/view', [SeoController::class, 'view'])->name('view');
            // Route::get('{id}/delete', [SeoController::class, 'delete'])->name('delete');
        });

        //Country
        Route::group(['prefix' => 'country', 'as' => 'country.'], function () {
            Route::get('/', [CountryController::class, 'index'])->name('index');
            Route::get('create', [CountryController::class, 'create'])->name('create');
            Route::post('store', [CountryController::class, 'store'])->name('store');
            Route::get('{id}/edit', [CountryController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [CountryController::class, 'update'])->name('update');
            // Route::get('{id}/view', 'CountryController@view')->name('view');
            Route::get('{id}/delete', [CountryController::class, 'delete'])->name('delete');
        });

        //Region
        Route::group(['prefix' => 'region', 'as' => 'region.'], function () {
            Route::get('/', [RegionController::class, 'index'])->name('index');
            Route::get('create', [RegionController::class, 'create'])->name('create');
            Route::post('store', [RegionController::class, 'store'])->name('store');
            Route::get('{id}/edit', [RegionController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [RegionController::class, 'update'])->name('update');
            // Route::get('{id}/view', 'RegionController@view')->name('view');
            Route::get('{id}/delete', [RegionController::class, 'delete'])->name('delete');
        });

        //City
        Route::group(['prefix' => 'city', 'as' => 'city.'], function () {
            Route::get('/', [CityController::class, 'index'])->name('index');
            Route::get('create', [CityController::class, 'create'])->name('create');
            Route::post('store', [CityController::class, 'store'])->name('store');
            Route::get('{id}/edit', [CityController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [CityController::class, 'update'])->name('update');
            Route::get('{id}/view', [CityController::class, 'view'])->name('view');
            Route::get('{id}/delete', [CityController::class, 'delete'])->name('delete');
            Route::get('country/region/{countryId?}', [CityController::class, 'CountryWiseRegion'])->name('countrywise.region');
        });

        // Card
        Route::group(['prefix' => 'card', 'as' => 'card.'], function () {
            Route::get('/', [CardController::class, 'index'])->name('index');
            Route::get('/status/{id}', [CardController::class, 'status'])->name('status');
            Route::get('/edit/{id}', [CardController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [CardController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [CardController::class, 'delete'])->name('delete');
            Route::post('upload/profie', [CardController::class, 'uploadImage'])->name('upload.image');
            Route::post('upload/cover', [CardController::class, 'uploadCover'])->name('upload.cover');
            Route::get('preview/template', [CardController::class, 'previewTemplate'])->name('preview.template');
        });

        // Plan
        Route::group(['prefix' => 'plan', 'as' => 'plan.'], function () {
            Route::get('/', [PlanController::class, 'index'])->name('index');
            Route::get('/create', [PlanController::class, 'create'])->name('create');
            Route::post('/store', [PlanController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PlanController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [PlanController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [PlanController::class, 'delete'])->name('delete');
        });

        // transaction
        Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
            Route::get('/', [TransactionController::class, 'index'])->name('index');
            Route::get('{id}/invoic-download', [TransactionController::class, 'invoiceDownload'])->name('invoice');
        });
    });

