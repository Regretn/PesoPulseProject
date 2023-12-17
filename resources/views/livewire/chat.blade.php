
<div class="grid grid-cols-1 my-4 xl:grid-cols-3 xl:gap-4">
      <div class="col-span-2 m-2 p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 dark:border-gray-700 dark:bg-gray-800 xl:mb-0">
      <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                <label for="comment" class="sr-only">Your Message</label>
                <textarea wire:model="content" id="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required></textarea>
            </div>
            <div class="flex items-center justify-end px-3 py-2 border-t dark:border-gray-600">
                <div class="flex">
                <input id="default-checkbox" type="checkbox" wire:model="importance" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Important</label>
            </div>
            <div class="flex" style="margin-left: 5%;">
                <button wire:click.prevent="createMessage" type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Post Message
                </button>
            </div>
            </div>
        </div>

      <div class="flex items-center justify-between mb-4 ">          
        </div>
        <!-- Chat -->
        @if($messages->count() > 0)
        <form class="overflow-y-auto lg:max-h-[60rem] 2xl:max-h-fit">
        @foreach($messages as $message)
          <article class="mb-5 p-1.5" wire:key="{{$message->id}} ">
            <footer class="flex items-center justify-between mb-2 ">
                <div class="flex items-center ">
                <p class="inline-flex items-center mr-3 text-sm font-semibold text-gray-900 dark:text-white">
                <img class="w-6 h-6 mr-2 rounded-full" src="{{ $message->user->profile_photo_url }}" alt="{{ $message->user->name }}">{{ $message->user->name }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">
    
                        @if ($message->created_at->isToday())
                        Today {{ $message->created_at->format('h:i A') }}
                        @elseif ($message->created_at->isYesterday())
                        Yesterday {{ $message->created_at->format('h:i A') }}
                        @else
                        {{ $message->created_at->format('Y/m/d H:i A') }}
                        @endif
                    </time></p>
                </div>
                @auth
                    @if($message->user_id == auth()->id())
                        <button wire:confirm="are you sure you want to delete this?" wire:click.prevent="deleteMessage({{ $message->id }})" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:ring-gray-600" type="button">
                        <svg class="w-[16px] h-[16px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                        </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                    @endif
                @endauth
            </footer>
            <p class="mb-2 text-gray-900 dark:text-white">{{$message->content}}</p>


            <!-- Reply Accordion -->
            <div class="grid gap-4">
                <div id="accordion-collapse{{$message->id}}" data-accordion="collapse">
                <h2 id="accordion-collapse-heading-2{{$message->id}}">
                <button type="button" class="flex items-center justify-between p-5 text-sm text-gray-500 rtl:text-right dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-2{{$message->id}}" aria-expanded="false" aria-controls="accordion-collapse-body-2{{$message->id}}">
                    Reply({{ $message->replies->count() }})
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-2{{$message->id}}" class="hidden" aria-labelledby="accordion-collapse-heading-2{{$message->id}}">
            
            <!-- Reply reply Message -->

            <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                <label for="comment" class="sr-only">Your Message</label>
                <textarea wire:model="replyContent" id="replyContent" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a reply..." required></textarea>
            </div>
            <div class="flex items-center justify-end px-3 py-2 border-t dark:border-gray-600">
            <div class="flex" style="margin-left: 5%;">
                <button wire:click.prevent="createReplyMessage({{$message->id}})" type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Post Reply
                </button>
            </div>
            </div>
        </div>
        <!-- End of reply Message -->

        <!-- Reply List -->
                @if ($message->replies->count() > 0)
                    <div class="ml-4 border-l pl-4">
                        @foreach ($message->replies as $reply)
                            <article class="mb-3" wire:key="{{ $reply->id }}">
                            <footer class="flex items-center justify-between mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm font-semibold text-gray-900 dark:text-white"><img class="w-6 h-6 mr-2 rounded-full" src="{{ $reply->user->profile_photo_url }}">{{$reply->user->name}}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">
                        @if ($reply->created_at->isToday())
                        Today {{ $reply->created_at->format('h:i A') }}
                        @elseif ($reply->created_at->isYesterday())
                        Yesterday {{ $reply->created_at->format('h:i A') }}
                        @else
                        {{ $reply->created_at->format('Y/m/d H:i A') }}
                        @endif
                    </time></p>
                </div>
                @auth
                    @if($reply->user_id == auth()->id())
                        <button wire:confirm="are you sure you want to delete this?" wire:click.prevent="deleteReplyMessage({{ $reply->id }})" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:ring-gray-600" type="button">
                        <svg class="w-[16px] h-[16px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                        </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                    @endif
                @endauth
            </footer>
            <p class="mb-2 text-gray-900 dark:text-white">{{$reply->content}}</p>
                                    
        </article>
                        
        @endforeach
    </div>
    @endif
</div>            
</div>        
</div>      
</article>        
@endforeach     
</form>   
@else
<p class="text-gray-500 text-center ">No messages available at the moment.</p>
<p class="text-green-500 text-center " style="margin-bottom: 5%;">Why not initiate a financial discussion or log a new transaction to keep your team and personal finances organized?</p>
<img class="w-full max-w-sm h-auto mx-auto transition-all duration-300 rounded-lg" :src="'{{ asset('no_messages.svg') }}'" alt="image description">


@endif
</div>
      
      <!-- End of reply List -->


    <!-- IMPORTANT MESSAGES -->
    <div class="grid gap-4">
    <div class="col-span-1 m-2 p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 dark:border-gray-700 dark:bg-gray-800 xl:mb-0">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white" style="margin-bottom: 5%;">Important</h3>
    <!-- Chat -->
        @if($messages->count() > 0)
        @foreach($messages as $message)
                @if($message->important == 1)
                    <article class="mb-5" wire:key="{{$message->id}}">
                        <footer class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 text-sm font-semibold text-gray-900 dark:text-white">
                                    <img class="w-6 h-6 mr-2 rounded-full" src="{{ $message->user->profile_photo_url }}">{{ $message->user->name }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    <time pubdate datetime="2022-02-08" title="February 8th, 2022">
                                        @if ($message->created_at->isToday())
                                            Today {{ $message->created_at->format('h:i A') }}
                                        @elseif ($message->created_at->isYesterday())
                                            Yesterday {{ $message->created_at->format('h:i A') }}
                                        @else
                                            {{ $message->created_at->format('Y/m/d H:i A') }}
                                        @endif
                                    </time>
                                </p>
                            </div>
                            @auth
                                @if($message->user_id == auth()->id())
                                    <button wire:confirm="are you sure you want to delete this?" wire:click.prevent="deleteMessage({{ $message->id }})" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:ring-gray-600" type="button">
                                        <svg class="w-[16px] h-[16px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                        </svg>
                                        <span class="sr-only">Comment settings</span>
                                    </button>
                                @endif
                            @endauth
                        </footer>
                        <p class="mb-2 text-gray-900 dark:text-white">{{$message->content}}</p>
                    </article> 
                @endif

            @endforeach
            @php $hasImportantMessage = $messages->contains('important', 1); @endphp

        @if(!$hasImportantMessage)
        <p class="text-gray-500 text-center ">No Important message.</p>
        <p class="text-green-500 text-center " style="margin-bottom: 5%;">Theres no Important Message at the moment</p>
         <img class="w-full max-w-sm h-auto mx-auto transition-all duration-300 rounded-lg" :src="'{{ asset('no_important_message.svg') }}'" alt="image description">
        @endif
        @else
        <p class="text-gray-500 text-center " style="margin-bottom: 5%;">No messages available.</p>
        <img class="w-full max-w-sm h-auto mx-auto transition-all duration-300 rounded-lg" :src="'{{ asset('no_message2.svg') }}'" alt="image description">
        @endif
        </div>
        </form>
      </div>
<div>
