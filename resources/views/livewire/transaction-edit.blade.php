<div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                            <!-- Start of edit -->
                                                <template x-teleport="body">
                                                <div tabindex="-1" x-show="open" class="fixed top-0 right-0 bottom-0 left-0 flex items-center justify-center overflow-y-auto">
                                                    <div class="relative p-4 w-full max-w-2xl max-h-full ">
                                                        <!-- Modal content -->
                                                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 ">
                                                            <!-- Modal header -->
                                                            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add Transaction</h3>
                                                                <button wire:click="deleteAddContent" @click="open = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-target="createProductModal" data-modal-toggle="createProductModal">
                                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>
                                                        <div>

                                                        <form wire:submit.prevent="updateFinance({{$finance->id}})">

                                                            <!-- Choose between Add and and Items -->
                                                            <div x-data="{ tab: 'add' }" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                                                                <div class="font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400">
                                                                <a :class="{ 'text-green-500': tab === 'add' }" x-on:click.prevent="tab = 'add'" href="#" class="inline-block w-full p-4 rounded-tl-lg hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Add Transaction</a>
                                                                <a :class="{ 'text-green-500': tab === 'item' }" x-on:click.prevent="tab = 'item'" href="#" class="inline-block w-full p-4 rounded-tr-lg hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Transaction Items</a>                                
                                                                <a :class="{ 'text-green-500': tab === 'image' }" x-on:click.prevent="tab = 'image'" href="#" class="inline-block w-full p-4 rounded-tr-lg hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Image</a>                                

                                                            </div>
                                                            <!-- Content for Add -->

                                                            <div x-show="tab === 'add'">

                                                                <div class="pt-4 grid gap-4 mb-4 sm:grid-cols-2">
                                                                    <div>
                                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                                        <input wire:model.live="finance_title" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                                                    </div>
                                                                    <div>
                                                                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Amount @error('finance_amount') <em style="color: red;">{{$message}}</em>@enderror</label>
                                                                        <input wire:model.live="finance_amount" type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="₱0" required="">
                                                                    </div>
                                                                    <div>
                                                                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                                                        <select wire:model="transaction_type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                            <option value="" selected="">Select Type</option>
                                                                            <option value="0">Income</option>
                                                                            <option value="1">Expense</option>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    <div>
                                                                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                                        <div class="relative">
                                                                            <select wire:model="category_id" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 overflow-auto max-h-40" required="">
                                                                                <option value="" >Select a category</option>
                                                                                @foreach($categories as $category)
                                                                                    <option value="{{ $category->id }}" @if($category->id == $category_id) selected @endif>{{ $category->category_name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label for="document-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Document Type</label>
                                                                        <input wire:model="document_type" type="text" name="document-name" id="document-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Document name">
                                                                    </div>

                                                                    <div>
                                                                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                                                        <input wire:model="finance_purchase_date" type="date" name="document-name" id="document-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Date" required="">
                                                                    </div>
                                                                    <div>
                                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Name</label>
                                                                        <input wire:model="supplier_name" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Supplier name" >
                                                                    </div>
                                                                    <div>
                                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Address</label>
                                                                        <input wire:model="supplier_address" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Supplier address">
                                                                    </div>
                                                                    <div>
                                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Phone @error('supplier_phone') <em style="color: red;">{{$message}}</em>@enderror</label>
                                                                        <input wire:model.live="supplier_phone" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Supplier Phone">
                                                                    </div>

                                                                    <div class="flex space-x-4">
                                                                        <div>
                                                                            <label for="tax-amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tax Amount @error('finance_tax_amount') <em style="color: red;">{{$message}}</em>@enderror</label>
                                                                            <input wire:model.live="finance_tax_amount" type="text" name="tax-amount" id="tax-amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Tax Amount">
                                                                        </div>
                                                                        <div>
                                                                            <label for="tax-rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tax Rate @error('finance_tax_rate') <em style="color: red;">{{$message}}</em>@enderror</label>
                                                                            <input  wire:model.live="finance_tax_rate" type="text" name="tax-rate" id="tax-rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Tax Rate">
                                                                        </div>
                                                                    </div>
                                                                    <div class="sm:col-span-2"><label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label><textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write product description here"></textarea></div>
                                                                </div>
                                                            </div>

                                                            <!-- Image -->
                                                            <div x-show="tab === 'image'">
                                                            <div class="m-2">
                                                                @if($image_path)
                                                                <p class="hidden font-bold">No image entries available.{{$image}}</p>

                                                                    <img class="w-full max-w-sm h-auto mx-auto transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0"
                                                                        src="{{$image_path}}" alt="Image description">
                                                                @elseif($image == NULL)
                                                                <p class="flex justify-center items-center text-center font-bold">There's no image available.</p>
                                                                @endif
                                                            </div>
                                                        </div>

                                                                
                                                            <!-- Content for Items -->
                                                            <div x-show="tab === 'item'">
                                                                <div class="" id="about">
                                                                <form wire:submit.prevent="addItem">
                                                                <div class="pt-4 grid gap-4 mb-4 sm:grid-cols-2">
                                                                    <div>
                                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Name</label>
                                                                        <input wire:model="name" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                                                    </div>
                                                                    <div>
                                                                        <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Qty @error('qty') <em style="color: red;" >{{$message}}</em>@enderror</label>
                                                                        <input wire:model.live="qty" type="text" name="qty" id="qty" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                                                    </div>
                                                                    <div>
                                                                        <label for="unitPrice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Unit Price @error('unitPrice') <em style="color: red;" >{{$message}}</em>@enderror</label>
                                                                        <input wire:model.live="unitPrice" type="text" name="unitPrice" id="unitPrice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="₱0" required="">
                                                                    </div>   
                                                                    <div>
                                                                        <label for="totalAmount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item total Amount @error('totalAmount') <em style="color: red;">{{$message}}</em>@enderror</label>
                                                                        <input wire:model.live="totalAmount" type="text" step="0.01 name="totalAmount" id="totalAmount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="₱0" required="">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Add Item</button>
                                                                </div>
                                                                </form>
                                                                <div class="overflow-x-auto">
                                                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                        <tr>
                                                                            <th scope="col" class="px-4 py-4">Item Name</th> 
                                                                            <th scope="col" class="px-4 py-3">Item Qty</th>
                                                                            <th scope="col" class="px-4 py-3">Item Unit Price</th>
                                                                            <th scope="col" class="px-4 py-3">Item total Amount</th>
                                                                            <th scope="col" class="px-4 py-3">
                                                                                <span class="sr-only">Actions</span>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($items as $index => $item)
                                                                        <tr class="border-b dark:border-gray-700">
                                                                            <td class="px-4 py-3">{{ $item['name'] }}</td>
                                                                            <td class="px-4 py-3">{{ $item['qty'] }}</td>
                                                                            <td class="px-4 py-3">{{ $item['unitPrice'] }}</td>
                                                                            <td class="px-4 py-3">{{ $item['totalAmount'] }}</td>
                                                                            <td class="px-4 py-3 flex items-center justify-end">
                                                                                <button wire:click.prevent="removeItem({{ $index }})" type="button" class="flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-500 dark:hover:text-red-400">
                                                                                    <svg class="w-4 h-4 mr-2" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" d="M6.09922 0.300781C5.93212 0.30087 5.76835 0.347476 5.62625 0.435378C5.48414 0.523281 5.36931 0.649009 5.29462 0.798481L4.64302 2.10078H1.59922C1.36052 2.10078 1.13161 2.1956 0.962823 2.36439C0.79404 2.53317 0.699219 2.76209 0.699219 3.00078C0.699219 3.23948 0.79404 3.46839 0.962823 3.63718C1.13161 3.80596 1.36052 3.90078 1.59922 3.90078V12.9008C1.59922 13.3782 1.78886 13.836 2.12643 14.1736C2.46399 14.5111 2.92183 14.7008 3.39922 14.7008H10.5992C11.0766 14.7008 11.5344 14.5111 11.872 14.1736C12.2096 13.836 12.3992 13.3782 12.3992 12.9008V3.90078C12.6379 3.90078 12.8668 3.80596 13.0356 3.63718C13.2044 3.46839 13.2992 3.23948 13.2992 3.00078C13.2992 2.76209 13.2044 2.53317 13.0356 2.36439C12.8668 2.1956 12.6379 2.10078 12.3992 2.10078H9.35542L8.70382 0.798481C8.62913 0.649009 8.5143 0.523281 8.37219 0.435378C8.23009 0.347476 8.06631 0.30087 7.89922 0.300781H6.09922ZM4.29922 5.70078C4.29922 5.46209 4.39404 5.23317 4.56282 5.06439C4.73161 4.8956 4.96052 4.80078 5.19922 4.80078C5.43791 4.80078 5.66683 4.8956 5.83561 5.06439C6.0044 5.23317 6.09922 5.46209 6.09922 5.70078V11.1008C6.09922 11.3395 6.0044 11.5684 5.83561 11.7372C5.66683 11.906 5.43791 12.0008 5.19922 12.0008C4.96052 12.0008 4.73161 11.906 4.56282 11.7372C4.39404 11.5684 4.29922 11.3395 4.29922 11.1008V5.70078ZM8.79922 4.80078C8.56052 4.80078 8.33161 4.8956 8.16282 5.06439C7.99404 5.23317 7.89922 5.46209 7.89922 5.70078V11.1008C7.89922 11.3395 7.99404 11.5684 8.16282 11.7372C8.33161 11.906 8.56052 12.0008 8.79922 12.0008C9.03791 12.0008 9.26683 11.906 9.43561 11.7372C9.6044 11.5684 9.69922 11.3395 9.69922 11.1008V5.70078C9.69922 5.46209 9.6044 5.23317 9.43561 5.06439C9.26683 4.8956 9.03791 4.80078 8.79922 4.80078Z" />
                                                                                    </svg>
                                                                                    Remove
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            
                                                        </div>

                                                        </div>

                                                        <div class="flex justify-end">
                                                        <div>
                                                        <div wire:loading wire:target="submitForm" class="absolute inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
                                                        <div class="flex items-center justify-center">
                                                            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-green-200"></div>
                                                        </div>
                                                    </div>
                                                        </div>
                                                            <button type="submit" class="inline-flex items-center bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                                                </svg>
                                                                Update
                                                            </button>
                                                        </div>
                                                    </form>
                                                        </div>
                                                        </div>
                                                        </div>                           
                                                    </div>
                                                </div>
                                                </template>
                                            </div>
                                            <!-- End of edit -->