<?php

namespace App\Livewire\Settings\Company\Subscription;

use App\Service\CacheService;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $plans = CacheService::getPlans();

        return view('livewire.settings.company.subscription.index', [
            'plans' => $plans,
        ]);
    }
}
