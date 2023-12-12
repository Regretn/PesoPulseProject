<div>
    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="fixed inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="bg-white p-4 rounded shadow-lg w-full h-full max-w-screen-md overflow-y-auto">
            <p x-text="'Selected item ID: ' + selectedItem">dasd</p>
            <p x-text="'Finance Title: ' + finances.find(finance => finance.id === selectedItem)?.finance_title"></p>

            <p x-text="'Finance Title: ' + finances.find(finance => finance.id === selectedItem)">asd</p>
            <button @click="showModal = false" class="bg-gray-500 text-white p-2">Close</button>
            <div>
            <form>
                
            <label class="block">
                <span class="block text-sm font-medium text-slate-700">Social Security Number</span>
                <input class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500  w-full"/>
            </label>
            <label class="block">
                <span class="block text-sm font-medium text-slate-700">Social Security Number</span>
                <input class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500  w-full"/>
            </label>
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Select an option</label>
                <select id="countries" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Choose a country</option>
                <option value="US">United States</option>
                <option value="CA">Canada</option>
                <option value="FR">France</option>
                <option value="DE">Germany</option>
                </select>
            
                <label for="datepicker">Select a date:</label>
                <input type="date" id="datepicker" name="datepicker" class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500  w-full"/>
                
                <label class="block">
                <span class="block text-sm font-medium text-slate-700">Social Security Number</span>
                <input class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500  w-full"/>
            </label>

            <div class="form-container columns-2">
                <label class="block">
                <span class="block text-sm font-medium text-slate-700">Total Tax</span>
                <input class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 w-full"/>
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
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                item Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Item Quantity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Price
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">
                                Silver
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <img
  class="w-full max-w-sm h-auto mx-auto transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0"
  :src="'{{ asset('no_image.svg') }}'"
  alt="image description"
>


>        </form>
            </div>
        </div>
    </div>
</div>
</div>
