<?php

namespace App\Livewire\Clients;

use App\Models\Client;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    #[Computed(persist: true, cache: true)]
    public function clients(): \Illuminate\Database\Eloquent\Collection
    {
        return Client::query()
            ->select('id', 'first_name', 'last_name', 'email')
            ->latest()
            ->get();
    }

    #[Computed(persist: true, cache: true)]
    public function clientsCountSinceStartOfMonth()
    {
        $start = Carbon::now()->startOfMonth()->toDateTimeString();
        $end = Carbon::now()->toDateTimeString();

        return Client::query()
            ->whereBetween('created_at', [$start, $end])
            ->count();
    }

    public function delete(int $clientId)
    {
        Client::query()
            ->select('id')
            ->find($clientId)
            ->delete();

        unset($this->clients);
        unset($this->clientsCountSinceStartOfMonth);
        $this->render();
    }

    public function render()
    {
        return view('livewire.clients.index');
    }
}
