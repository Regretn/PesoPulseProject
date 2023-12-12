<div class="p-10">
<form style="margin-top: 2rem;">
            <label class="block">
                <span class="block text-sm font-medium text-slate-700">Title</span>
                <input class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 w-full">
            </label>
            <label for="document_type" class="block mb-2 text-sm font-medium text-gray-900">Document Type</label>
            <select id="document_type" class="appearance-none relative bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 sm:p-2 md:p-3 max-w-full">
                <option value="0">Income</option>
                <option value="1">Expense</option>
                <option value="2">Invoice</option>
            
            </select>
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
            <select id="category"  class="appearance-none relative bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 sm:p-2 md:p-3 max-w-full">
                <option value="1">Groceries</option>
                <option value="2">Utilities</option>
                <option value="3">Rent/Mortgage</option>
                <option value="4">Transportation</option>
                <option value="5">Insurance</option>
                <option value="6">Healthcare</option>
                <option value="7">Entertainment</option>
                <option value="8">Dining Out</option>
                <option value="9">Shopping</option>
                <option value="10">Savings</option>
                <option value="11">Investments</option>
                <option value="12">Loan Repayment</option>
                <option value="13">Education</option>
                <option value="14">Travel</option>
                <option value="15">Gifts/Donations</option>
            </select>
            <label for="datepicker">Select a date:</label>
                <input type="date" id="datepicker" name="datepicker" class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 w-full"/>
                <label class="block">
                <span class="block text-sm font-medium text-slate-700">Total Amount</span>
                <input class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500  w-full "/>
            </label>

            <div class="form-container columns-2">
                <label class="block">
                <span class="block text-sm font-medium text-slate-700">Total Tax</span>
                <input class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 w-full" />
                </label>
                <label class="block">
                <span class="block text-sm font-medium text-slate-700">Total Net</span>
                <input class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 w-full"/>
                </label>
            </div>

            <div class=" m-3 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Item Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Item Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Unit Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Total Amount
                        </th>
                    </tr>
                </thead>
                <tbody>
                <template x-for="item in teamData.items" :key="item.id">
                        <tr x-for="item in teamData.items" :key="item.id" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4" x-text="item.item_name"></td>
                            <td class="px-6 py-4" x-text="item.item_quantity"></td>
                            <td class="px-6 py-4" x-text="item.item_unit_price"></td>
                            <td class="px-6 py-4" x-text="item.item_total_amount"></td>
                        </tr>
                    </template>
                </tbody>
            </table>
            </div>
            
            <img
  class="w-full max-w-sm h-auto mx-auto transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0"
  :src="'{{ asset('no_image.svg') }}'"
  alt="image description"
>

<button
        type="button"
        class="mt-4 px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-all duration-300"
        @click="deleteRecord"
    >
        Delete
    </button>
</form>
</div>