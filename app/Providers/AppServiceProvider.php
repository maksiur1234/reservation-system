<?php

namespace App\Providers;

use App\Http\Repositories\Booking\BookingRepository;
use App\Http\Repositories\Booking\BookingRepositoryInterface;
use App\Http\Services\Notification\BookingNotificationService;
use App\Http\Services\Booking\BookingServiceInterface;
use App\Http\Services\Booking\BookingService;
use App\Http\Services\Notification\BookingNotificationServiceInterface;
use App\Models\Service\Service;
use App\Policies\Service\ServicePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(BookingServiceInterface::class, BookingService::class);
        $this->app->bind(BookingNotificationServiceInterface::class, BookingNotificationService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Service::class, ServicePolicy::class);
    }
}
