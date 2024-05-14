<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interface\CategoryInterface',
            'App\Repositories\CategoryRepositories',
        );
        $this->app->bind(
            'App\Repositories\Interface\AttributeInterface',
            'App\Repositories\AttributeRepositories',
        );
        $this->app->bind(
            'App\Repositories\Interface\AttributeValueInterface',
            'App\Repositories\AttributeValueRepositories',
        );

        $this->app->bind(
            'App\Repositories\Interface\BrandInterface',
            'App\Repositories\BrandRepositories',
        );
        $this->app->bind(
            'App\Repositories\Interface\ColorInterface',
            'App\Repositories\ColorRepositories',
        );
        $this->app->bind(
            'App\Repositories\Interface\ProductInterface',
            'App\Repositories\ProductRepositories',
        );
        $this->app->bind(
            'App\Repositories\Interface\SliderInterface',
            'App\Repositories\SliderRepositories',
        );
        $this->app->bind(
            'App\Repositories\Interface\CampaignInterface',
            'App\Repositories\CampaignRepositories',
        );
    }
}
