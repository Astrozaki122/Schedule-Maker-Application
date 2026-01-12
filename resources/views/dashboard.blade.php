<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-2">Welcome back, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600">{{ __("You're logged in and ready to manage your schedule.") }}</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Quick Actions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-900">Quick Actions</h3>
                        <div class="space-y-3">
                            <a href="{{ route('events.create') }}" class="block w-full bg-indigo-600 text-white text-center px-4 py-3 rounded-lg hover:bg-indigo-700 transition font-medium">
                                Create New Event
                            </a>
                            <a href="{{ route('events.index') }}" class="block w-full bg-white border-2 border-indigo-600 text-indigo-600 text-center px-4 py-3 rounded-lg hover:bg-indigo-50 transition font-medium">
                                View All Events
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Event Summary -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-900">Event Summary</h3>
                        @if(Auth::user()->userInfo && Auth::user()->userInfo->events->count() > 0)
                            <p class="text-3xl font-bold text-indigo-600 mb-2">{{ Auth::user()->userInfo->events->count() }}</p>
                            <p class="text-gray-600">Total Events Scheduled</p>
                        @else
                            <p class="text-gray-600">You haven't created any events yet.</p>
                            <a href="{{ route('events.create') }}" class="text-indigo-600 hover:text-indigo-800 font-medium mt-2 inline-block">
                                Create your first event →
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
