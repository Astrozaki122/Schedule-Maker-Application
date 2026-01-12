<x-app-layout> 
 <x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Events
        </h2>
        <a href="{{ route('events.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition font-medium">
            + Create Event
        </a>
    </div>
 </x-slot>

   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           @if(session('success'))
               <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                   {{ session('success') }}
               </div>
           @endif

           @if($events->count() > 0)
               <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                   <div class="divide-y divide-gray-200">
                       @foreach ($events as $event)
                           <div class="p-6 hover:bg-gray-50 transition">
                               <div class="flex justify-between items-start">
                                   <div class="flex-1">
                                       <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $event->title }}</h3>
                                       <p class="text-gray-600 mb-2">{{ $event->description }}</p>
                                       <div class="flex items-center gap-4 text-sm text-gray-500">
                                           <span class="flex items-center gap-1">
                                               <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                               </svg>
                                               {{ date('M d, Y h:i A', strtotime($event->start_time)) }}
                                           </span>
                                           <span>→</span>
                                           <span>{{ date('M d, Y h:i A', strtotime($event->end_time)) }}</span>
                                       </div>
                                       <div class="flex items-center gap-1 text-sm text-gray-500 mt-1">
                                           <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                           </svg>
                                           {{ $event->location }}
                                       </div>
                                   </div>
                                   <div class="flex gap-2 ml-4">
                                       <a href="{{ route('events.edit', $event) }}" class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600 transition text-sm font-medium">
                                           Edit
                                       </a>
                                       <form method="POST" action="{{ route('events.destroy', $event) }}" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                           @csrf
                                           @method('DELETE')
                                           <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600 transition text-sm font-medium">
                                               Delete
                                           </button>
                                       </form>
                                   </div>
                               </div>
                           </div>
                       @endforeach
                   </div>
               </div>
           @else
               <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden p-12 text-center">
                   <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                   </svg>
                   <h3 class="text-lg font-semibold text-gray-900 mb-2">No events yet</h3>
                   <p class="text-gray-600 mb-4">Start organizing your schedule by creating your first event.</p>
                   <a href="{{ route('events.create') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition font-medium">
                       Create Your First Event
                   </a>
               </div>
           @endif
       </div>
   </div>
</x-app-layout>