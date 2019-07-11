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

Route::get('/clear', function() {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});

// Language Route
Route::post('/lang', array(
    'Middleware' => 'LanguageSwitcher',
    'uses' => 'LanguageController@index',
))->name('lang');
// For Language direct URL link
Route::get('/lang/{lang}', array(
    'Middleware' => 'LanguageSwitcher',
    'uses' => 'LanguageController@change',
))->name('langChange');
// .. End of Language Route


// Backend Routes
Auth::routes();

// default path after login
//Route::get('/admin', function () {
//    return redirect('/');
//});

//filters
Route::get('/filter/sections', 'filtersController@index')->name('filters');
Route::get('/filter/setting', 'filtersController@setting')->name('filters.setting');
Route::post('/filter/setting/store', 'filtersController@setting_store')->name('filters.setting.store');
Route::get('/filter/color', 'filtersController@color')->name('filters.color');
Route::get('/filter/weight', 'filtersController@weight')->name('filters.weight');
Route::get('filter/sections/create', 'filtersController@create')->name('create/filters');
Route::get('sub/filter/sections/create', 'filtersController@create_sub')->name('create/sub/filters');
Route::get('sub/filter/sections', 'filtersController@index_sub')->name('sub/filters');

// products and category and subcategory
Route::get('all/cat/products', 'CategoriesController@index')->name('categories');
Route::get('all/subcat/products', 'SubCategoriesController@subcat')->name('subcat');
Route::get('products', 'productsController@products')->name('products');
Route::get('create/category', 'CategoriesController@categories')->name('create/category');
Route::get('edit/category/{id}', 'CategoriesController@categories_edit')->name('edit.category');
Route::post('store/category', 'CategoriesController@store_categories')->name('store/category');
Route::get('delete/category/{id}', 'CategoriesController@delete_categories')->name('delete.category');
Route::post('/store/edit/category/{id}', 'productsController@store_edit_categories')->name('store.edit.category');
Route::get('create/subcategory', 'SubCategoriesController@subcategories')->name('create/subcategory');
Route::post('store/subcategory', 'SubCategoriesController@store_subcategories')->name('store.subcategory');
Route::get('edit/subcategory/{id}', 'SubCategoriesController@subcategories_edit')->name('edit.subcategory');
Route::get('delete/subcategory/{id}', 'SubCategoriesController@delete_subcategories')->name('delete.category');
Route::post('/store/edit/subcategory/{id}', 'SubCategoriesController@store_edit_subcategories')->name('store.edit.category');

//
Route::get('create/products', 'productsController@create_products')->name('create.products');
Route::post('store/products', 'productsController@store_products')->name('store.products');
Route::get('edit/products/{id}', 'productsController@edit_products')->name('edit.products');
Route::post('store/edit/products/{id}', 'productsController@store_edit__products')->name('store_edit.products');
Route::get('delete/products/{id}', 'productsController@delete_products')->name('delete.products');

Route::post('/products/{id}/photos', 'TopicsController@photos')->name('productsPhotosEdit');

// promo code
Route::get('promo/codes', 'PromoCodeController@index')->name('promo.code');
Route::get('promo/codes/create', 'PromoCodeController@create')->name('promo.code.create');
Route::post('promo/codes/store', 'PromoCodeController@store')->name('promo.code.store');
Route::get('promo/codes/edit/{id}', 'PromoCodeController@edit')->name('promo.code.edit');
Route::post('promo/codes/update/{id}', 'PromoCodeController@update')->name('promo.code.update');
Route::get('promo/codes/delete/{id}', 'PromoCodeController@delete')->name('promo.code.delete');



Route::Group(['prefix' => env('BACKEND_PATH')], function () {

    // No Permission
    Route::get('/403', function () {
        return view('errors.403');
    })->name('NoPermission');

    // Not Found
    Route::get('/404', function () {
        return view('errors.404');
    })->name('NotFound');

    // Admin Home
    Route::get('/admin', 'HomeController@index');
    //Search
    Route::get('/search', 'HomeController@search')->name('adminSearch');
    Route::post('/find', 'HomeController@find')->name('adminFind');

    // Webmaster
    Route::get('/webmaster', 'WebmasterSettingsController@edit')->name('webmasterSettings');
    Route::post('/webmaster', 'WebmasterSettingsController@update')->name('webmasterSettingsUpdate');

    // Webmaster Banners
    Route::get('/webmaster/banners', 'WebmasterBannersController@index')->name('WebmasterBanners');
    Route::get('/webmaster/banners/create', 'WebmasterBannersController@create')->name('WebmasterBannersCreate');
    Route::post('/webmaster/banners/store', 'WebmasterBannersController@store')->name('WebmasterBannersStore');
    Route::get('/webmaster/banners/{id}/edit', 'WebmasterBannersController@edit')->name('WebmasterBannersEdit');
    Route::post('/webmaster/banners/{id}/update', 'WebmasterBannersController@update')->name('WebmasterBannersUpdate');
    Route::get('/webmaster/banners/destroy/{id}',
        'WebmasterBannersController@destroy')->name('WebmasterBannersDestroy');
    Route::post('/webmaster/banners/updateAll',
        'WebmasterBannersController@updateAll')->name('WebmasterBannersUpdateAll');

    // Webmaster Sections
    Route::get('/webmaster/sections', 'WebmasterSectionsController@index')->name('WebmasterSections');
    Route::get('/webmaster/sections/create', 'WebmasterSectionsController@create')->name('WebmasterSectionsCreate');
    Route::post('/webmaster/sections/store', 'WebmasterSectionsController@store')->name('WebmasterSectionsStore');
    Route::get('/webmaster/sections/{id}/edit', 'WebmasterSectionsController@edit')->name('WebmasterSectionsEdit');
    Route::post('/webmaster/sections/{id}/update',
        'WebmasterSectionsController@update')->name('WebmasterSectionsUpdate');

    Route::post('/webmaster/sections/{id}/seo', 'WebmasterSectionsController@seo')->name('WebmasterSectionsSEOUpdate');

    Route::get('/webmaster/sections/destroy/{id}',
        'WebmasterSectionsController@destroy')->name('WebmasterSectionsDestroy');
    Route::post('/webmaster/sections/updateAll',
        'WebmasterSectionsController@updateAll')->name('WebmasterSectionsUpdateAll');

    // Webmaster Sections :Custom Fields
    Route::get('/webmaster/{webmasterId}/fields', 'WebmasterSectionsController@webmasterFields')->name('webmasterFields');
    Route::get('/{webmasterId}/fields/create', 'WebmasterSectionsController@fieldsCreate')->name('webmasterFieldsCreate');
    Route::post('/webmaster/{webmasterId}/fields/store', 'WebmasterSectionsController@fieldsStore')->name('webmasterFieldsStore');
    Route::get('/webmaster/{webmasterId}/fields/{field_id}/edit', 'WebmasterSectionsController@fieldsEdit')->name('webmasterFieldsEdit');
    Route::post('/webmaster/{webmasterId}/fields/{field_id}/update', 'WebmasterSectionsController@fieldsUpdate')->name('webmasterFieldsUpdate');
    Route::get('/webmaster/{webmasterId}/fields/destroy/{field_id}', 'WebmasterSectionsController@fieldsDestroy')->name('webmasterFieldsDestroy');
    Route::post('/webmaster/{webmasterId}/fields/updateAll', 'WebmasterSectionsController@fieldsUpdateAll')->name('webmasterFieldsUpdateAll');

    // Settings
    Route::get('/settings', 'SettingsController@edit')->name('settings');
    Route::post('/settings', 'SettingsController@updateSiteInfo')->name('settingsUpdateSiteInfo');
    Route::post('/settings/style', 'SettingsController@updateSiteStyle')->name('settingsUpdateSiteStyle');
    Route::post('/settings/status', 'SettingsController@updateSiteStatus')->name('settingsUpdateSiteStatus');
    Route::post('/settings/social', 'SettingsController@updateSocialLinks')->name('settingsUpdateSocialLinks');
    Route::post('/settings/contacts', 'SettingsController@updateContacts')->name('settingsUpdateContacts');

    // Ad. Banners
    Route::get('/banners', 'BannersController@index')->name('Banners');
    Route::get('/banners/create/{sectionId}', 'BannersController@create')->name('BannersCreate');
    Route::post('/banners/store', 'BannersController@store')->name('BannersStore');
    Route::get('/banners/{id}/edit', 'BannersController@edit')->name('BannersEdit');
    Route::post('/banners/{id}/update', 'BannersController@update')->name('BannersUpdate');
    Route::get('/banners/destroy/{id}', 'BannersController@destroy')->name('BannersDestroy');
    Route::post('/banners/updateAll', 'BannersController@updateAll')->name('BannersUpdateAll');

    // Sections
    Route::get('/{webmasterId}/sections', 'SectionsController@index')->name('sections');
    Route::get('/{webmasterId}/sections/create', 'SectionsController@create')->name('sectionsCreate');
    Route::post('/{webmasterId}/sections/store', 'SectionsController@store')->name('sectionsStore');
    Route::get('/{webmasterId}/sections/{id}/edit', 'SectionsController@edit')->name('sectionsEdit');
    Route::post('/{webmasterId}/sections/{id}/update', 'SectionsController@update')->name('sectionsUpdate');
    Route::post('/{webmasterId}/sections/{id}/seo', 'SectionsController@seo')->name('sectionsSEOUpdate');
    Route::get('/{webmasterId}/sections/destroy/{id}', 'SectionsController@destroy')->name('sectionsDestroy');
    Route::post('/{webmasterId}/sections/updateAll', 'SectionsController@updateAll')->name('sectionsUpdateAll');

    // Topics
    Route::get('/{webmasterId}/topics', 'TopicsController@index')->name('topics');
    Route::get('/{webmasterId}/topics/create', 'TopicsController@create')->name('topicsCreate');
    Route::post('/{webmasterId}/topics/store', 'TopicsController@store')->name('topicsStore');
    Route::get('/{webmasterId}/topics/{id}/edit', 'TopicsController@edit')->name('topicsEdit');
    Route::post('/{webmasterId}/topics/{id}/update', 'TopicsController@update')->name('topicsUpdate');
    Route::get('/{webmasterId}/topics/destroy/{id}', 'TopicsController@destroy')->name('topicsDestroy');
    Route::post('/{webmasterId}/topics/updateAll', 'TopicsController@updateAll')->name('topicsUpdateAll');
    // Topics :SEO
    Route::post('/{webmasterId}/topics/{id}/seo', 'TopicsController@seo')->name('topicsSEOUpdate');
    // Topics :Photos
    Route::post('/{webmasterId}/topics/{id}/photos', 'TopicsController@photos')->name('topicsPhotosEdit');
    Route::get('/{webmasterId}/topics/{id}/photos/{photo_id}/destroy',
        'TopicsController@photosDestroy')->name('topicsPhotosDestroy');
    Route::post('/{webmasterId}/topics/{id}/photos/updateAll',
        'TopicsController@photosUpdateAll')->name('topicsPhotosUpdateAll');

    // Topics :Files
    Route::get('/{webmasterId}/topics/{id}/files', 'TopicsController@topicsFiles')->name('topicsFiles');
    Route::get('/{webmasterId}/topics/{id}/files/create',
        'TopicsController@filesCreate')->name('topicsFilesCreate');
    Route::post('/{webmasterId}/topics/{id}/files/store',
        'TopicsController@filesStore')->name('topicsFilesStore');
    Route::get('/{webmasterId}/topics/{id}/files/{file_id}/edit',
        'TopicsController@filesEdit')->name('topicsFilesEdit');
    Route::post('/{webmasterId}/topics/{id}/files/{file_id}/update',
        'TopicsController@filesUpdate')->name('topicsFilesUpdate');
    Route::get('/{webmasterId}/topics/{id}/files/destroy/{file_id}',
        'TopicsController@filesDestroy')->name('topicsFilesDestroy');
    Route::post('/{webmasterId}/topics/{id}/files/updateAll',
        'TopicsController@filesUpdateAll')->name('topicsFilesUpdateAll');


    // Topics :Related
    Route::get('/{webmasterId}/topics/{id}/related', 'TopicsController@topicsRelated')->name('topicsRelated');
    Route::get('/relatedLoad/{id}', 'TopicsController@topicsRelatedLoad')->name('topicsRelatedLoad');
    Route::get('/{webmasterId}/topics/{id}/related/create',
        'TopicsController@relatedCreate')->name('topicsRelatedCreate');
    Route::post('/{webmasterId}/topics/{id}/related/store',
        'TopicsController@relatedStore')->name('topicsRelatedStore');
    Route::get('/{webmasterId}/topics/{id}/related/destroy/{related_id}',
        'TopicsController@relatedDestroy')->name('topicsRelatedDestroy');
    Route::post('/{webmasterId}/topics/{id}/related/updateAll',
        'TopicsController@relatedUpdateAll')->name('topicsRelatedUpdateAll');
    // Topics :Comments
    Route::get('/{webmasterId}/topics/{id}/comments', 'TopicsController@topicsComments')->name('topicsComments');
    Route::get('/{webmasterId}/topics/{id}/comments/create',
        'TopicsController@commentsCreate')->name('topicsCommentsCreate');
    Route::post('/{webmasterId}/topics/{id}/comments/store',
        'TopicsController@commentsStore')->name('topicsCommentsStore');
    Route::get('/{webmasterId}/topics/{id}/comments/{comment_id}/edit',
        'TopicsController@commentsEdit')->name('topicsCommentsEdit');
    Route::post('/{webmasterId}/topics/{id}/comments/{comment_id}/update',
        'TopicsController@commentsUpdate')->name('topicsCommentsUpdate');
    Route::get('/{webmasterId}/topics/{id}/comments/destroy/{comment_id}',
        'TopicsController@commentsDestroy')->name('topicsCommentsDestroy');
    Route::post('/{webmasterId}/topics/{id}/comments/updateAll',
        'TopicsController@commentsUpdateAll')->name('topicsCommentsUpdateAll');
    // Topics :Maps
    Route::get('/{webmasterId}/topics/{id}/maps', 'TopicsController@topicsMaps')->name('topicsMaps');
    Route::get('/{webmasterId}/topics/{id}/maps/create', 'TopicsController@mapsCreate')->name('topicsMapsCreate');
    Route::post('/{webmasterId}/topics/{id}/maps/store', 'TopicsController@mapsStore')->name('topicsMapsStore');
    Route::get('/{webmasterId}/topics/{id}/maps/{map_id}/edit', 'TopicsController@mapsEdit')->name('topicsMapsEdit');
    Route::post('/{webmasterId}/topics/{id}/maps/{map_id}/update',
        'TopicsController@mapsUpdate')->name('topicsMapsUpdate');
    Route::get('/{webmasterId}/topics/{id}/maps/destroy/{map_id}',
        'TopicsController@mapsDestroy')->name('topicsMapsDestroy');
    Route::post('/{webmasterId}/topics/{id}/maps/updateAll',
        'TopicsController@mapsUpdateAll')->name('topicsMapsUpdateAll');

    // Contacts Groups
    Route::post('/contacts/storeGroup', 'ContactsController@storeGroup')->name('contactsStoreGroup');
    Route::get('/contacts/{id}/editGroup', 'ContactsController@editGroup')->name('contactsEditGroup');
    Route::post('/contacts/{id}/updateGroup', 'ContactsController@updateGroup')->name('contactsUpdateGroup');
    Route::get('/contacts/destroyGroup/{id}', 'ContactsController@destroyGroup')->name('contactsDestroyGroup');
    // Contacts
    Route::get('/contacts/{group_id?}', 'ContactsController@index')->name('contacts');
    Route::post('/contacts/store', 'ContactsController@store')->name('contactsStore');
    Route::post('/contacts/search', 'ContactsController@search')->name('contactsSearch');
    Route::get('/contacts/{id}/edit', 'ContactsController@edit')->name('contactsEdit');
    Route::post('/contacts/{id}/update', 'ContactsController@update')->name('contactsUpdate');
    Route::get('/contacts/destroy/{id}', 'ContactsController@destroy')->name('contactsDestroy');
    Route::post('/contacts/updateAll', 'ContactsController@updateAll')->name('contactsUpdateAll');

    // WebMails Groups
    Route::post('/webmails/storeGroup', 'WebmailsController@storeGroup')->name('webmailsStoreGroup');
    Route::get('/webmails/{id}/editGroup', 'WebmailsController@editGroup')->name('webmailsEditGroup');
    Route::post('/webmails/{id}/updateGroup', 'WebmailsController@updateGroup')->name('webmailsUpdateGroup');
    Route::get('/webmails/destroyGroup/{id}', 'WebmailsController@destroyGroup')->name('webmailsDestroyGroup');
    // WebMails
    Route::post('/webmails/store', 'WebmailsController@store')->name('webmailsStore');
    Route::post('/webmails/search', 'WebmailsController@search')->name('webmailsSearch');
    Route::get('/webmails/{id}/edit', 'WebmailsController@edit')->name('webmailsEdit');
    Route::get('/webmails/{group_id?}/{wid?}/{stat?}/{contact_email?}', 'WebmailsController@index')->name('webmails');
    Route::post('/webmails/{id}/update', 'WebmailsController@update')->name('webmailsUpdate');
    Route::get('/webmails/destroy/{id}', 'WebmailsController@destroy')->name('webmailsDestroy');
    Route::post('/webmails/updateAll', 'WebmailsController@updateAll')->name('webmailsUpdateAll');

    // Calendar
    Route::get('/calendar', 'EventsController@index')->name('calendar');
    Route::get('/calendar/create', 'EventsController@create')->name('calendarCreate');
    Route::post('/calendar/store', 'EventsController@store')->name('calendarStore');
    Route::get('/calendar/{id}/edit', 'EventsController@edit')->name('calendarEdit');
    Route::post('/calendar/{id}/update', 'EventsController@update')->name('calendarUpdate');
    Route::get('/calendar/destroy/{id}', 'EventsController@destroy')->name('calendarDestroy');
    Route::get('/calendar/updateAll', 'EventsController@updateAll')->name('calendarUpdateAll');
    Route::post('/calendar/{id}/extend', 'EventsController@extend')->name('calendarExtend');

    // Analytics
    Route::get('/ip/{ip_code?}', 'AnalyticsController@ip')->name('visitorsIP');
    Route::post('/ip/search', 'AnalyticsController@search')->name('visitorsSearch');
    Route::post('/analytics/{stat}', 'AnalyticsController@filter')->name('analyticsFilter');
    Route::get('/analytics/{stat?}', 'AnalyticsController@index')->name('analytics');
    Route::get('/visitors', 'AnalyticsController@visitors')->name('visitors');

    // Users & Permissions
    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/users/create/', 'UsersController@create')->name('usersCreate');
    Route::post('/users/store', 'UsersController@store')->name('usersStore');
    Route::get('/users/{id}/edit', 'UsersController@edit')->name('usersEdit');
    Route::post('/users/{id}/update', 'UsersController@update')->name('usersUpdate');
    Route::get('/users/destroy/{id}', 'UsersController@destroy')->name('usersDestroy');
    Route::post('/users/updateAll', 'UsersController@updateAll')->name('usersUpdateAll');

    Route::get('/users/permissions/create/', 'UsersController@permissions_create')->name('permissionsCreate');
    Route::post('/users/permissions/store', 'UsersController@permissions_store')->name('permissionsStore');
    Route::get('/users/permissions/{id}/edit', 'UsersController@permissions_edit')->name('permissionsEdit');
    Route::post('/users/permissions/{id}/update', 'UsersController@permissions_update')->name('permissionsUpdate');
    Route::get('/users/permissions/destroy/{id}', 'UsersController@permissions_destroy')->name('permissionsDestroy');


    // Menus
    Route::post('/menus/store/parent', 'MenusController@storeMenu')->name('parentMenusStore');
    Route::get('/menus/parent/{id}/edit', 'MenusController@editMenu')->name('parentMenusEdit');
    Route::post('/menus/{id}/update/{ParentMenuId}', 'MenusController@updateMenu')->name('parentMenusUpdate');
    Route::get('/menus/parent/destroy/{id}', 'MenusController@destroyMenu')->name('parentMenusDestroy');

    Route::get('/menus/{ParentMenuId?}', 'MenusController@index')->name('menus');
    Route::get('/menus/create/{ParentMenuId?}', 'MenusController@create')->name('menusCreate');
    Route::post('/menus/store/{ParentMenuId?}', 'MenusController@store')->name('menusStore');
    Route::get('/menus/{id}/edit/{ParentMenuId?}', 'MenusController@edit')->name('menusEdit');
    Route::post('/menus/{id}/update', 'MenusController@update')->name('menusUpdate');
    Route::get('/menus/destroy/{id}', 'MenusController@destroy')->name('menusDestroy');
    Route::post('/menus/updateAll', 'MenusController@updateAll')->name('menusUpdateAll');

});

// .. End of Backend Routes

// RESTful API routes
Route::Group(['prefix' => '/api/v1'], function () {
    Route::get('/', 'APIsController@api');
    // general
    Route::get('/website/status', 'APIsController@website_status');
    Route::get('/website/info/{lang?}', 'APIsController@website_info');
    Route::get('/website/contacts/{lang?}', 'APIsController@website_contacts');
    Route::get('/website/style/{lang?}', 'APIsController@website_style');
    Route::get('/website/social', 'APIsController@website_social');
    Route::get('/website/settings', 'APIsController@website_settings');
    Route::get('/menu/{menu_id}/{lang?}', 'APIsController@menu');
    Route::get('/banners/{group_id}/{lang?}', 'APIsController@banners');
    // section & topics
    Route::get('/section/{section_id}/{lang?}', 'APIsController@section');
    Route::get('/categories/{section_id}/{lang?}', 'APIsController@categories');
    Route::get('/topics/{section_id}/page/{page_number?}/count/{topics_count?}/{lang?}', 'APIsController@topics');
    // topic sub details
    Route::get('/topic/fields/{topic_id}/{lang?}', 'APIsController@topic_fields');
    Route::get('/topic/photos/{topic_id}/{lang?}', 'APIsController@topic_photos');
    Route::get('/topic/photo/{photo_id}/{lang?}', 'APIsController@topic_photo');
    Route::get('/topic/maps/{topic_id}/{lang?}', 'APIsController@topic_maps');
    Route::get('/topic/map/{map_id}/{lang?}', 'APIsController@topic_map');
    Route::get('/topic/files/{topic_id}/{lang?}', 'APIsController@topic_files');
    Route::get('/topic/file/{file_id}/{lang?}', 'APIsController@topic_file');
    Route::get('/topic/comments/{topic_id}/{lang?}', 'APIsController@topic_comments');
    Route::get('/topic/comment/{comment_id}/{lang?}', 'APIsController@topic_comment');
    Route::get('/topic/related/{topic_id}/{lang?}', 'APIsController@topic_related');
    // topic page
    Route::get('/topic/{topic_id}/{lang?}', 'APIsController@topic');
    // user topics
    Route::get('/user/{user_id}/topics/page/{page_number?}/count/{topics_count?}/{lang?}', 'APIsController@user_topics');
    // Forms Submit
    Route::post('/subscribe', 'APIsController@subscribeSubmit');
    Route::post('/comment', 'APIsController@commentSubmit');
    Route::post('/order', 'APIsController@orderSubmit');
    Route::post('/contact', 'APIsController@ContactPageSubmit');
});
// .. End of RESTful API routes


// Frontend Routes
// ../site map
Route::get('/sitemap.xml', 'SiteMapController@siteMap')->name('siteMap');
Route::get('/{lang}/sitemap', 'SiteMapController@siteMap')->name('siteMapByLang');

Route::get('/', 'FrontendHomeController@HomePage')->name('Home');
// ../home url
Route::get('/home', 'FrontendHomeController@HomePage')->name('HomePage');
Route::get('/{lang?}/home', 'FrontendHomeController@HomePageByLang')->name('HomePageByLang');
// ../subscribe to newsletter submit  (ajax url)
Route::post('/subscribe', 'FrontendHomeController@subscribeSubmit')->name('subscribeSubmit');
// ../Comment submit  (ajax url)
Route::post('/comment', 'FrontendHomeController@commentSubmit')->name('commentSubmit');
// ../Order submit  (ajax url)
Route::post('/order', 'FrontendHomeController@orderSubmit')->name('orderSubmit');
// ..Custom URL for contact us page ( www.site.com/contact )
Route::get('/contact', 'FrontendHomeController@ContactPage')->name('contactPage');
Route::get('/{lang?}/contact', 'FrontendHomeController@ContactPageByLang')->name('contactPageByLang');
// ../contact message submit  (ajax url)
Route::post('/contact/submit', 'FrontendHomeController@ContactPageSubmit')->name('contactPageSubmit');
// ..if page by name ( ex: www.site.com/about )
Route::get('/topic/{id}', 'FrontendHomeController@topic')->name('FrontendPage');
// ..if page by user id ( ex: www.site.com/user )
Route::get('/user/{id}', 'FrontendHomeController@userTopics')->name('FrontendUserTopics');
Route::get('/{lang?}/user/{id}', 'FrontendHomeController@userTopicsByLang')->name('FrontendUserTopicsByLang');
// ../search
Route::post('/search', 'FrontendHomeController@searchTopics')->name('searchTopics');

// ..Topics url  ( ex: www.site.com/news/topic/32 )
Route::get('/{section}/topic/{id}', 'FrontendHomeController@topic')->name('FrontendTopic');
Route::get('/{lang?}/{section}/topic/{id}', 'FrontendHomeController@topicByLang')->name('FrontendTopicByLang');

// ..Sub category url for Section  ( ex: www.site.com/products/2 )
Route::get('/{section}/{cat}', 'FrontendHomeController@topics')->name('FrontendTopicsByCat');
Route::get('/{lang?}/{section}/{cat}', 'FrontendHomeController@topicsByLang')->name('FrontendTopicsByCatWithLang');

// ..Section url by name  ( ex: www.site.com/news )
Route::get('/{section}', 'FrontendHomeController@topics')->name('FrontendTopics');
Route::get('/{lang?}/{section}', 'FrontendHomeController@topicsByLang')->name('FrontendTopicsByLang');

// ..SEO url  ( ex: www.site.com/title-here )
Route::get('/{seo_url_slug}', 'FrontendHomeController@SEO')->name('FrontendSEO');
Route::get('/{lang?}/{seo_url_slug}', 'FrontendHomeController@SEOByLang')->name('FrontendSEOByLang');

// ..if page by name and language( ex: www.site.com/ar/about )
Route::get('/{lang?}/topic/{id}', 'FrontendHomeController@topicByLang')->name('FrontendPageByLang');

// .. End of Frontend Route
/*
 !! Important note:
    For new routes add them before // Frontend Routes
    If you added them after Frontend Routes they wouldn't work.
 */
