<?php

use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\BlindController;
use App\Http\Controllers\HelpRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserType;
use App\Models\HelpRequest;

Route::get('/', function () {
    return view('landing.master');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/select', function () {
    return view('sign_in_up.account_type');
});

Route::resource('/register/volunteer',VolunteerController::class);
Route::resource('/register/blind',BlindController::class);



// Route::get('/blind/dashboard', function () {
//     return view('layout.dashb');
// })->name('blind.dashboard')->middleware(CheckUserType::class);

// Route::get('/volunteer/dashboard', function () {
//     return view('layoutv.dashv');
// })->name('volunteer.dashboard');



// حماية route المكفوفين
Route::middleware(['auth', 'checkUserType:blind'])->group(function () {
   // Route::get('/blind/dashboard', function () {return view('layout.dashb');})->name('blind.dashboard');
    Route::get('/blinds', [BlindController::class, 'index'])->name('blinds.index');
    Route::get('/profileBlind', [BlindController::class, 'show'])->name('blinds.profile');
    //Route::post('/profileBlind/update', [BlindController::class, 'update'])->name('blinds.profile.update');
    Route::put('/profileBlind', [BlindController::class, 'update'])->name('blinds.profile.update');
    Route::put('/blind/password/update', [PasswordController::class, 'update'])->name('blinds.password.update');
    Route::get('/volunteer/{encryptedId}', [BlindController::class, 'showvolunteer'])->name('showvolunteer.profile');

    Route::get('/HelpRequest/create', [HelpRequestController::class, 'create'])->name('help.request.create');
    Route::post('/help-request/store', [HelpRequestController::class, 'store'])->name('help.request.store');
    Route::get('/my-help-request', [HelpRequestController::class, 'userRequests'])->name('my.help.request');



    Route::get('/help-request/{encryptedId}/edit', [HelpRequestController::class, 'edit'])->name('help.request.edit');
    Route::put('/help-request/update', [HelpRequestController::class, 'update'])->name('help.request.update');
    Route::delete('/help-request/{id}', [HelpRequestController::class, 'destroy'])->name('help.request.destroy');

    Route::post('/send-help-request/{encryptedId}/{encryptedBlindId}', [HelpRequestController::class, 'sendHelpRequest'])->name('send.help.request');

    Route::get('/search-volunteers', [BlindController::class, 'search'])->name('search.volunteers');


});

// حماية route المتطوعين
Route::middleware(['auth', 'checkUserType:volunteer'])->group(function () {
   // Route::get('/volunteer/dashboard', function () {return view('layoutv.dashv');})->name('volunteer.dashboard');
    Route::get('/volunteers', [VolunteerController::class, 'index'])->name('volunteers.index');

    Route::get('/profileVolunteer', [VolunteerController::class, 'show'])->name('volunteer.profile');
    Route::post('/profileVolunteer/update', [VolunteerController::class, 'update'])->name('volunteer.profile.update');
    Route::put('/profileVolunteer', [VolunteerController::class, 'update'])->name('volunteer.profile.update');
    Route::put('/volunteer/password/update', [PasswordController::class, 'update'])->name('volunteer.password.update');
    Route::get('/blind/{encryptedId}', [VolunteerController::class, 'showblind'])->name('blind.profile');


    Route::get('/help-requests/pending', [HelpRequestController::class, 'pendingRequests'])->name('help.requests.pending');
    Route::get('/help-requests/in-progress', [HelpRequestController::class, 'inProgressRequests'])->name('help.requests.in.progress');
    Route::get('/help-requests/{encryptedId}', [HelpRequestController::class, 'show'])->name('help.request.show');


    Route::get('/search-blind', [VolunteerController::class, 'search'])->name('search.blind');


    Route::post('/assistance/approve/{volunteerId}/{blindId}/{requestId}', [AssistanceController::class, 'approveAssistance'])->name('assistance.approve');
    Route::post('/assistance/complete/{id}', [AssistanceController::class, 'completeAssistance'])->name('assistance.complete');


});
Route::get('/blind/{encryptedId}', [VolunteerController::class, 'showblind'])->name('blind.profile');


// // حماية route الأدمن
// Route::middleware(['auth', 'checkUserType:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });

// Route::get('volunteer-edit/{id}', [VolunteerController::class,'edit'])->name('volunteer.edit');
//Route::get('/volunteer/{volunteer}/edit', [VolunteerController::class, 'edit'])->name('volunteer.edit');

require __DIR__.'/auth.php';





// Route::get('/login', function () {
//     return view('login.login');
// });



// Route::get('/rigester', function () {
//     return view('login.rigester');
// });

// Route::get('/rigesterb', function () {
//     return view('login.rigesterb');
// });

// // Route::get('/bar', function () {
// //     return view('bar.layout');
// // });





// Route::get('/', function () {
//     return view('landing.master');
// });


// Route::get('/dashb', function () {
//     return view('layout.dashb');
// });
// Route::get('/postb', function () {
//     return view('layout.postb');
// });

// Route::get('/profileb', function () {
//     return view('layout.profileb');
// });
// Route::get('/profilevb', function () {
//     return view('layout.profilev');
// });
// Route::get('/addpost', function () {
//     return view('layout.addpost');
// });
// Route::get('/editpost', function () {
//     return view('layout.editpost');
// });





// Route::get('/dashv', function () {
//     return view('layoutv.dashv');
// });
// Route::get('/allposts', function () {
//     return view('layoutv.allposts');
// });
// Route::get('/myposts', function () {
//     return view('layoutv.myposts');
// });
 Route::get('/profilev', function () {
     return view('layoutv.profilev');
 });

// Route::get('/volunteer/{id}/edit', [VolunteerController::class, 'edit'])->name('volunteer.edit');

// Route::get('/profileb', function () {
//     return view('layoutv.profileb');
// });
// Route::get('/more', function () {
//     return view('layoutv.more');
// });
