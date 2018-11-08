<?php

Route::get('/', [
    'uses'  => 'BigStoreController@index',
    'as'    => '/'
]);

Route::get('/contact-us', [
    'uses'  => 'BigStoreController@contactUs',
    'as'    => 'contact'
]);

Route::get('/category-product/{id}', [
    'uses'  => 'BigStoreController@categoryProduct',
    'as'    => 'category-product'
]);

Route::get('/product-details/{id}', [
    'uses'  => 'BigStoreController@productDetails',
    'as'    => 'product-details'
]);

Route::post('/add-to-cart', [
    'uses'  => 'CartController@addToCart',
    'as'    => 'add-to-cart'
]);

Route::get('/show-cart', [
    'uses'  => 'CartController@showCart',
    'as'    => 'show-cart'
]);

Route::get('/delete-cart-product/{id}', [
    'uses'  => 'CartController@deleteCartProduct',
    'as'    => 'delete-cart-product'
]);
Route::post('/update-cart', [
    'uses'  => 'CartController@updateCartProduct',
    'as'    => 'update-cart'
]);


Route::get('/checkout', [
    'uses'  => 'CheckoutController@index',
    'as'    => 'checkout'
]);
Route::post('/checkout/customer-registration', [
    'uses'  => 'CheckoutController@saveCustomerInfo',
    'as'    => 'new-customer'
]);
Route::get('/checkout/show-shipping', [
    'uses'  => 'CheckoutController@showShippingInfo',
    'as'    => 'show-shipping',

]);
Route::post('/checkout/save-shipping', [
    'uses'  => 'CheckoutController@saveShippingInfo',
    'as'    => 'new-shipping',
]);

Route::get('/checkout/show-payment', [
    'uses'  => 'CheckoutController@showPaymentInfo',
    'as'    => 'show-payment',
]);

Route::post('/checkout/new-order', [
    'uses'  => 'CheckoutController@saveOrderInfo',
    'as'    => 'new-order'
]);

Route::get('/checkout/complete-order', [
    'uses'  => 'CheckoutController@completeOrderInfo',
    'as'    => 'complete-order'
]);

Route::get('/customer-logout', [
    'uses'  => 'CheckoutController@customerLogout',
    'as'    => 'customer-logout'
]);
Route::post('/customer-login', [
    'uses'  => 'CheckoutController@customerLogin',
    'as'    => 'customer-login'
]);

Route::get('/order/manage-order', [
    'uses'  => 'OrderController@manageOrder',
    'as'    => 'manage-order'
]);

Route::get('/order/view-order-detail/{id}', [
    'uses'  => 'OrderController@viewOrderDetail',
    'as'    => 'view-order-detail'
]);

Route::get('/order/view-order-invoice/{id}', [
    'uses'  => 'OrderController@viewOrderInvoice',
    'as'    => 'view-order-invoice'
]);

Route::get('/order/download-invoice/{id}', [
    'uses'  => 'OrderController@downloadOrderInvoice',
    'as'    => 'download-invoice'
]);





//
//Route::group(['middleware' => 'bitm'], function () {
//
//
//
//
//});
//








Route::get('/category/add', [
    'uses'  => 'CategoryController@index',
    'as'    => 'add-category'
]);


Route::get('/category/manage', [
    'uses'  => 'CategoryController@manageCategory',
    'as'    => 'manage-category'
]);

Route::post('/category/save', [
    'uses'  => 'CategoryController@saveCategory',
    'as'    => 'new-category'
]);

Route::get('/category/unpublished/{id}', [
    'uses'  => 'CategoryController@unpublishedCategory',
    'as'    => 'unpublished-category'
]);

Route::get('/category/published/{id}', [
    'uses'  => 'CategoryController@publishedCategory',
    'as'    => 'published-category'
]);

Route::get('/category/edit/{id}', [
    'uses'  => 'CategoryController@editCategory',
    'as'    => 'edit-category'
]);

Route::post('/category/update', [
    'uses'  => 'CategoryController@updateCategory',
    'as'    => 'update-category'
]);

Route::get('/category/delete/{id}', [
    'uses'  => 'CategoryController@deleteCategory',
    'as'    => 'delete-category'
]);

Route::get('/brand/add', [
    'uses'  => 'BrandController@index',
    'as'    => 'add-brand'
]);

Route::get('/brand/manage', [
    'uses'  => 'BrandController@manageBrand',
    'as'    => 'manage-brand'
]);

Route::post('/brand/save', [
    'uses'  => 'BrandController@saveBrand',
    'as'    => 'new-brand'
]);

Route::get('/product/add', [
    'uses'  => 'ProductController@index',
    'as'    => 'add-product'
]);

Route::get('/product/manage', [
    'uses'  => 'ProductController@manageProduct',
    'as'    => 'manage-product'
]);

Route::post('/product/save', [
    'uses'  => 'ProductController@saveProduct',
    'as'    => 'new-product'
]);

Route::get('/product/view/{id}', [
    'uses'  => 'ProductController@viewProduct',
    'as'    => 'view-product'
]);

Route::get('/product/edit/{id}', [
    'uses'  => 'ProductController@editProduct',
    'as'    => 'edit-product'
]);
Route::post('/product/update', [
    'uses'  => 'ProductController@updateProduct',
    'as'    => 'update-product'
]);
















Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
