<?php

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
   return redirect('/admin/dashboard');

});
// LOGIN ROUTE
Route::group(['namespace' => 'Admin', 'prefix' => 'admin' ,'middleware'  => ['web', 'guest']], function () {
    // LOGIN ROUTE
    Route::get('login', ['as' => 'login', 'uses' => 'LoginAdminController@getIndex']);
    Route::post('adminlogin', ['as' => 'adminlogin', 'uses' => 'LoginAdminController@postIndex']);
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin' ,'middleware' => ['web', 'auth']], function () {
    // DASHBOARD ROUTE
    Route::get('dashboard', ['as' => 'admin.dashboard.view', 'uses' => 'DashboardController@index']);
    Route::get('profile', ['as' => 'admin.dashboard.profile', 'uses' => 'DashboardController@getProfile']);
    Route::post('password', ['as' => 'admin.dashboard.password', 'uses' => 'DashboardController@postPassword']);
    Route::get('dashboard/details', ['as' => 'admin.dashboard.details', 'uses' => 'DashboardController@orderDetails']);
    Route::post('dashboard/UpdateStats', ['as' => 'admin.dashboard.UpdateStats', 'uses' => 'DashboardController@UpdateStats']);
    Route::post('dashboard/delete', ['as' => 'admin.dashboard.delete', 'uses' => 'DashboardController@delete']);
    Route::get('/getNotification', ['as' => 'admin.getNotification', 'uses' => 'DashboardController@getNotification']);
    Route::get('/readNotification', ['as' => 'admin.readNotification', 'uses' => 'DashboardController@readNotification']);
    Route::get('/getNotification2', ['as' => 'admin.getNotification2', 'uses' => 'DashboardController@getNotification2']);
    Route::get('/readNotification2', ['as' => 'admin.readNotification2', 'uses' => 'DashboardController@readNotification2']);

    //SETTING ROUTE
    Route::get('setting', ['as' => 'admin.setting.index', 'uses' => 'SettingController@index'])->middleware('permission:setting');
    Route::post('setting/update', ['as' => 'admin.setting.update', 'uses' => 'SettingController@update'])->middleware('permission:update_setting');
    
   // Posts ROUTE
    // Route::get('posts', ['as' => 'admin.posts.index', 'uses' => 'PostsController@index'])->middleware('permission:view_posts');
    // Route::get('posts/edit', ['as' => 'admin.posts.edit', 'uses' => 'PostsController@edit'])->middleware('permission:edit_posts');
    // Route::post('posts/add', ['as' => 'admin.posts.add', 'uses' => 'PostsController@add'])->middleware('permission:add_posts');
    // Route::post('posts/add_post', ['as' => 'admin.posts.add', 'uses' => 'PostsController@add_post'])->middleware('permission:edit_posts');
    // Route::post('posts/delete', ['as' => 'admin.posts.delete', 'uses' => 'PostsController@delete'])->middleware('permission:delete_posts');
    // Route::post('posts/add_post', ['as' => 'admin.posts.add', 'uses' => 'PostsController@add_post']);
    // Route::post('posts/add_tag', ['as' => 'admin.posts.add_tag', 'uses' => 'PostsController@add_tag']);
    // Route::post('posts/search', ['as' => 'admin.posts.search', 'uses' => 'PostsController@search']);
    // Route::post('posts/delete', ['as' => 'admin.posts.delete', 'uses' => 'PostsController@delete']);
    // Route::get('posts/tag_select', ['as' => 'admin.posts.tag_select', 'uses' => 'PostsController@tag_select']);
    // Route::post('posts/delete_news_tag', ['as' => 'admin.posts.delete_news_tag', 'uses' => 'PostsController@delete_news_tag']);
   
     // Slider ROUTE
     Route::get('slider', ['as' => 'admin.slider.index', 'uses' => 'SliderController@index']);
     Route::get('slider/edit', ['as' => 'admin.slider.edit', 'uses' => 'SliderController@edit']);
     Route::post('slider/update', ['as' => 'admin.slider.update', 'uses' => 'SliderController@update']);
     Route::post('slider/add', ['as' => 'admin.slider.add', 'uses' => 'SliderController@add']);
     Route::post('slider/UpdateStats', ['as' => 'admin.slider.UpdateStats', 'uses' => 'SliderController@UpdateStats']);
     Route::post('slider/delete/{id}', ['as' => 'admin.slider.delete', 'uses' => 'SliderController@delete']);
 
// Our_clients ROUTE
Route::get('our_clients', ['as' => 'admin.our_clients.index', 'uses' => 'OurClientsController@index']);
Route::get('our_clients/edit', ['as' => 'admin.our_clients.edit', 'uses' => 'OurClientsController@edit']);
Route::post('our_clients/update', ['as' => 'admin.our_clients.update', 'uses' => 'OurClientsController@update']);
Route::post('our_clients/add', ['as' => 'admin.our_clients.add', 'uses' => 'OurClientsController@add']);
Route::post('our_clients/UpdateStats', ['as' => 'admin.our_clients.UpdateStats', 'uses' => 'OurClientsController@UpdateStats']);
Route::post('our_clients/delete/{id}', ['as' => 'admin.our_clients.delete', 'uses' => 'OurClientsController@delete']);


     
    // USERS ROUTE
    Route::get('users', ['as' => 'admin.users.index', 'uses' => 'UserController@index'])->middleware('permission:view_users');
    Route::get('users/edit',['as' => 'admin.users.edit', 'uses' => 'UserController@edit'])->middleware('permission:add_users');
    Route::get('users/getpermission', ['as' => 'admin.users.getpermission', 'uses' => 'UserController@getpermission'])->middleware('permission:permission_users');
    Route::post('users/add', ['as' => 'admin.users.add', 'uses' => 'UserController@add'])->middleware('permission:add_users');
    Route::post('users/update', ['as' => 'admin.users.update', 'uses' => 'UserController@update'])->middleware('permission:add_users');
    Route::post('users/UpdateStats', ['as' => 'admin.users.UpdateStats', 'uses' => 'UserController@UpdateStats'])->middleware('permission:change_status_users');
    Route::post('users/delete', ['as' => 'admin.users.delete', 'uses' => 'UserController@delete'])->middleware('permission:delete_users');
    Route::post('users/changepassword', ['as' => 'admin.users.changepassword', 'uses' => 'UserController@changepassword'])->middleware('permission:change_password_user');
    Route::post('users/permission', ['as' => 'admin.users.permission', 'uses' => 'UserController@permission'])->middleware('permission:permission_users');
    Route::post('users/userpermission', ['as' => 'admin.users.userpermission', 'uses' => 'UserController@userpermission'])->middleware('permission:permission_users');

   // ADV ROUTE
//    Route::get('adv', ['as' => 'admin.adv.index', 'uses' => 'AdvController@index'])->middleware('permission:view_adv');
//    Route::get('adv/edit', ['as' => 'admin.adv.edit', 'uses' => 'AdvController@edit'])->middleware('permission:edit_adv');
//    Route::post('adv/add', ['as' => 'admin.adv.add', 'uses' => 'AdvController@add'])->middleware('permission:add_adv');
//    Route::post('adv/update', ['as' => 'admin.adv.update', 'uses' => 'AdvController@update'])->middleware('permission:edit_adv');
//    Route::post('adv/delete', ['as' => 'admin.adv.delete', 'uses' => 'AdvController@delete'])->middleware('permission:delete_adv');
//    Route::post('adv/UpdateStats', ['as' => 'admin.adv.UpdateStats', 'uses' => 'AdvController@UpdateStats'])->middleware('permission:update_status_adv');

    // // VIDEO ROUTE
    // Route::get('videos', ['as' => 'admin.video.index', 'uses' => 'VideosController@index'])->middleware('permission:view_video');
    // Route::get('videos/edit', ['as' => 'admin.video.edit', 'uses' => 'VideosController@edit'])->middleware('permission:edit_video');
    // Route::post('videos/add', ['as' => 'admin.video.add', 'uses' => 'VideosController@add'])->middleware('permission:add_video');
    // Route::post('videos/update', ['as' => 'admin.video.update', 'uses' => 'VideosController@update'])->middleware('permission:edit_video');
    // Route::post('videos/delete', ['as' => 'admin.video.delete', 'uses' => 'VideosController@delete'])->middleware('permission:delete_video');
    // Route::post('videos/UpdateStats', ['as' => 'admin.video.UpdateStats', 'uses' => 'VideosController@UpdateStats'])->middleware('permission:update_status_video');

    // ALBUMS ROUTE
    // Route::get('albums', ['as' => 'admin.albums.index', 'uses' => 'AlbumsController@index'])->middleware('permission:view_albums');
    // Route::get('albums/edit', ['as' => 'admin.albums.edit', 'uses' => 'AlbumsController@edit'])->middleware('permission:edit_album');
    // Route::get('albums/getImages', ['as' => 'admin.albums.getImages', 'uses' => 'AlbumsController@getImages'])->middleware('permission:view_images');
    // Route::post('albums/postImages', ['as' => 'admin.albums.postImages', 'uses' => 'AlbumsController@postImages'])->middleware('permission:add_images');
    // Route::post('albums/deleteImages', ['as' => 'admin.albums.deleteImages', 'uses' => 'AlbumsController@deleteImages'])->middleware('permission:delete_images');
    // Route::post('albums/add', ['as' => 'admin.albums.add', 'uses' => 'AlbumsController@add'])->middleware('permission:add_album');
    // Route::post('albums/update', ['as' => 'admin.albums.update', 'uses' => 'AlbumsController@update'])->middleware('permission:edit_album');
    // Route::post('albums/delete', ['as' => 'admin.albums.delete', 'uses' => 'AlbumsController@delete'])->middleware('permission:delete_images');
    // Route::post('albums/UpdateStats', ['as' => 'admin.albums.UpdateStats', 'uses' => 'AlbumsController@UpdateStats'])->middleware('permission:update_status_album');

    // SYSTEM CONSTANT  ROUTE
    Route::get('system_constants', ['as' => 'admin.system_constants.index', 'uses' => 'SystemConstantController@index'])->middleware('permission:view_system_constants');
    Route::get('system_constants/edit', ['as' => 'admin.system_constants.edit', 'uses' => 'SystemConstantController@edit'])->middleware('permission:update_system_constants');
    Route::post('system_constants/add', ['as' => 'admin.system_constants.add', 'uses' => 'SystemConstantController@add'])->middleware('permission:add_system_constants');
    Route::post('system_constants/update', ['as' => 'admin.system_constants.update', 'uses' => 'SystemConstantController@update'])->middleware('permission:update_system_constants');
    Route::post('system_constants/delete', ['as' => 'admin.system_constants.delete', 'uses' => 'SystemConstantController@delete'])->middleware('permission:delete_system_constants');
    Route::post('system_constants/UpdateStats', ['as' => 'admin.system_constants.UpdateStats', 'uses' => 'SystemConstantController@UpdateStats'])->middleware('permission:status_system_constants');


    //CONTACT ROUTE
    Route::get('contact', ['as' => 'admin.contact.index', 'uses' => 'ContactUsController@index'])->middleware('permission:contact');
    Route::get('contact/view', ['as' => 'admin.contact_view.index', 'uses' => 'ContactUsController@view'])->middleware('permission:view_contact');
    Route::post('contact/reply_view', ['as' => 'admin.reply_view.index', 'uses' => 'ContactUsController@reply'])->middleware('permission:reply_contact');
    Route::post('contact/delete/{id}', ['as' => 'admin.contact.delete', 'uses' => 'ContactUsController@delete']);

    Route::get('project_request', ['as' => 'admin.project_request.index', 'uses' => 'ProjectRequestController@index']);
    
// UPLOAD CENTER ROUTE
Route::get('uploads/getCategory', ['as' => 'admin.uploads.getCategory', 'uses' => 'UploadsController@getCategory']);
Route::post('uploads/addCategory', ['as' => 'admin.uploads.addCategory', 'uses' => 'UploadsController@addCategory']);
Route::get('uploads/getSelectCategory', ['as' => 'admin.uploads.getSelectCategory', 'uses' => 'UploadsController@getSelectCategory']);
Route::get('uploads/getFile', ['as' => 'admin.uploads.getFile', 'uses' => 'UploadsController@getFile']);
Route::get('uploads/search', ['as' => 'admin.uploads.search', 'uses' => 'UploadsController@search']);
Route::post('uploads/update_category', ['as' => 'admin.uploads.update_category', 'uses' => 'UploadsController@update_category']);
Route::post('uploads/getLink', ['as' => 'admin.uploads.getLink', 'uses' => 'UploadsController@getLink']);
Route::post('uploads/upload_file', ['as' => 'admin.uploads.upload_file', 'uses' => 'UploadsController@upload_file']);
Route::post('uploads/upload_image', ['as' => 'admin.uploads.upload_image', 'uses' => 'UploadsController@upload_image']);
Route::post('uploads/deleteCategory', ['as' => 'admin.uploads.deleteCategory', 'uses' => 'UploadsController@deleteCategory']);
Route::post('uploads/deleteUpload', ['as' => 'admin.uploads.deleteUpload', 'uses' => 'UploadsController@deleteUpload']);


   // STATIC ROUTE
    Route::get('static_page', ['as' => 'admin.static_page.index', 'uses' => 'StaticPageController@index'])->middleware('permission:view_page');
    Route::get('static_page/edit', ['as' => 'admin.static_page.edit', 'uses' => 'StaticPageController@edit'])->middleware('permission:edit_page');
    Route::post('static_page/add', ['as' => 'admin.static_page.add', 'uses' => 'StaticPageController@add'])->middleware('permission:add_page');
    Route::post('static_page/update', ['as' => 'admin.static_page.update', 'uses' => 'StaticPageController@update'])->middleware('permission:edit_page');
    Route::post('static_page/UpdateStats', ['as' => 'admin.static_page.UpdateStats', 'uses' => 'StaticPageController@UpdateStats'])->middleware('permission:update_status_page');
    Route::post('static_page/delete', ['as' => 'admin.static_page.delete', 'uses' => 'StaticPageController@delete'])->middleware('permission:delete_page');

    // service ROUTE
    Route::get('service', ['as' => 'admin.service.index', 'uses' => 'ServiceController@index'])->middleware('permission:view_service');
    Route::get('service/edit', ['as' => 'admin.service.edit', 'uses' => 'ServiceController@edit'])->middleware('permission:edit_service');
    Route::post('service/add', ['as' => 'admin.service.add', 'uses' => 'ServiceController@add'])->middleware('permission:add_service');
    Route::post('service/update', ['as' => 'admin.service.update', 'uses' => 'ServiceController@update'])->middleware('permission:edit_service');
    Route::post('service/UpdateStats', ['as' => 'admin.service.UpdateStats', 'uses' => 'ServiceController@UpdateStats'])->middleware('permission:update_status_service');
    Route::post('service/delete', ['as' => 'admin.service.delete', 'uses' => 'ServiceController@delete'])->middleware('permission:delete_service');


    //  products
    Route::get('products', ['as' => 'admin.products.index', 'uses' => 'ProductsController@index'])->middleware('permission:view_products');
    Route::get('products/edit', ['as' => 'admin.products.edit', 'uses' => 'ProductsController@edit'])->middleware('permission:edit_products');
    Route::post('products/add', ['as' => 'admin.products.add', 'uses' => 'ProductsController@add'])->middleware('permission:add_products');
    Route::post('products/update', ['as' => 'admin.products.update', 'uses' => 'ProductsController@update'])->middleware('permission:edit_products');
    Route::post('products/UpdateStats', ['as' => 'admin.products.UpdateStats', 'uses' => 'ProductsController@UpdateStats'])->middleware('permission:update_status_products');
    Route::post('products/delete', ['as' => 'admin.products.delete', 'uses' => 'ProductsController@delete'])->middleware('permission:delete_products');


    
    // STATISTICS ROUTE
    Route::get('statistics', ['as' => 'admin.statistics.index', 'uses' => 'StatisticsController@index']);
    Route::get('statistics/edit', ['as' => 'admin.statistics.edit', 'uses' => 'StatisticsController@edit']);
    Route::post('statistics/add', ['as' => 'admin.statistics.add', 'uses' => 'StatisticsController@add']);
    Route::post('statistics/update', ['as' => 'admin.statistics.update', 'uses' => 'StatisticsController@update']);
    Route::post('statistics/delete', ['as' => 'admin.statistics.delete', 'uses' => 'StatisticsController@delete']);
   

  // service ROUTE
  Route::get('howwork', ['as' => 'admin.howwork.index', 'uses' => 'HowWorkController@index'])->middleware('permission:view_howwork');
  Route::get('howwork/edit', ['as' => 'admin.howwork.edit', 'uses' => 'HowWorkController@edit'])->middleware('permission:edit_howwork');
  Route::post('howwork/add', ['as' => 'admin.howwork.add', 'uses' => 'HowWorkController@add'])->middleware('permission:add_howwork');
  Route::post('howwork/update', ['as' => 'admin.howwork.update', 'uses' => 'HowWorkController@update'])->middleware('permission:edit_howwork');
  Route::post('howwork/UpdateStats', ['as' => 'admin.howwork.UpdateStats', 'uses' => 'HowWorkController@UpdateStats'])->middleware('permission:update_status_howwork');
  Route::post('howwork/delete', ['as' => 'admin.howwork.delete', 'uses' => 'HowWorkController@delete'])->middleware('permission:delete_howwork');

   // service ROUTE
   Route::get('business', ['as' => 'admin.business.index', 'uses' => 'BusinessController@index'])->middleware('permission:view_business');
   Route::get('business/edit', ['as' => 'admin.business.edit', 'uses' => 'BusinessController@edit'])->middleware('permission:edit_business');
   Route::post('business/add', ['as' => 'admin.business.add', 'uses' => 'BusinessController@add'])->middleware('permission:add_business');
   Route::post('business/update', ['as' => 'admin.business.update', 'uses' => 'BusinessController@update'])->middleware('permission:edit_business');
   Route::post('business/UpdateStats', ['as' => 'admin.business.UpdateStats', 'uses' => 'BusinessController@UpdateStats'])->middleware('permission:update_status_business');
   Route::post('business/delete', ['as' => 'admin.business.delete', 'uses' => 'BusinessController@delete'])->middleware('permission:delete_business');
   Route::post('business/Updateshow', ['as' => 'admin.business.Updateshow', 'uses' => 'BusinessController@Updateshow'])->middleware('permission:update_show_business');
   

   // service ROUTE
   Route::get('plan', ['as' => 'admin.plan.index', 'uses' => 'PlanController@index'])->middleware('permission:view_plan');
   Route::get('plan/edit', ['as' => 'admin.plan.edit', 'uses' => 'PlanController@edit'])->middleware('permission:edit_plan');
   Route::post('plan/add', ['as' => 'admin.plan.add', 'uses' => 'PlanController@add'])->middleware('permission:add_plan');
   Route::post('plan/update', ['as' => 'admin.plan.update', 'uses' => 'PlanController@update'])->middleware('permission:edit_plan');
   Route::post('plan/UpdateStats', ['as' => 'admin.plan.UpdateStats', 'uses' => 'PlanController@UpdateStats'])->middleware('permission:update_status_plan');
   Route::post('plan/delete', ['as' => 'admin.plan.delete', 'uses' => 'PlanController@delete'])->middleware('permission:delete_plan');

   Route::get('participation', ['as' => 'admin.participation.index', 'uses' => 'ParticipationController@index'])->middleware('permission:view_participation');
   Route::post('participation/delete/{id}', ['as' => 'admin.participation.delete', 'uses' => 'ParticipationController@delete'])->middleware('permission:delete_participation');
   Route::get('participation/view', ['as' => 'admin.participation_view.index', 'uses' => 'ParticipationController@view']);
   Route::get('participation/export', ['as' => 'admin.participation.export', 'uses' => 'ParticipationController@export']);
   Route::get('participation/export2/{id?}', ['as' => 'admin.participation.export2', 'uses' => 'ParticipationController@export2']);

   
    //Breaking News  ROUTE
    // Route::get('breakingNews', ['as' => 'admin.breakingNews.index', 'uses' => 'BreakingNewsController@index'])->middleware('permission:view_breaking_news');
    // Route::get('breakingNews/edit', ['as' => 'admin.breakingNews.edit', 'uses' => 'BreakingNewsController@edit'])->middleware('permission:edit_breaking_news');
    // Route::post('breakingNews/update', ['as' => 'admin.breakingNews.update', 'uses' => 'BreakingNewsController@update'])->middleware('permission:edit_breaking_news');
    // Route::post('breakingNews/add_breakingNews', ['as' => 'admin.breakingNews.add', 'uses' => 'BreakingNewsController@add_breakingNews'])->middleware('permission:add_breaking_news');
    // Route::post('breakingNews/delete', ['as' => 'admin.breakingNews.delete', 'uses' => 'BreakingNewsController@delete'])->middleware('permission:delete_breaking_news');
    // Route::post('breakingNews/UpdateStats', ['as' => 'admin.breakingNews.UpdateStats', 'uses' => 'BreakingNewsController@UpdateStats'])->middleware('permission:update_status_breaking_news');

      // aboutus ROUTE
      Route::get('aboutus', ['as' => 'admin.aboutus.index', 'uses' => 'AboutUsController@index'])->middleware('permission:view_testimonail');
      Route::get('aboutus/edit', ['as' => 'admin.aboutus.edit', 'uses' => 'AboutUsController@edit'])->middleware('permission:edit_testimonail');
      Route::post('aboutus/add', ['as' => 'admin.aboutus.add', 'uses' => 'AboutUsController@add'])->middleware('permission:add_testimonail');
      Route::post('aboutus/update', ['as' => 'admin.aboutus.update', 'uses' => 'AboutUsController@update'])->middleware('permission:edit_testimonail');
      Route::post('aboutus/UpdateStats', ['as' => 'admin.aboutus.UpdateStats', 'uses' => 'AboutUsController@UpdateStats'])->middleware('permission:status_testimonail');
      Route::post('aboutus/delete', ['as' => 'admin.aboutus.delete', 'uses' => 'AboutUsController@delete'])->middleware('permission:delete_testimonail');
  
     // SOCAIL ROUTE
     Route::get('social', ['as' => 'admin.social.index', 'uses' => 'SocialLinksController@index'])->middleware('permission:view_social');
     Route::get('social/edit', ['as' => 'admin.social.edit', 'uses' => 'SocialLinksController@edit'])->middleware('permission:edit_social');
     Route::post('social/update', ['as' => 'admin.social.update', 'uses' => 'SocialLinksController@update'])->middleware('permission:edit_social');
     Route::post('social/add', ['as' => 'admin.social.add', 'uses' => 'SocialLinksController@add'])->middleware('permission:add_social');
     Route::post('social/UpdateStats', ['as' => 'admin.social.UpdateStats', 'uses' => 'SocialLinksController@UpdateStats'])->middleware('permission:update_status_social');
     Route::post('social/delete', ['as' => 'admin.social.delete', 'uses' => 'SocialLinksController@delete'])->middleware('permission:delete_social');
 
    // Route Logout
    Route::get('/logout', ['as' => 'admin.dashboard.logout', 'uses' => 'LoginAdminController@getLogout']);
    Route::get('/clear', function () {
        Cache::forget('spatie.permission.cache');
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        \Illuminate\Support\Facades\Artisan::call('view:clear');
        \Illuminate\Support\Facades\Artisan::call('config:cache');
        return 'cleared';
    });
});

Route::group(['namespace' => 'Site', 'middleware' => ['web']], function () {
    Route::get('/', ['as' => 'site.index', 'uses' => 'HomeController@index']);
    Route::post('/contacts', ['as' => 'site.contacts', 'uses' => 'HomeController@contacts']);
    Route::post('/project_request', ['as' => 'site.project_request', 'uses' => 'HomeController@project_request']);
    Route::get('/contact-us', ['as' => 'site.contactus', 'uses' => 'HomeController@contactus']);
    Route::get('/ourWorks', ['as' => 'site.ourWorks', 'uses' => 'HomeController@ourWorks']);
    Route::get('/service', ['as' => 'site.service', 'uses' => 'HomeController@service']);
    Route::get('/about', ['as' => 'site.about', 'uses' => 'HomeController@about']);
    Route::get('/plan', ['as' => 'site.plan', 'uses' => 'HomeController@plan']);
    // Route::post('/contactus', ['as' => 'site.contactus', 'uses' => 'HomeController@contactuss']);
    Route::get('/howwork', ['as' => 'site.howwork', 'uses' => 'HomeController@howwork']);
    Route::post('/add_participation', ['as' => 'site.add_participation', 'uses' => 'HomeController@add_participation']);
    Route::get('/service/{id}', ['as' => 'site.singleservice', 'uses' => 'HomeController@singleservice']);
    Route::get('/profile', ['as' => 'site.profile', 'uses' => 'HomeController@profile_co']);

    Route::get('/{url}', ['as' => 'site.static', 'uses' => 'HomeController@static']);

    
    Route::get('/category/{id}/{slug?}', ['as' => 'site.index', 'uses' => 'HomeController@category']);
    Route::get('/posts/{id}/{slug?}', ['as' => 'site.posts', 'uses' => 'HomeController@posts']);
    Route::get('/img/{size}/{img}', ['as' => 'site.img.index', 'uses' => 'ImgController@index']);
    Route::get('/aboutus/{slug?}', ['as' => 'site.aboututs', 'uses' => 'HomeController@aboutus']);
    Route::get('/privacy/{slug?}', ['as' => 'site.terms', 'uses' => 'HomeController@privacy']);
    Route::get('/getScrollPosts', ['as' => 'site.getScrollPosts', 'uses' => 'HomeController@getScrollPosts']);
    Route::get('/search', ['as' => 'site.search', 'uses' => 'HomeController@search']);
    Route::get('/tags/{id}/{slug?}', ['as' => 'site.tags', 'uses' => 'HomeController@tags']);
    Route::get('/print/{id}', ['as' => 'site.print', 'uses' => 'HomeController@print']);
    // Route::get('/albums/{id}/{slug?}', ['as' => 'site.albums', 'uses' => 'HomeController@albumsimages']);
});