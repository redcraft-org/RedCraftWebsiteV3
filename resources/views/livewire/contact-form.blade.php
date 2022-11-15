<form id="contact-form" x-data="{ page: @entangle('page'), fromPlayer: @entangle('fromPlayer').defer }" class="relative" wire:submit.prevent="submit">


    {{-- First page --}}
    <div x-show="page == 'start'" x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
        x-transition:enter-start="opacity-0 translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-5">
        <p class="mb-4">@lang('contact.form.contacting_from')</p>
        <div class="btn-group mx-auto flex justify-center">
            <button type="button" class="btn btn-primary"
                x-on:click="page = 'informations'; fromPlayer = true; expandSection();">@lang('contact.form.player')</button>
            <button type="button" class="btn btn-accent"
                x-on:click="page = 'informations'; fromPlayer = false; expandSection();">@lang('contact.form.other')</button>
        </div>
    </div>


    {{-- Form page --}}
    <div x-show="page == 'informations'" class="flex flex-col gap-8" x-cloak
        x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
        x-transition:enter-start="opacity-0 -translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-5">
        <div>
            <button type="button" class="btn btn-primary" x-on:click="page = 'start'; expandSection();">@lang('contact.form.back')</button>
        </div>

        <div class="flex flex-col md:flex-row gap-8" x-show="fromPlayer">
            {{-- Minecraft name --}}
            <div class="w-full">
                <input type="text" placeholder="{{ __('contact.form.minecraft_pseudo') }}" class="input w-full"
                    wire:model.debounce.250ms="username" />
                @error('username')
                    <span class="text-error">{{ $message }}</span>
                @enderror
            </div>
            {{-- Discord name --}}
            <div class="w-full">
                <input type="text" placeholder="{{ __('contact.form.discord_id') }}" class="input w-full"
                    wire:model.debounce.250ms="discord_username" />
                @error('discord_username')
                    <span class="text-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex flex-row" x-show="!fromPlayer">
            {{-- Email --}}
            <div class="w-full">
                <input type="email" placeholder="{{ __('contact.form.email') }}" class="input w-full"
                    wire:model.debounce.250ms="email" />
                @error('email')
                    <span class="text-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="w-full">
            {{-- Subject --}}
            <input type="text" placeholder="{{ __('contact.form.subject') }}" class="input w-full" wire:model.debounce.250ms="subject" />
            @error('subject')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full">
            {{-- Message --}}
            <textarea class="input textarea h-32 w-full" placeholder="{{ __('contact.form.message') }}" wire:model.debounce.250ms="message"></textarea>
            @error('message')
                <span class="text-error">{{ $message }}</span>
            @enderror
            <p class="text-secondary">@lang('contact.form.max_length', ['length' => "1500"])</p>
        </div>


        <div class="flex justify-between">
            <div class="contact-validation font-weight-bold text-error"></div>
            <button type="submit" class="btn btn-lg btn-primary">@lang('contact.form.send')</button>
        </div>
    </div>


    {{-- Message success --}}
    <div x-show="page == 'success'" x-cloak x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
        x-transition:enter-start="opacity-0 translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-5">
        <h5>@lang('contact.form.done')</h5>
        <p class="pb-8">@lang('contact.form.success')</p>
        <x-contact.icon-success-error icon="success" />
    </div>


    {{-- Message error --}}
    <div x-show="page == 'error'" x-cloak x-transition:enter="transition ease-out duration-300 delay-200 desc-expand"
        x-transition:enter-start="opacity-0 translate-y-5" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300 absolute top-0 w-full"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-5">

        <h5>@lang('contact.form.error_title')</h5>
        <p class="pb-8">@lang('contact.form.error_description')</p>

        <x-contact.icon-success-error icon="error" />
        <div class="flex justify-end mt-8">
            <button type="button" class="btn btn-primary" x-on:click="page = 'start'; expandSection();">@lang('contact.form.back')</button>
        </div>

    </div>
</form>
