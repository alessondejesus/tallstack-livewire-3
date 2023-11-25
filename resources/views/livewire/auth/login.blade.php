<div>
    <div class="bg-black flex flex-col w-80 border border-gray-900 rounded-lg px-8 py-10">
        <form class="flex flex-col space-y-5 mt-10" wire:submit="login">
            <label class="font-bold text-lg text-white">Email</label>
            <input type="email"
                   wire:model="email"
                   class="border rounded-lg py-3 px-3 mt-2 bg-black border-indigo-600 placeholder-white-500 text-white">
            <label class="font-bold text-lg text-white">Senha</label>
            <input type="password" placeholder="********"
                   wire:model="password"
                   class="border rounded-lg py-3 px-3 bg-black border-indigo-600 placeholder-white-500 text-white">

            @if($message)
                <span class="font-bold text-xs leading-3 text-red-500">{{ $message }}</span>
            @endif
            <button
                type="submit"
                class="border border-indigo-600 bg-black text-white rounded-lg py-3 font-semibold"
            >Entrar
            </button>
        </form>
    </div>
</div>
