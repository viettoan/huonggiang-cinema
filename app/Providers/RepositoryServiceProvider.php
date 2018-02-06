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
        'category' => [
            \App\Contracts\CategoryRepository::class,
            \App\Repositories\CategoryRepositoryEloquent::class,
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
        'movie_type' => [
            \App\Contracts\PostRepository::class,
            \App\Repositories\PostRepositoryEloquent::class,
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
