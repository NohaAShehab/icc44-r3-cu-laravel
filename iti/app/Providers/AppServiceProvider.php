<?php

namespace App\Providers;

use App\Policies\StudentPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\Student;
use App\Models\User;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();

        # define gates ??
        Gate::define('delete-student', function (User $user, Student $student) {
            return $user->id === $student->creator_id;
        });

        # register policy
        Gate::policy(Student::class, StudentPolicy::class);

    }
}
