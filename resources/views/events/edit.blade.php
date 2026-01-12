<x-app-layout>
   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Event
        </h2>
   </x-slot>

   <div class="py-12">
       <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6">
                   <form method="POST" action="{{ route('events.update', $event->id) }}">
                       @csrf
                       @method('PUT')
                       
                       <div class="mb-4">
                           <label class="block text-gray-700 font-medium mb-2">Title *</label>
                           <input type="text" name="title" value="{{ old('title', $event->title) }}"
                                  class="border border-gray-300 rounded-lg w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                  required>
                           @error('title')
                               <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                           @enderror
                       </div>

                       <div class="mb-4">
                           <label class="block text-gray-700 font-medium mb-2">Description *</label>
                           <textarea name="description" rows="4"
                                     class="border border-gray-300 rounded-lg w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                     required>{{ old('description', $event->description) }}</textarea>
                           @error('description')
                               <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                           @enderror
                       </div>

                       <div class="grid md:grid-cols-2 gap-4 mb-4">
                           <div>
                               <label class="block text-gray-700 font-medium mb-2">Start Time *</label>
                               <input type="datetime-local" name="start_time"
                                      value="{{ old('start_time', date('Y-m-d\TH:i', strtotime($event->start_time))) }}"
                                      class="border border-gray-300 rounded-lg w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                      required>
                               @error('start_time')
                                   <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                               @enderror
                           </div>

                           <div>
                               <label class="block text-gray-700 font-medium mb-2">End Time *</label>
                               <input type="datetime-local" name="end_time"
                                      value="{{ old('end_time', date('Y-m-d\TH:i', strtotime($event->end_time))) }}"
                                      class="border border-gray-300 rounded-lg w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                      required>
                               @error('end_time')
                                   <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                               @enderror
                           </div>
                       </div>

                       <div class="mb-6">
                           <label class="block text-gray-700 font-medium mb-2">Location *</label>
                           <input type="text" name="location" value="{{ old('location', $event->location) }}"
                                  class="border border-gray-300 rounded-lg w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                  required>
                           @error('location')
                               <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                           @enderror
                       </div>

                       <div class="flex gap-3">
                           <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition font-medium">
                               Update Event
                           </button>
                           <a href="{{ route('events.index') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition font-medium">
                               Cancel
                           </a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</x-app-layout>