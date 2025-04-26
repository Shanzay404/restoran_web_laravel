<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TeamMembersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;

Route::get('/', function () {
   return view('Admin.pages.dashboard');
})->name('dashboard');



Route::get('view-tag', [TagController::class, 'view'])->name('tag.view');
Route::get('add-tag', [TagController::class, 'add'])->name('tag.add');
Route::post('store-tag', [TagController::class, 'store'])->name('tag.store');
Route::get('edit-tag/{id}', [TagController::class, 'edit'])->name('tag.edit');
Route::put('update-tag/{id}', [TagController::class, 'update'])->name('tag.update');
Route::delete('destroy-tag/{id}', [TagController::class, 'destroy'])->name('tag.destroy');

Route::get('view-service', [ServiceController::class, 'view'])->name('service.view');
Route::get('add-service', [ServiceController::class, 'add'])->name('service.add');
Route::post('store-service', [ServiceController::class, 'store'])->name('service.store');
Route::get('show-service/{id}', [ServiceController::class, 'show'])->name('service.show');
Route::get('edit-service/{id}', [ServiceController::class, 'edit'])->name('service.edit');
Route::put('update-service/{id}', [ServiceController::class, 'update'])->name('service.update');
Route::delete('destroy-service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

Route::get('view-member', [TeamMembersController::class, 'view'])->name('member.view');
Route::get('add-member', [TeamMembersController::class, 'add'])->name('member.add');
Route::post('store-member', [TeamMembersController::class, 'store'])->name('member.store');
Route::get('show-member/{id}', [TeamMembersController::class, 'show'])->name('member.show');
Route::get('edit-member/{id}', [TeamMembersController::class, 'edit'])->name('member.edit');
Route::put('update-member/{id}', [TeamMembersController::class, 'update'])->name('member.update');
Route::delete('destroy-member/{id}', [TeamMembersController::class, 'destroy'])->name('member.destroy');


Route::get('view-category', [CategoryController::class, 'view'])->name('category.view');
Route::get('add-category', [CategoryController::class, 'add'])->name('category.add');
Route::post('store-category', [CategoryController::class, 'store'])->name('category.store');
Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('destroy-category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::put('status-change/{id}', [CategoryController::class, 'status'])->name('category.changeStatus');

Route::get('view-item', [ItemController::class, 'view'])->name('item.view');
Route::get('add-item', [ItemController::class, 'add'])->name('item.add');
Route::get('show-item/{id}', [ItemController::class, 'show'])->name('item.show');
Route::post('store-item', [ItemController::class, 'store'])->name('item.store');
Route::get('edit-item/{id}', [ItemController::class, 'edit'])->name('item.edit');
Route::put('update-item/{id}', [ItemController::class, 'update'])->name('item.update');
Route::delete('destroy-item/{id}', [ItemController::class, 'destroy'])->name('item.destroy');

Route::get('contact', [ContactController::class, 'view'])->name('contact.view');
Route::post('store-Contact', [ContactController::class, 'store'])->name('index.storeContact');
Route::get('show-detail/{id}', [ContactController::class, 'show'])->name('contact.show');
Route::delete('destory-contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

// frontend routes

Route::get('index', [HomeController::class, 'view'])->name('index.view');
Route::get('about-us', [HomeController::class, 'about'])->name('index.about');
Route::get('services', [HomeController::class, 'service'])->name('index.service');
Route::get('menu', [HomeController::class, 'menu'])->name('index.menu');
Route::get('team', [HomeController::class, 'team'])->name('index.team');
Route::get('testimonials', [HomeController::class, 'testimonials'])->name('index.testimonials');
Route::get('contact-us', [HomeController::class, 'contact'])->name('index.contact');
Route::get('booking', [HomeController::class, 'booking'])->name('index.booking');

Route::post('store-booking', [BookingController::class, 'store'])->name('index.storeBooking');
Route::get('view-booking', [BookingController::class, 'view'])->name('booking.view');
Route::get('show-booking/{id}', [BookingController::class, 'show'])->name('booking.show');
Route::delete('destroy-booking', [BookingController::class, 'destroy'])->name('booking.destroy');
Route::put('change-status/{id}', [BookingController::class, 'status'])->name('booking.changeStatus');

Route::get('view-testimonial', [TestimonialController::class, 'view'])->name('testimonial.view');
Route::get('add-testimonial', [TestimonialController::class, 'add'])->name('testimonial.add');
Route::post('store-testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
// Route::get('show-testimonial/{id}', [TestimonialController::class, 'show'])->name('testimonial.show');
Route::delete('destroy-testimonial/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');


Route::get('view-about', [AboutUsController::class, 'view'])->name('about.index');
Route::post('store-about', [AboutUsController::class, 'store'])->name('about.store');
Route::put('update-about/{id}', [AboutUsController::class, 'update'])->name('about.update');




