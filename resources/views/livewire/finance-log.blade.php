<div>
    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800 xl:mb-0">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Team Logs</h3>
        </div>
        <ol class="relative border-l border-gray-200 dark:border-gray-700">
            @forelse ($teamHistoryLog as $log)
                <li class="mb-10 ml-4">
                    <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-800 dark:bg-gray-700"></div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                        {{ $log->created_at->diffForHumans() }}
                    </time>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $log->description }}</h3>
                    <p class="flex items-center mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                        <img style="margin-right: 1%;" class="w-8 h-8 rounded-full object-cover" src="{{ $log->causer->profile_photo_url }}" alt="{{ $log->causer->name }}">
                        @if(isset($log->properties['action']))
                            {{ $log->causer->name }} {{ $log->properties['action'] }} a Finance Record
                            @if(isset($log->properties['title']))
                                titled "{{ $log->properties['title'] }}"
                            @endif
                        @else
                            Default message or handle missing action property
                        @endif
                    </p>
                </li>
            @empty
                <div class="m-2">
                    <p class="text-center font-bold">No finance log entries available.</p>
                    <img class="w-full max-w-sm h-auto mx-auto transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0"
                        :src="'{{ asset('no_data.svg') }}'" alt="image description">
                </div>
            @endforelse
        </ol>
    </div>
</div>
