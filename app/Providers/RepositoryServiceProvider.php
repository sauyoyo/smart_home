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
        'booking' => [
            \App\Contracts\BookingRepository::class,
            \App\Repositories\BookingRepositoryEloquent::class,
        ],
        'brand' => [
            \App\Contracts\BrandRepository::class,
            \App\Repositories\BrandRepositoryEloquent::class,
        ],
        'contact' => [
            \App\Contracts\ContactRepository::class,
            \App\Repositories\ContactRepositoryEloquent::class,
        ],
        'feature' => [
            \App\Contracts\FeatureRepository::class,
            \App\Repositories\FeatureRepositoryEloquent::class,
        ],
        'media' => [
            \App\Contracts\MediaRepository::class,
            \App\Repositories\MediaRepositoryEloquent::class,
        ],
        'post' => [
            \App\Contracts\PostRepository::class,
            \App\Repositories\PostRepositoryEloquent::class,
        ],
        'product' => [
            \App\Contracts\ProductRepository::class,
            \App\Repositories\ProductRepositoryEloquent::class,
        ],
        'promotion' => [
            \App\Contracts\PromotionRepository::class,
            \App\Repositories\PromotionRepositoryEloquent::class,
        ],      
        'rating' => [
            \App\Contracts\RatingRepository::class,
            \App\Repositories\RatingRepositoryEloquent::class,
        ],
        'type' => [
            \App\Contracts\TypeRepository::class,
            \App\Repositories\TypeRepositoryEloquent::class,
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
        foreach (static::$repositories as $repository) 
            {
            $this->app->singleton
            (
                $repository[0],
                $repository[1]
            );
            }
    }
}
