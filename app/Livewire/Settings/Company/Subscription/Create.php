<?php

namespace App\Livewire\Settings\Company\Subscription;

use App\Service\CacheService;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public string $planId;

    public function mount(string $planId)
    {
        $this->planId = $planId;
    }

    function render()
    {
        $user = auth()->user();

        $company = CacheService::getCompany($user->company_id);

        $intent = $company->createSetupIntent();

        return view('livewire.settings.company.subscription.create', [
            'intent' => $intent
        ]);
    }

    #[On('subscribe-plan')]
    public function subscribe(string $paymentMethod)
    {
        dd('indo assinar');
        $company = auth()->user()->company;

        $company->createOrGetStripeCustomer();

        $company->updateDefaultPaymentMethod($paymentMethod);

        $company->newSubscription('default', $this->planId)->create($paymentMethod, [
            'email' => 'lesson9006@gmail.com'
        ]);
    }
}
