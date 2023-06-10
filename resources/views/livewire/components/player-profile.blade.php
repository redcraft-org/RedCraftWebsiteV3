<div>
    <div wire:loading>
        <div class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex justify-center min-h-screen px-4 pt-4 pb-20 text-center items end sm:block sm:p-0">
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <div class="flex justify-center">
                                    <div class="flex items center">
                                        <i class="text-gray-500 fa-solid fa-spinner fa-spin fa-2x"></i>
                                        <p class="ml-2 text-lg">Please be patient, the data is loading...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="m-auto w-96 {{ $playerUUID ? 'mb-32' : '' }} transition-all duration-500 ease-in-out text-light">

        <h2 class="text-2xl font-bold text-center">{{ \Illuminate\Support\Arr::get($playerData, 'name', 'error') }}</h2>
        <p class="text-center">{{ $playerUUID }}</p>


    </div>

</div>
