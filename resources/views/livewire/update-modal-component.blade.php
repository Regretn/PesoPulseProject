<div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="fixed inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="bg-white p-4 rounded shadow-lg w-full h-full max-w-screen-md overflow-y-auto">
            <div class="flex">
                <div class="ml-auto">
                    <button @click="showModal = false" class="text-gray-500 p-2">Close</button>
                </div>
            </div>
            <div>
                <div>
                <form class="max-w-sm mx-auto">
                <div class="mb-5">
                    <label for="finance_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Finance Title</label>
                    <input type="text" value={{$finance_title}} wire:model="finance_title" id="finance_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter finance title" required>
                </div>
                <div class="mb-5">
                    <label for="finance_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Finance Amount</label>
                    <input type="number" value={{$finance_amount}} wire:model="finance_amount" id="finance_amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter finance Amount" required>
                </div>

                <div class="mb-5">
                    <label for="finance_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Finance Description</label>
                    <textarea value={{$finance_description}} wire:model="finance_description" id="finance_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-20 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter finance description"></textarea>
                </div>

                <div class="mb-5">
                    <label for="finance_purchase_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purchase Date</label>
                    <input type="date" value={{$finance_purchase_date}} wire:model="finance_purchase_date" id="finance_purchase_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter finance title" required>
                </div>

                <div class="mb-5">
                    <label for="transaction_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transaction Type</label>
                    <select id="transaction_type" wire:model="transaction_type" name="transaction_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="0" @if($finance->transaction_type == 0) selected @endif>Income</option>
                        <option value="1" @if($finance->transaction_type == 1) selected @endif>Expense</option>
                        <option value="2" @if($finance->transaction_type == 2) selected @endif>Invoice</option>
                    </select>
                </div>


                <div class="mb-5">
                    <label for="supplier_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Address</label>
                    <input type="text" wire:model="supplier_address" id="supplier_address" value="{{$supplier_address}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter supplier address">
                </div>

                <div class="mb-5">
                    <label for="supplier_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Name</label>
                    <input type="text" value={{$supplier_name}} wire:model="supplier_name" id="supplier_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter supplier name">
                </div>

                <div class="mb-5">
                    <label for="supplier_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier Phone</label>
                    <input type="number" value={{$supplier_phone}} wire:model="supplier_phone" id="supplier_phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter supplier name">
                </div>
                <div class="flex justify-between">

                <div class="mb-5">
                    <label for="finance_tax_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Tax Amount</label>
                    <input type="number" value={{$finance_tax_amount}} wire:model="finance_tax_amount" id="finance_tax_amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter tax amount">
                </div>

                <div class="mb-5">
                    <label for="finance_tax_rate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tax Rate</label>
                    <input type="number" value={{$finance_tax_rate}} wire:model="finance_tax_rate" id="finance_tax_rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Tax Rate" required>
                </div>
                </div>

                <div class="mb-5">
                    <label for="document_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Document Type</label>
                    <select id="document_type" value={{$document_type}} wire:model="document_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="0" @if($document_type == 0) selected @endif>Income-Receipt</option>
                        <option value="1" @if($document_type == 1) selected @endif>Expense-Receipt</option>
                        <option value="2" @if($document_type == 2) selected @endif>Invoice</option>
                    </select>
                </div>

                <div class="mb-5">
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select id="category_id" wire:model="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="" disabled>Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == $category_id) selected @endif>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>




            <div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="margin-top: 5%; margin-bottom:5%;">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unit Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($finance->items as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->item_name}}
                            </th>
                            <td class="px-6 py-4">
                            {{$item->item_quantity}}
                            </td>
                            <td class="px-6 py-4">
                            {{$item->item_unit_price}}
                            </td>
                            <td class="px-6 py-4">
                            {{$item->item_total_amount}}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a wire:click.prevent="removeItem({{$item->id}})" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <button wire:click="updatePost({{$finance->id}})" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                </form>
            </div>
            <button wire:click="Delete({{$finance->id}})" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Delete</button>

            <h1>asdasd:{{ $finance->id}}</h1>
            </div>
            </div>
        </div>
    </div>
    </div>