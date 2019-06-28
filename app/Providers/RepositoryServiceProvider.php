<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Model\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Model\Category\Repositories\CategoryRepository;

use App\Model\Author\Repositories\Interfaces\AuthorRepositoryInterface;
use App\Model\Author\Repositories\AuthorRepository;

use App\Model\Publisher\Repositories\Interfaces\PublisherRepositoryInterface;
use App\Model\Publisher\Repositories\PublisherRepository;


use App\Model\Language\Repositories\Interfaces\LanguageRepositoryInterface;
use App\Model\Language\Repositories\LanguageRepository;

use App\Model\Product\Repositories\Interfaces\ProductRepositoryInterface;
use App\Model\Product\Repositories\ProductRepository;

use App\Model\Productfile\Repositories\Interfaces\ProductfileRepositoryInterface;
use App\Model\Productfile\Repositories\ProductfileRepository;


use App\Model\Blog\Repositories\Interfaces\BlogRepositoryInterface;
use App\Model\Blog\Repositories\BlogRepository;

use App\Model\Slider\Repositories\Interfaces\SliderRepositoryInterface;
use App\Model\Slider\Repositories\SliderRepository;

// use App\Model\User\Repositories\UserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(
        //     UserRepositoryInterface::class,
        //     UserRepository::class
        // );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            AuthorRepositoryInterface::class,
            AuthorRepository::class
        );

        $this->app->bind(
            PublisherRepositoryInterface::class,
            PublisherRepository::class

        );
        $this->app->bind(
            LanguageRepositoryInterface::class,
            LanguageRepository::class

        );
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class

        );

        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class

         );

         $this->app->bind(
            ProductfileRepositoryInterface::class,
            ProductfileRepository::class

         );

         $this->app->bind(
           BlogRepositoryInterface::class,
           BlogRepository::class

         );

         $this->app->bind(
            SliderRepositoryInterface::class,
            SliderRepository::class

          );
        }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
