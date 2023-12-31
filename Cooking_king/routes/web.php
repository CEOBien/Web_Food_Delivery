<?php
use Illuminate\Support\Facades\Route;
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



Route::get('/home', function () {
    return view('home');
});


Route::prefix('admin')->group(function () {

    Route::get('/', [
        'as' => 'admin.login',
        'uses' => 'AdminController@loginAdmin'
    ]);
    Route::get('/404', [
        'as' => 'admin.404',
        'uses' => 'AdminController@errors'
    ]);
    Route::post('/', [
        'as' => 'admin.post-login',
        'uses' => 'AdminController@postLoginAdmin'
    ]);
    Route::get('/register', [
        'as' => 'admin.register',
        'uses' => 'AdminController@registerAdmin'
    ]);

    Route::get('/logout', [
        'as' => 'admin.logout',
        'uses' => 'AdminController@logout'
    ]);
    Route::get('/eror',[
        'as' => 'admin.error',
        'uses' => 'AdminRoleController@error'
    ]);
    //statistical
    Route::prefix('statistical')->group(function () {
        Route::get('/statistical', [
            'as' => 'statistical.index',
            'uses' => 'AdminDashboardController@index'
        ]);
        Route::post('/filter-by-date', [
            'as' => 'statistical.filter_by_date',
            'uses' => 'AdminDashboardController@filter_by_date'
        ]);
        Route::post('/change', [
            'as' => 'statistical.change',
            'uses' => 'AdminDashboardController@dashboard_filter'
        ]);
        Route::post('/day-order', [
            'as' => 'statistical.dayorder',
            'uses' => 'AdminDashboardController@day_order'
        ]);
    
  

    });
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
            'middleware' => 'can:category-list'
        ]);
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create',
            'middleware' => 'can:category-add'
        ]);
        Route::get('/search', [
            'as' => 'categories.search',
            'uses' => 'CategoryController@search',
            'middleware' => 'can:category-add'
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit',
            'middleware' => 'can:category-edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete',
            'middleware' => 'can:category-delete'
        ]);

    });
    // Menus
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'MenuController@index',
            'middleware' => 'can:menus-list'
        ]);
        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'MenuController@create',
            'middleware' => 'can:menus-add'
        ]);
        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'MenuController@store'
            
        ]);
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'MenuController@edit',
            'middleware' => 'can:menus-edit'
            
        ]);

        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'MenuController@update'
            
        ]);
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'MenuController@delete',
            'middleware' => 'can:menus-delete'
        ]);

    });

    // Product
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'AdminProductController@index',
            'middleware' => 'can:product-list'
        ]);
        Route::get('/search', [
            'as' => 'product.search',
            'uses' => 'AdminProductController@search'
        ]);
        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'AdminProductController@create',
            'middleware' => 'can:product-add'
        ]);
        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'AdminProductController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'AdminProductController@edit',
            'middleware' => 'can:product-edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'AdminProductController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'AdminProductController@delete',
            'middleware' => 'can:product-delete'
        ]);

    });

    // Slider
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'SliderAdminController@index',
            'middleware' => 'can:slider-list'
        ]);

        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'SliderAdminController@create',
            'middleware' => 'can:slider-add'
        ]);

        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'SliderAdminController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'SliderAdminController@edit',
            'middleware' => 'can:slider-edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'SliderAdminController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'SliderAdminController@delete',
            'middleware' => 'can:slider-delete'
        ]);




    });

    // Settings
    Route::prefix('settings')->group(function () {
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'AdminSettingController@index',
            'middleware' => 'can:setting-list'
        ]);

        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'AdminSettingController@create',
            'middleware' => 'can:setting-add'
        ]);
        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'AdminSettingController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'AdminSettingController@edit',
            'middleware' => 'can:setting-edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'AdminSettingController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'AdminSettingController@delete',
            'middleware' => 'can:setting-delete'
        ]);


    });
    // User
    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'AdminUserController@index',
            'middleware' => 'can:user-list'
            
        ]);
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'AdminUserController@create',
            'middleware' => 'can:user-add'
        ]);
        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'AdminUserController@store'
            
        ]);

        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'AdminUserController@edit',
            'middleware' => 'can:user-edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'AdminUserController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'AdminUserController@delete',
            'middleware' => 'can:user-delete'
        ]);

    });
    //roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'AdminRoleController@index',
            'middleware' => 'can:role-list'
        ]);
        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'AdminRoleController@create',
            'middleware' => 'can:role-add'
        ]);
        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'AdminRoleController@store'
           
        ]);
        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'AdminRoleController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'AdminRoleController@update',
            'middleware' => 'can:role-edit'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'roles.delete',
            'uses' => 'AdminRoleController@delete',
            'middleware' => 'can:role-delete'
        ]);


    });
    //permissions
    Route::prefix('permissions')->group(function () {
        Route::get('/create', [
            'as' => 'permissions.create',
            'uses' => 'AdminPermissionController@createPermissions'
        ]);
        Route::post('/store', [
            'as' => 'permissions.store',
            'uses' => 'AdminPermissionController@store'
        ]);
      


    });
    //blog
    Route::prefix('blogs')->group(function () {
        Route::get('/', [
            'as' => 'blogs.index',
            'uses' => 'AdminBlogController@index',
            
        ]);
        Route::get('/create', [
            'as' => 'blogs.create',
            'uses' => 'AdminBlogController@create'
        ]);
        Route::post('/store', [
            'as' => 'blogs.store',
            'uses' => 'AdminBlogController@store',
            
        ]);
        Route::get('/edit/{id}', [
            'as' => 'blogs.edit',
            'uses' => 'AdminBlogController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'blogs.update',
            'uses' => 'AdminBlogController@update',
           
        ]);
        Route::get('/delete/{id}', [
            'as' => 'blogs.delete',
            'uses' => 'AdminBlogController@delete',
            
        ]);
      

    });
    //bill
    Route::prefix('bills')->group(function () {
        Route::get('/', [
            'as' => 'bills.index',
            'uses' => 'AdminBillsController@index'
        ]);
    
  

    });
    
    

});




