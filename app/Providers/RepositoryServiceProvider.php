<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected static $repositories = [
        'user' => [
            \App\Contracts\UserRepository::class,
            \App\Repositories\UserRepositoryEloquent::class,
        ],
        'movie' => [
            \App\Contracts\MovieRepository::class,
            \App\Repositories\MovieRepositoryEloquent::class,
        ],
        'cinema' => [
            \App\Contracts\CinemaRepository::class,
            \App\Repositories\CinemaRepositoryEloquent::class,
        ],
        'type' => [
            \App\Contracts\TypeRepository::class,
            \App\Repositories\TypeRepositoryEloquent::class,
        ],
        'media' => [
            \App\Contracts\MediaRepository::class,
            \App\Repositories\MediaRepositoryEloquent::class,
        ],
        'movie_type' => [
            \App\Contracts\MovieTypeRepository::class,
            \App\Repositories\MovieTypeRepositoryEloquent::class,
        ],
        'post' => [
            \App\Contracts\PostRepository::class,
            \App\Repositories\PostRepositoryEloquent::class,
        ],
        'promotion' => [
            \App\Contracts\PromotionRepository::class,
            \App\Repositories\PromotionRepositoryEloquent::class,
        ],
        'time' => [
            \App\Contracts\TimeRepository::class,
            \App\Repositories\TimeRepositoryEloquent::class,
        ],
        'schedule' => [
            \App\Contracts\ScheduleRepository::class,
            \App\Repositories\ScheduleRepositoryEloquent::class,
        ],
        'cinemaSchedule' => [
            \App\Contracts\CinemaScheduleRepository::class,
            \App\Repositories\CinemaScheduleRepositoryEloquent::class,
        ],
        'scheduleTime' => [
            \App\Contracts\ScheduleTimeRepository::class,
            \App\Repositories\ScheduleTimeRepositoryEloquent::class,
        ],
        'room' => [
            \App\Contracts\RoomRepository::class,
            \App\Repositories\RoomRepositoryEloquent::class,
        ],
    ];
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (static::$repositories as $repository) {
            $this->app->singleton(
                $repository[0],
                $repository[1]
            );
        }
    }
}
