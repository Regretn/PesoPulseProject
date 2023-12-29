
<div>
<div class="px-4 pt-6">
    <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
      <!-- Main widget -->
      <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="flex items-center justify-between mb-4">
          <div class="flex-shrink-0">
            <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">$45,385</span>
            <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Total Income</h3>
          </div>
          <div class="flex items-center justify-end flex-1 text-base font-medium text-green-500 dark:text-green-400">
            12.5%
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg>
          </div>
        </div>
        <div id="main-chart"></div>
        <!-- Card Footer -->
        <div class="flex items-center justify-between pt-3 mt-4 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
          <div>
            <button class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" type="button" data-dropdown-toggle="weekly-sales-dropdown">Last 7 days <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="weekly-sales-dropdown">
                <div class="px-4 py-3" role="none">
                  <p class="text-sm font-medium text-gray-900 truncate dark:text-white" role="none">
                    Sep 16, 2021 - Sep 22, 2021
                  </p>
                </div>
                <ul class="py-1" role="none">
                  <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Yesterday</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Today</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Last 7 days</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Last 30 days</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Last 90 days</a>
                  </li>
                </ul>
                <div class="py-1" role="none">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Custom...</a>
                </div>
            </div>
          </div>
          <div class="flex-shrink-0">
            <a href="#" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
              Sales Report
              <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
          </div>
        </div>
        
      </div>
      <!--Tabs widget -->
      <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900 dark:text-white">Records
        <button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button"><svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
        </h3>
        <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
          <div class="p-3 space-y-2">
              <h3 class="font-semibold text-gray-900 dark:text-white">Statistics</h3>
              <p>Statistics is a branch of applied mathematics that involves the collection, description, analysis, and inference of conclusions from quantitative data.</p>
              <a href="#" class="flex items-center font-medium text-primary-600 dark:text-primary-500 dark:hover:text-primary-600 hover:text-primary-700">Read more <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></a>
          </div>
          <div data-popper-arrow></div>
        </div>
      
        <ul class="text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
            <li class="w-full">
                <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="true" class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Recent Transaction</button>
            </li>
            <li class="w-full">
                <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Files</button>
            </li>
        </ul>
        <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
        
            <div class="pt-4" id="faq" role="tabpanel" aria-labelledby="faq-tab">
            @if (count($finances) > 0)
              @foreach ($finances->take(5) as $finance)
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center min-w-0">
                                {{-- Conditional statement for setting the image source --}}
                                @if ($finance->category_id == 1)
                                    <img class="flex-shrink-0 w-10 h-10" :src="'{{ asset('groceries.png') }}'" alt="iphone image">
                                @elseif ($finance->category_id == 2)
                                    <img class="flex-shrink-0 w-10 h-10" :src="'{{ asset('utilities.png') }}'" alt="iphone image">
                                @elseif ($finance->category_id == 3)
                                    <img class="flex-shrink-0 w-10 h-10" :src="'{{ asset('rent.png') }}'" alt="iphone image">
                                @elseif ($finance->category_id == 4)
                                    <img class="flex-shrink-0 w-10 h-10" :src="'{{ asset('transportation.png') }}'" alt="iphone image">
                                @elseif ($finance->category_id == 5)
                                    <img class="flex-shrink-0 w-10 h-10" :src="'{{ asset('utilities.png') }}'" alt="iphone image">
                                @else
                                    {{-- Default image if the category_id is not 1 or 5+ --}}
                                    <img class="flex-shrink-0 w-10 h-10" :src="'{{ asset('other.png') }}'" alt="iphone image">
                                @endif

                                <div class="ml-3">
                                    <p class="font-medium text-gray-900 truncate dark:text-white">
                                        {{ $finance->finance_title }}
                                    </p>
                                    <div class="flex items-center flex-1 text-sm text-green-500 dark:text-green-400">
                                        <!-- <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                  d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                                        </svg>
                                        2.5%  -->
                                        <span class="text-xs font-light text-gray-400">
                                          @php
                                              $timeDifference = now()->diffInMinutes($finance->created_at);
                                          @endphp
                                          @if ($timeDifference <= 5)
                                              Current {{ $finance->created_at->format('H:i') }}
                                          @elseif ($finance->created_at->isToday())
                                            Today {{ $finance->created_at->format('h:i A') }}
                                          @elseif ($finance->created_at->isYesterday())
                                              Yesterday {{ $finance->created_at->format('h:i A') }}
                                          @else
                                              {{ $finance->created_at->format('Y/m/d H:i A') }}
                                          @endif
                                      </span>
                                    </div>
                                </div>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                @if($finance->transaction_type == 0) 
                                    <p class="text-[18px] text-green-400">+ {{$finance->finance_amount}}</p>
                                @else
                                    <p class="text-[18px] text-red-400">+ {{$finance->finance_amount}}</p> 
                                @endif
                            </div>
                        </div>
                    </li>              
                </ul>
                @endforeach
            @else
            <div class="m-2" style="margin-top: 10%;;">
        <p class="text-gray-500 text-center">It seems like your financial journey is a blank canvas for now.</p>
        <p class="text-green-500 text-center">Why not kickstart it by creating your first finance log and charting the course to financial success?</p>

                          <img
        class="w-full max-w-sm h-auto mx-auto transition-all duration-300 rounded-lg cursor-pointer"
        :src="'{{ asset('dashboard_nodata.svg') }}'"
        alt="image description"
        />
        </div>
          @endif
            </div>


            <div class="hidden pt-4" id="about" role="tabpanel" aria-labelledby="about-tab" style="overflow-y: auto;">
    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700 max-h-96 overflow-y-auto">
    @foreach($importedFiles as $importedFile)
    <li class="py-3 sm:py-4">
        <div class="flex items-center space-x-4">
            <div class="flex-shrink-0">
                <svg class="w-[33px] h-[33px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" d="M6 1v4a1 1 0 0 1-1 1H1m4 10v-2m3 2v-6m3 6v-4m4-10v16a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2Z"/>
                </svg>                 
            </div>
            <div class="flex-1 min-w-0">
                <p class="font-medium text-gray-900 truncate dark:text-white">
                    {{ \Illuminate\Support\Str::limit($importedFile->file_name, 35) }}
                </p>
                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                    @php
                        $timeDifference = now()->diffInMinutes($importedFile->created_at);
                    @endphp

                    @if ($timeDifference <= 5)
                        Current {{ $importedFile->created_at->format('H:i') }}
                    @elseif ($importedFile->created_at->isToday())
                        Today {{ $importedFile->created_at->format('h:i A') }}
                    @elseif ($importedFile->created_at->isYesterday())
                        Yesterday {{ $importedFile->created_at->format('h:i A') }}
                    @else
                        {{ $importedFile->created_at->format('Y/m/d H:i A') }}
                    @endif
                </p>
            </div>
            <x-dropdown align="right" width="60">
              <x-slot name="trigger">
                  <span class="inline-flex rounded-md">
                    <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                    </svg>
                  </span>
              </x-slot>

              <x-slot name="content">
                  <div class="w-60">
                      <!-- Team Settings -->
                      <x-dropdown-link>
                      <button wire:click.prevent="downloadFile({{ $importedFile->id }})" @click="open = ! open" type="button" id="createProductModalButton"  class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-gray-700 dark:text-gray-200">
                            
                              <svg class="w-4 h-4 mr-2 w-[17px] h-[17px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3M9.5 1v10.93m4-3.93-4 4-4-4"/>
                              </svg>
                              Download
                          </button>
                      </x-dropdown-link>
                      <x-dropdown-link>
                      <div x-data="{ open: false }">
                          <button @click="open = ! open"  class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
                              <svg class="w-4 h-4 mr-2" viewbox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                  <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
                              </svg>
                              Delete
                          </button>
                          <template x-teleport="body">
                          <div x-show="open" tabindex="-1" class="fixed top-0 right-0 left-0 bottom-0 flex items-center justify-center">
                              <div class="relative p-4 w-full max-w-md max-h-full">
                                  <!-- Modal content for delete -->
                                  <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                      <button @click="open = false" type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                                          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                          </svg>
                                          <span class="sr-only">Close modal</span>
                                      </button>
                                      <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                      </svg>
                                      <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                      <div class="flex justify-center items-center space-x-4">
                                          
                                          <button @click="open = false" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                          <button wire:click.prevent="deleteFile({{ $importedFile->id }})" x-on:click="open = false" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                              Yes, I'm sure
                                          </button>
                                      </div>
                                      <div wire:loading>
                                              Deleting...
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </template>
                      </div>
                      </x-dropdown-link>


                  </div>
              </x-slot>
          </x-dropdown>
        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
        </div>
        </div>
    </li>
    @endforeach
        </ul>
    </div>

        </div>
        <!-- Card Footer -->
        <div class="flex items-center justify-between pt-3 mt-5 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
          <div></div>
          <div class="flex-shrink-0">
            <a href="/add" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
               Transactions
              <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Amount</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">2,340</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              12.5% 
            </span>
            Since last month
          </p>
        </div>
        <div class="w-full" id="new-products-chart"></div>
      </div>
      <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Income</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">2,340</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              3,4% 
            </span>
            Since last month
          </p>
        </div>
        <div class="w-full">
          <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Expense</h3>
          <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">2,340</span>
          <p class="flex items-center text-base font-normal text-gray-500 dark:text-gray-400">
            <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
              </svg>
              3,4% 
            </span>
            Since last month
          </p>
        </div>
      </div>
 
      </div>
    </div>
    <div class="grid grid-cols-1 my-4 xl:grid-cols-2 xl:gap-4">
      <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 dark:border-gray-700 dark:bg-gray-800 xl:mb-0">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Important</h3>
          <a href="/message" class="inline-flex items-center p-2 text-sm font-medium rounded-lg text-primary-700 hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
            Messages
          </a>
        </div>
        <!-- Chat -->
        <form class="overflow-y-auto lg:max-h-[60rem] 2xl:max-h-fit">
            @if($messages->count() > 0)
            @foreach($messages as $message)
                    @if($message->important == 1)
                        <article class="mb-5" wire:key="{{$message->id}}" style="margin-top: 5%;">
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
            <div style="margin-top: 10%;">
            <p class="text-gray-500 text-center ">No Important message.</p>
            <p class="text-green-500 text-center " style="margin-bottom: 5%;">Theres no Important Message at the moment</p>
            <img class="w-full max-w-sm h-auto mx-auto transition-all duration-300 rounded-lg" :src="'{{ asset('no_important_message.svg') }}'" alt="image description">
            </div>
            @endif
            @else
            <div style="margin-top: 10%;">
            <p class="text-gray-500 text-center " style="margin-bottom: 5%;">No messages available.</p>
            <img class="w-full max-w-sm h-auto mx-auto transition-all duration-300 rounded-lg" :src="'{{ asset('no_message2.svg') }}'" alt="image description">
            </div>
            @endif
        </form>
      </div>
      <!-- Right Content -->
      <div class="grid gap-4">
      <div>

      <!-- Team Logs -->
    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800 xl:mb-0">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Team Logs</h3>
          <a href="/historylog" class="inline-flex items-center p-2 text-sm font-medium rounded-lg text-primary-700 hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
            View all
          </a>
        </div>
        <ol class="relative border-l border-gray-200 dark:border-gray-700">    
        @forelse ($teamHistoryLog->take(3) as $log)
          <li class="mb-10 ml-4">
              <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-800 dark:bg-gray-700"></div>
              <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $log->created_at->format('Y/m/d') }}</time>
              
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $log->description }}</h3>
              <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
              <!-- <img class="w-8 h-8 rounded-full object-cover" src="{{ $log->causer->profile_photo_url }}" alt="{{ $log->causer->name }}"> -->
              {{ $log->causer->name }} {{ $log->description }} at {{ $log->created_at->format('H:i:s') }}</p>
          </li>
          @empty
    <div class="m-2">
    <p class="text-center font-bold">No finance log entries available.</p>
        <imgclass="w-full max-w-sm h-auto mx-auto transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0" :src="'{{ asset('no_data.svg') }}'" alt="image description">
    </div>
        @endforelse
    </ol>
    </div>
    <!-- End Team Logs -->



      </div>
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
          <div class="flex items-center justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
            <div>
              <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Data For Category</h3>
              <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">Categories</span>
            </div>
            <a href="#" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
              Full report
              <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
          </div>
          <div id="traffic-by-device"></div>
          <!-- Card Footer -->
          <div class="flex items-center justify-between pt-4 lg:justify-evenly sm:pt-6">
            <div>
              <svg class="w-8 h-8 mb-1 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.25A2.25 2.25 0 014.25 2h11.5A2.25 2.25 0 0118 4.25v8.5A2.25 2.25 0 0115.75 15h-3.105a3.501 3.501 0 001.1 1.677A.75.75 0 0113.26 18H6.74a.75.75 0 01-.484-1.323A3.501 3.501 0 007.355 15H4.25A2.25 2.25 0 012 12.75v-8.5zm1.5 0a.75.75 0 01.75-.75h11.5a.75.75 0 01.75.75v7.5a.75.75 0 01-.75.75H4.25a.75.75 0 01-.75-.75v-7.5z"></path>
              </svg>
              <h3 class="text-gray-500 dark:text-gray-400">Desktop</h3>
              <h4 class="text-xl font-bold dark:text-white">
                234k
              </h4>
              <p class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                <span class="flex items-center mr-1.5 text-sm text-green-500 dark:text-green-400">
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                  </svg>
                  4% 
                </span>
                vs last month
              </p>
            </div>
            <div>
              <svg class="w-8 h-8 mb-1 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M8 16.25a.75.75 0 01.75-.75h2.5a.75.75 0 010 1.5h-2.5a.75.75 0 01-.75-.75z"></path>
                <path clip-rule="evenodd" fill-rule="evenodd" d="M4 4a3 3 0 013-3h6a3 3 0 013 3v12a3 3 0 01-3 3H7a3 3 0 01-3-3V4zm4-1.5v.75c0 .414.336.75.75.75h2.5a.75.75 0 00.75-.75V2.5h1A1.5 1.5 0 0114.5 4v12a1.5 1.5 0 01-1.5 1.5H7A1.5 1.5 0 015.5 16V4A1.5 1.5 0 017 2.5h1z"></path>
              </svg>
              <h3 class="text-gray-500 dark:text-gray-400">Phone</h3>
              <h4 class="text-xl font-bold dark:text-white">
                94k
              </h4>
              <p class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                <span class="flex items-center mr-1.5 text-sm text-red-600 dark:text-red-500">
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z"></path>
                  </svg>
                  1% 
                </span>
                vs last month
              </p>
            </div>
            <div>
              <svg class="w-8 h-8 mb-1 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M5 1a3 3 0 00-3 3v12a3 3 0 003 3h10a3 3 0 003-3V4a3 3 0 00-3-3H5zM3.5 4A1.5 1.5 0 015 2.5h10A1.5 1.5 0 0116.5 4v12a1.5 1.5 0 01-1.5 1.5H5A1.5 1.5 0 013.5 16V4zm5.25 11.5a.75.75 0 000 1.5h2.5a.75.75 0 000-1.5h-2.5z"></path>
              </svg>
              <h3 class="text-gray-500 dark:text-gray-400">Tablet</h3>
              <h4 class="text-xl font-bold dark:text-white">
                16k
              </h4>
              <p class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                <span class="flex items-center mr-1.5 text-sm text-red-600 dark:text-red-500">
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z"></path>
                  </svg>
                  0,6% 
                </span>
                vs last month
              </p>
            </div>
          </div>
        </div>
      </div>
</div>
<div>@include('livewire.chart-data')</div>

</div>