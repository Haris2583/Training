<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\EmployerJobController;
use App\Http\Controllers\JobSeekerController;
use App\Models\Application;
use App\Events\ApplicationCreated;
use App\Models\Practice;
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
use App\Models\User;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/store', [ProductController::class, 'store'])->name('products.store');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
});

Route::middleware(['auth', 'role:employer'])->group(function () {
    Route::get('/employer/dashboard', function () {
        return view('employer.dashboard');
    })->name('employer.dashboard');
    Route::post('/employer/logout', [AuthenticatedSessionController::class, 'destroy'])->name('employer.logout');
});

Route::middleware(['auth', 'role:job_seeker'])->group(function () {
    Route::get('/job_seeker/dashboard', function () {
        return view('job_seeker.dashboard');
    })->name('job_seeker.dashboard');
    Route::post('/job_seeker/logout', [AuthenticatedSessionController::class, 'destroy'])->name('job_seeker.logout');
});


Route::middleware(['auth', 'role:employer'])->group(function () {
    // Employer routes
    Route::get('/employer/jobs', [EmployerJobController::class, 'index'])->name('employer.jobs.index');
    Route::get('/employer/jobs/create', [EmployerJobController::class, 'create'])->name('employer.jobs.create');
    Route::post('/employer/jobs', [EmployerJobController::class, 'store'])->name('employer.jobs.store');
    Route::get('/employer/jobs/{job}/edit', [EmployerJobController::class, 'edit'])->name('employer.jobs.edit');
    Route::put('/employer/jobs/{job}', [EmployerJobController::class, 'update'])->name('employer.jobs.update');
    Route::delete('/employer/jobs/{job}', [EmployerJobController::class, 'destroy'])->name('employer.jobs.destroy');
    Route::get('/employer/jobs/{job}/applications', [EmployerJobController::class, 'showApplications'])->name('employer.jobs.applications');
    Route::get('/employer/applications/{application}', [EmployerJobController::class, 'showApplicationDetails'])->name('employer.applications.details');
    Route::get('/employer/candidates/search', [EmployerJobController::class, 'searchCandidates'])->name('employer.candidates.search');
    Route::get('/employer/candidates/results', [EmployerJobController::class, 'displayCandidates'])->name('employer.candidates.results');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/jobs', [PostJobController::class, 'index'])->name('admin.jobs.index');
    Route::post('/admin/jobs/{job}/approve', [PostJobController::class, 'approve'])->name('jobs.approve');
    Route::post('/admin/jobs/{job}/reject', [PostJobController::class, 'reject'])->name('jobs.reject');
    Route::get('/admin/users', [PostJobController::class, 'manageUsers'])->name('admin.manage_users');
    Route::get('/admin/users/{id}/edit', [PostJobController::class, 'editUser'])->name('admin.edit_user');
    Route::post('/admin/users/{id}/update', [PostJobController::class, 'updateUser'])->name('admin.update_user');
    Route::delete('/admin/users/{id}/delete', [PostJobController::class, 'deleteUser'])->name('admin.delete_user');
});


Route::middleware(['auth', 'role:job_seeker'])->group(function () {
    Route::get('/job_seeker/dashboard', [JobSeekerController::class, 'index'])->name('job_seeker.dashboard');
    Route::get('/job/{job}', [JobSeekerController::class, 'show'])->name('job.show');
    Route::get('/job/{job}/apply', [JobSeekerController::class, 'apply'])->name('job.apply');
    Route::post('/job/{job}/apply', [JobSeekerController::class, 'store'])->name('job.store');
    Route::get('/job_seeker/dashboard/applications', [JobSeekerController::class, 'myApplications'])->name('job_seeker.applications');
    Route::get('/job_seeker/profile', [JobSeekerController::class, 'profile'])->name('job_seeker.profile');
    Route::post('/job_seeker/update-password', [JobSeekerController::class, 'updatePassword'])->name('job_seeker.update_password');
});





Route::get('/test-listener', function () {
    $application = Application::first(); // Replace with an actual application ID
    event(new ApplicationCreated($application));

    return 'Listener tested!';
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
