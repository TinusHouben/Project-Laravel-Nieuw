<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

//homepagina
Route::get('/', [IndexController::class, 'showNews'])->name('index');


Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//profielpagina
Route::get('/mijn-profiel', [ProfilePageController::class, 'myProfile'])
    ->middleware('auth')
    ->name('profile.myProfile');

//profiel aanpassen
Route::get('/mijn-profiel/bewerken', [ProfilePageController::class, 'edit'])
    ->middleware('auth')
    ->name('profile.edit');

Route::patch('/mijn-profiel/bewerken', [ProfilePageController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update');


//gebuikersbeheer
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('admin.userIndex');
});

//rol aanpassen
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('admin.userIndex');
    Route::patch('/admin/{user}/role', [UserController::class, 'updateRole'])->name('admin.updateRole');
});

//gebruiker aanmaken
Route::post('/admin', [UserController::class, 'store'])->name('admin.store');

//nieuwsitems
//voor standaard gebruikers
Route::get('/nieuws', [NewsController::class, 'index'])->name('news.index');
Route::get('/nieuws/{news}', [NewsController::class, 'show'])->name('news.show');

//voor admins
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/nieuws', [NewsController::class, 'newsIndex'])->name('news.newsIndex');
    Route::get('/admin/nieuws/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/admin/nieuws', [NewsController::class, 'store'])->name('news.store');
    Route::get('/admin/nieuws/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/admin/nieuws/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/admin/nieuws/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});


// Publieke FAQ-pagina
Route::get('/faq', [FaqController::class, 'index'])->name('faq.public');

// Adminbeheer van FAQ
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    //opties voor beheren van faq items
    Route::get('/admin/faq', [FaqController::class, 'adminIndex'])->name('faq.adminIndex');
    Route::get('/admin/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/admin/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/admin/faq/{faq}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::put('/admin/faq/{faq}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/admin/faq/{faq}', [FaqController::class, 'destroy'])->name('faq.destroy');

    //opties voor beheren van categorieën
    Route::get('/admin/faq/categories/create', [FaqCategoryController::class, 'create'])->name('faq.categories.create');
    Route::post('/admin/faq/categories', [FaqCategoryController::class, 'store'])->name('faq.categories.store');
    Route::get('/admin/faq/categories', [FaqCategoryController::class, 'index'])->name('faq.categories.index');
    Route::get('/admin/faq/categories/{category}/edit', [FaqCategoryController::class, 'edit'])->name('faq.categories.edit');
    Route::put('/admin/faq/categories/{category}', [FaqCategoryController::class, 'update'])->name('faq.categories.update');
    Route::delete('/admin/faq/categories/{category}', [FaqCategoryController::class, 'destroy'])->name('faq.categories.destroy');
});

//contactpagina voor gebruikers
Route::middleware(['auth'])->group(function () {
    Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});

//contactpagina voor admins
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact.index');
});