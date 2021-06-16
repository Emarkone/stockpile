<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-white max-w-7xl mx-auto sm:px-6 lg:px-8 lg:py-5">
            <h1 class="text-2xl my-2 mr-2"> Key metrics </h1>
            <div class="overflow-hidden sm:rounded-lg">
                <div class="sm:flex sm:space-x-3 px-5">
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow  transform transition-all mb-4 w-full sm:w-1/4 sm:my-2">
                        <div class="bg-white p-5">
                            <div class="sm:flex sm:items-start">
                                <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                    <h3 class="text-sm leading-6 font-medium text-gray-400">Total clients</h3>
                                    <p class="text-3xl font-bold text-black">{{ $total_client }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/4 sm:my-2">
                        <div class="bg-white p-5">
                            <div class="sm:flex sm:items-start">
                                <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                    <h3 class="text-sm leading-6 font-medium text-gray-400">Total suppliers</h3>
                                    <p class="text-3xl font-bold text-black">{{ $total_supplier}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/4 sm:my-2">
                        <div class="bg-white p-5">
                            <div class="sm:flex sm:items-start">
                                <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                    <h3 class="text-sm leading-6 font-medium text-gray-400">Total inbounds</h3>
                                    <p class="text-3xl font-bold text-black">{{ $total_inbounds }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/4 sm:my-2">
                        <div class="bg-white p-5">
                            <div class="sm:flex sm:items-start">
                                <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                    <h3 class="text-sm leading-6 font-medium text-gray-400">Total outbounds</h3>
                                    <p class="text-3xl font-bold text-black">{{ $total_outbounds }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sm:flex sm:space-x-3 px-5">
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow  transform transition-all mb-4 w-full sm:w-1/2 sm:my-8">
                        <div class="bg-white p-5">
                            <div class="sm:flex sm:items-start">
                                <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                    <h3 class="text-sm leading-6 font-medium text-gray-400">Total inbounds cost</h3>
                                    <p class="text-3xl font-bold text-black">{{ $total_inbounds_cost.'€' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/2 sm:my-8">
                        <div class="bg-white p-5">
                            <div class="sm:flex sm:items-start">
                                <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                    <h3 class="text-sm leading-6 font-medium text-gray-400">Total outbounds cost</h3>
                                    <p class="text-3xl font-bold text-black">{{ $total_outbounds_cost.'€' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="-mb-8 text-2xl my-0 mr-2"> Last inbounds </h1>
            <livewire:last-inbound-table hide-pagination="true" per-page="5"/>

            <h1 class="-mb-8 text-2xl my-0 mr-2 mt-8"> Last outbounds </h1>
            <livewire:last-outbound-table hide-pagination="true" per-page="5"/>

            <div style="height: 32rem;">
                <livewire:livewire-column-chart
                    :column-chart-model="$iochart"
                />
            </div>

            <div style="height: 32rem;">
                <livewire:livewire-pie-chart
                    :pie-chart-model="$stockchart"
                />
            </div>



            @livewireChartsScripts
        </div>
    </div>
</x-app-layout>