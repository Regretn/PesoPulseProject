<!-- Livewire blade view -->

<div class="container">

    @forelse ($teamHistoryLog as $log)
        <div class="flex justify-center items-center m-4">
            <div class="w-full max-w-md p-4 border rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700
                @if ($log->properties['attributes']['transaction_type'] == 0)
                    bg-green-100 border-green-500
                @elseif ($log->properties['attributes']['transaction_type'] == 1)
                    bg-red-100 border-red-500
                @endif
            ">

                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <!-- Display the profile photo of the user who caused the log -->
                                    <img class="w-8 h-8 rounded-full object-cover" src="{{ $log->causer->profile_photo_url }}" alt="{{ $log->causer->name }}">
                                </div>
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ $log->causer->name }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ $log->causer->email }}
                                    </p>
                                </div>
                                <div class="flex-1 min-w-0 ms-4">
                                    <div  class="flex-end flex justify-end">
                                    <!-- Move the description and created_at to the right side -->
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ $log->description }}
                                    </p>
                                    </div>
                                    <div class="flex-end flex justify-end">
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                     {{ $log->created_at->format('Y/m/d') }}
                                    </p>
                                </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @empty
    <div class="m-2">
    <p class="text-center font-bold">No finance log entries available.</p>
        <img
  class="w-full max-w-sm h-auto mx-auto transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0"
  :src="'{{ asset('no_data.svg') }}'"
  alt="image description"
>
    </div>
    @endforelse
</div>
