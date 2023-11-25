<?php

namespace App\Service;

use App\Models\Company\Company;
use Illuminate\Support\Facades\Cache;
use Laravel\Cashier\Cashier;

class CacheService
{
    public static function getCompany(int $companyId)
    {
        return Cache::remember("company:$companyId", now()->addDay(), function () use ($companyId) {
            return Company::query()
                ->find($companyId);
        });
    }

    public static function companyIsSubscribed(int $companyId, string $subscription = 'default')
    {
        return Cache::remember("company:$companyId:subscribed", now()->addDay(), function () use ($companyId, $subscription) {
            return Company::query()
                ->find($companyId)
                ->subscribed($subscription);
        });
    }

    public static function getPlans()
    {
        return Cache::remember('plans', now()->addDay(), function () {
            return Cashier::stripe()->plans->all()->data;
        });
    }
}
