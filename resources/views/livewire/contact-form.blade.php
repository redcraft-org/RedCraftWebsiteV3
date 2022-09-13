<form id="contact-form" x-data="{ page: @entangle('page'), fromPlayer: @entangle('fromPlayer').defer }" class="relative" wire:submit.prevent="submit">


    {{-- First page --}}
    <div x-show="page == 'start'" x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
        x-transition:enter-start="opacity-0 translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-5">
        <p class="mb-4">Vous nous contactez en tant que...</p>
        <div class="btn-group mx-auto flex justify-center">
            <button type="button" class="btn btn-primary"
                x-on:click="page = 'informations'; fromPlayer = true; expandSection();">Joueur</button>
            <button type="button" class="btn btn-accent"
                x-on:click="page = 'informations'; fromPlayer = false; expandSection();">Autre</button>
        </div>
    </div>


    {{-- Form page --}}
    <div x-show="page == 'informations'" class="flex flex-col gap-8" x-cloak
        x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
        x-transition:enter-start="opacity-0 -translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-5">
        <div>
            <button type="button" class="btn btn-primary" x-on:click="page = 'start'; expandSection();">Retour</button>
        </div>

        <div class="flex flex-row gap-8" x-show="fromPlayer">
            {{-- Minecraft name --}}
            <div class="w-full">
                <input type="text" placeholder="Pseudo Minecraft" class="input w-full"
                    wire:model.debounce.500ms="username" />
                @error('username')
                    <span class="text-error">{{ $message }}</span>
                @enderror
            </div>
            {{-- Discord name --}}
            <div class="w-full">
                <input type="text" placeholder="Identifiant Discord (Nom#0000)" class="input w-full"
                    wire:model.debounce.500ms="discord_username" />
                @error('discord_username')
                    <span class="text-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex flex-row" x-show="!fromPlayer">
            {{-- Email --}}
            <div class="w-full">
                <input type="email" placeholder="Adresse email" class="input w-full"
                    wire:model.debounce.500ms="email" />
                @error('email')
                    <span class="text-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="w-full">
            {{-- Message --}}
            <textarea class="input textarea h-32 w-full" placeholder="Message" wire:model.debounce.500ms="message"></textarea>
            @error('message')
                <span class="text-error">{{ $message }}</span>
            @enderror
            <p class="text-secondary">Maximum 1500 charactères</p>
        </div>


        <div class="flex justify-between">
            <div class="contact-validation font-weight-bold text-error"></div>
            <button type="submit" class="btn btn-lg btn-primary">Envoyer le message</button>
        </div>
    </div>


    {{-- Message success --}}
    <div x-show="page == 'success'" x-cloak x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
        x-transition:enter-start="opacity-0 translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-5">
        Yay t'as réussi !
    </div>


    {{-- Message error --}}
    <div x-show="page == 'error'" x-cloak x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
        x-transition:enter-start="opacity-0 translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-5">
        <button type="button" class="btn btn-primary" x-on:click="page = 'start'; expandSection();">Retour</button>
        T'as raté t'es nul
    </div>
</form>
