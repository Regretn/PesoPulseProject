



<div class="mx-auto p-2">
@php
    $totalType0 = 0;
    $totalType1 = 0;
@endphp

@foreach($finances as $key => $finance)
     @if($finance->transaction_type == 0)
        @php
            $totalType0 += $finance->finance_amount;
        @endphp
    @else
        @php
            $totalType1 += $finance->finance_amount;
        @endphp
    @endif
@endforeach

    <div class=" bg-white flex items-center justify-center">
    <div class="lg:hidden text-center" style="border-radius: 650px;">
        <div class="flex lg:flex-row flex-col">
            <div class="w-1/1 h-20 text-white p-4" style="border-radius: 30px 30px 0 0;background-color: #2F7E79; color: white; padding: 1rem;"><div class="flex-col flex items-start" style="margin-left: 30px;"><a class="text-xl">Total Income</a><a class="text-2xl">$ {{ $totalType0 - $totalType1 }}</a></div></div>
            <div class="w-80 h-20 flex lg:flex-col">
                <div class="flex-1 text-white p-4" style="border-radius: 0 0 0 30px; background-color: #2F7E79; color: white; padding: 1rem;"><div class="flex-col flex justify-center"><a>Income</a><a>$ {{ $totalType0 }}</a></div></div>
                <div class="flex-1" style="border-radius: 0 0 30px 0; background-color: #2F7E79; color: white; padding: 1rem;"><div class="flex-col flex justify-center"><a>Expense</a><a>$ {{ $totalType1 }} </a></div></div>
            </div>
        </div>
    </div>

    <div class="hidden lg:flex space-x-4 text-center">
        <div class="flex-1 text-white p-4" style="border-radius: 25px; background-color: #2F7E79; color: white; padding: 1rem;"><a>Total Balance</a><a>$ 25848<a></div>
        <div class="w-96 flex-1 text-white p-4" style="border-radius: 25px; background-color: #2F7E79; color: white; padding: 1rem;"><a>Income</a><a>$ 25848<a></div>
        <div class="flex-1 text-white p-4" style="border-radius: 25px; background-color: #2F7E79; color: white; padding: 1rem;"><a>Expense</a><a>$ {{ $totalType1 }} <a></div>
    </div>
    </div>
<div class="flex justify-between m-4">
    <div><h1>Transaction History</h1></div>
<div x-data="{ open: false }">
    <button @click="open = true" class="">See All</button>
    <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="bg-white p-4 rounded shadow-lg w-full h-full max-w-screen-md">
                <p>This is your modal content.</p>
                <button @click="open = false" class="bg-gray-500 text-white p-2">Close</button>
            </div>
        </div>
    </div>
</div>
</div>


<!-- ItemList -->
<div x-data="{ showModal: false, selectedItem: null, teamData: null }">
    @foreach($finances as $key => $finance)
        <div class="mt-4">
            <div class="flex max-h-[400px] w-full flex-col">
                <button x-on:click="teamData = {{ json_encode($finance) }}; console.log(teamData); showModal = true; fetchData()" class="group flex items-center gap-x-5 rounded-md px-2.5 py-2 transition-all duration-75 hover:bg-green-100">
                    <div class="flex h-12 w-12 items-center rounded-lg bg-gray-200 text-black group-hover:bg-green-200">
                        <span class="tag w-full text-center text-2xl font-medium text-gray-700 group-hover:text-green-900">{{ $finance->title}}</span>
                    </div>
                    <div class="flex flex-col items-start justify-between font-light text-gray-600">
                        <p class="text-[20px]">{{ $finance->finance_title }}</p>
                        <span class="text-xs font-light text-gray-400">{{ $finance->created_at}}</span>
                    </div>
                    <div class="ml-auto">
                        @if($finance->transaction_type == 0)
                            <p class="text-[18px] text-green-400">+ {{ $finance->finance_amount}} pesos</p>
                        @else
                            <p class="text-[18px] text-red-400">- {{ $finance->finance_amount}} pesos</p>
                        @endif
                    </div>
                </button>
            </div>
        </div>
    @endforeach
    <div>
    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="bg-white p-4 rounded shadow-lg w-full h-full max-w-screen-md overflow-y-auto">
                <div class="flex">
                <p class="text-lg font-bold">Transaction</p>

                 <button @click="showModal = false" class="text-gray-500 p-2 ml-auto">Close</button>
                </div>
            <div>
            <form style="margin-top: 2rem;">
            <label class="block">
                <span class="block text-sm font-medium text-slate-700">Title</span>
                <input class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 w-full" x-model="teamData.finance_title">
            </label>
            <label for="document_type" class="block mb-2 text-sm font-medium text-gray-900">Document Type</label>
            <select id="document_type" x-model="teamData.document_type" class="appearance-none relative bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 sm:p-2 md:p-3 max-w-full">
                <option value="0">Income</option>
                <option value="1">Expense</option>
                <option value="2">Invoice</option>
            
            </select>
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
            <select id="category" x-model="teamData.category_id" class="appearance-none relative bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 sm:p-2 md:p-3 max-w-full">
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
                <input type="date" id="datepicker" name="datepicker" x-model="teamData.finance_purchase_date" class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 w-full"/>
                <label class="block">
                <span class="block text-sm font-medium text-slate-700">Total Amount</span>
                <input class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500  w-full " x-model="teamData.finance_amount"/>
            </label>

            <div class="form-container columns-2">
                <label class="block">
                <span class="block text-sm font-medium text-slate-700">Total Tax</span>
                <input class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 w-full" x-model="teamData.finance_tax_amount"/>
                </label>
                <label class="block">
                <span class="block text-sm font-medium text-slate-700">Total Net</span>
                <input class="rounded-xl border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 w-full"  x-model="teamData.finance_tax_rate"/>
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


</div>



