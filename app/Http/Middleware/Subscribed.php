<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Service\CacheService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Subscribed
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User|null $user */
        $user = $request->user();

        if ($user) {
            $companyIsSubscribed = CacheService::companyIsSubscribed($user->company_id);

            if (!$companyIsSubscribed) {
                return redirect()->route('settings.company.subscription.index');
            }
        }

        return $next($request);
    }
}
