<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use View;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::share('myname','ahmed');
        View::composer('*',function($view){
            $destinationCities = DB::table('popularcities')->latest('created_at')->limit('9')->get();
            $view->with('destinationCities',$destinationCities);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Enable pagination
        // if (!Collection::hasMacro('paginate')) {

        //     Collection::macro(
        //         'paginate',
        //         function ($perPage = 15, $page = null, $options = []) {
        //             $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        //             return (new LengthAwarePaginator(
        //                 $this->forPage($page, $perPage)->values()->all(),
        //                 $this->count(),
        //                 $perPage,
        //                 $page,
        //                 $options
        //             ))
        //                 ->withPath('');
        //         }
        //     );
        // }
    }
}
