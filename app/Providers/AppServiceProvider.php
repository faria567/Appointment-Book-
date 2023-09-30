<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
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
        Validator::extend('finish_date_check', function ($attribute, $value, $parameters, $validator) {
            $inputs = $validator->getData();
            $startDate = $inputs['start_date'];
            $finishDate = $inputs['finish_date'];
            $result = true;
            if ($startDate > $finishDate) {
                $result = false;
            }
            return $result;
        });
        Validator::extend('finish_time_check', function ($attribute, $value, $parameters, $validator) {
            $inputs = $validator->getData();
            $startTime = $inputs['start_time'];
            $finishTime = $inputs['finish_time'];
            $result = true;
            if ($startTime > $finishTime) {
                $result = false;
            }
            return $result;
        });
    }
}
