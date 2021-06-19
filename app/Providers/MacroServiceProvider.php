<?php

namespace App\Providers;


use App\support\macros\ResponseMacro;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;


class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::mixin(new ResponseMacro());
//        Request::mixin(new RequestMacro());
//        Collection::mixin(new CollectionMacro());
//        Builder::mixin(new BuilderMacro());
//        TestResponse::mixin(new TestResponseMacro());
    }
}
