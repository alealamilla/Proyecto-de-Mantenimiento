<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Color;
use App\Models\Owner;
use App\Models\Reception;
use App\Models\Service;
use App\Models\Sparepart;
use App\Models\Status;
use App\Models\Type;
use App\Models\User;
use App\Models\Work;
use App\Observers\BrandObserver;
use App\Observers\CarObserver;
use App\Observers\ColorObserver;
use App\Observers\OwnerObserver;
use App\Observers\ReceptionObserver;
use App\Observers\ServiceObserver;
use App\Observers\SparepartObserver;
use App\Observers\StatusObserver;
use App\Observers\TypeObserver;
use App\Observers\UserObserver;
use App\Observers\WorkObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
        Status::observe(StatusObserver::class);
        Brand::observe(BrandObserver::class);
        Color::observe(ColorObserver::class);
        Type::observe(TypeObserver::class);
        Service::observe(ServiceObserver::class);
        Sparepart::observe(SparepartObserver::class);
        Owner::observe(OwnerObserver::class);
        Car::observe(CarObserver::class);
        Reception::observe(ReceptionObserver::class);
        Work::observe(WorkObserver::class);
        
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
