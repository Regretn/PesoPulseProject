<div class=" mx-auto mt-8">
    <form class="w-full max-w-lg mx-auto bg-white p-8 rounded " action="{{ route('finance.store') }}" method="POST">
        @csrf

        <div class="flex flex-wrap -mx-4 mb-6">
            <div class="w-full md:w-1/2 px-4 mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="finance_title">Title:</label>
                <input class="w-full border rounded px-3 py-2" type="text" name="finance_title" value="{{ old('finance_title') }}" required>
            </div>

            <div class="w-full md:w-1/2 px-4 mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="finance_amount">Amount:</label>
                <input class="w-full border rounded px-3 py-2" type="number" name="finance_amount" value="{{ old('finance_amount') }}" required>
            </div>
        </div>

        <div class="flex flex-wrap -mx-4 mb-6">
            <div class="w-full px-4 mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="finance_description">Description<a class="text-gray-300">(Optional)</a>
</label>
                <textarea class="w-full border rounded px-3 py-2" name="finance_description">{{ old('finance_description') }}</textarea>
            </div>

            <div class="w-full md:w-1/2 px-4 mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="finance_purchase_date">Purchase Date:</label>
                <input class="w-full border rounded px-3 py-2" type="date" name="finance_purchase_date" value="{{ old('finance_purchase_date') }}" required>
            </div>
        </div>

        <div class="flex flex-wrap -mx-4 mb-6">
            <div class="w-full md:w-1/2 px-4 mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="transaction_type">Transaction Type:</label>
                <select class="w-full border rounded px-3 py-2" name="transaction_type" required>
                    <option value="0" {{ old('transaction_type') == 'income' ? 'selected' : '' }}>Income</option>
                    <option value="1" {{ old('transaction_type') == 'expense' ? 'selected' : '' }}>Expense</option>
                </select>
            </div>
        </div>

        <div class="flex flex-wrap -mx-4 mb-6">
    <div class="w-full md:w-1/3 px-4 mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="supplier_address">Supplier Address<a class="text-gray-300">(Optional)</a>
</label>
        <input class="w-full border rounded px-3 py-2" type="text" name="supplier_address" value="{{ old('supplier_address') }}">
    </div>

    <div class="w-full md:w-1/3 px-4 mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="supplier_name">Supplier Name<a class="text-gray-300">(Optional)</a>
</label>
        <input class="w-full border rounded px-3 py-2" type="text" name="supplier_name" value="{{ old('supplier_name') }}">
    </div>

    <div class="w-full md:w-1/3 px-4 mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="supplier_phone">Supplier Phone<a class="text-gray-300">(Optional)</a>
</label>
        <input class="w-full border rounded px-3 py-2" type="text" name="supplier_phone" value="{{ old('supplier_phone') }}">
    </div>
</div>

<div class="flex flex-wrap -mx-4 mb-6">
    <div class="w-full md:w-1/3 px-4 mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="finance_tax_amount">Tax Amount<a class="text-gray-300">(Optional)</a>
</label>
        <input class="w-full border rounded px-3 py-2" type="number" name="finance_tax_amount" value="{{ old('finance_tax_amount') }}">
    </div>

    <div class="w-full md:w-1/3 px-4 mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="finance_tax_rate">Tax Rate<a class="text-gray-300">(Optional)</a>
</label>
        <input class="w-full border rounded px-3 py-2" type="number" name="finance_tax_rate" value="{{ old('finance_tax_rate') }}">
    </div>

    <div class="w-full md:w-1/3 px-4 mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="document_type">Document Type:</label>
        <select class="w-full border rounded px-3 py-2" name="document_type" required>
            <option value="1" {{ old('document_type') == 1 ? 'selected' : '' }}>Income</option>
            <option value="2" {{ old('document_type') == 2 ? 'selected' : '' }}>Expense Receipt</option>
            <option value="3" {{ old('document_type') == 3 ? 'selected' : '' }}>Invoice</option>
            <option value="4" {{ old('document_type') == 4 ? 'selected' : '' }}>File</option>
            <!-- Add more options as needed -->
        </select>
    </div>
</div>

            <div class="flex flex-wrap -mx-4 mb-6">
            

                <div class="w-full md:w-1/2 px-4 mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">Category ID:</label>
                    <select class="w-full border rounded px-3 py-2" name="category_id" required>
                    <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Groceries</option>
                        <option value="2" {{ old('category_id') == 1 ? 'selected' : '' }}>Utilities</option>
                        <option value="3" {{ old('category_id') == 2 ? 'selected' : '' }}>Rent/Mortgage</option>
                        <option value="4" {{ old('category_id') == 3 ? 'selected' : '' }}>Transportation</option>
                        <option value="5" {{ old('category_id') == 1 ? 'selected' : '' }}>Healthcare</option>
                        <option value="6" {{ old('category_id') == 2 ? 'selected' : '' }}>Entertainment</option>
                        <option value="7" {{ old('category_id') == 3 ? 'selected' : '' }}>Dining Out</option>                        <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Category 1</option>
                        <option value="8" {{ old('category_id') == 2 ? 'selected' : '' }}>Shopping</option>
                        <option value="9" {{ old('category_id') == 3 ? 'selected' : '' }}>Savings</option>                        <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Category 1</option>
                        <option value="10" {{ old('category_id') == 2 ? 'selected' : '' }}>Investments</option>
                        <option value="11" {{ old('category_id') == 3 ? 'selected' : '' }}>Loan Repayment</option>
                        <option value="12" {{ old('category_id') == 3 ? 'selected' : '' }}>Education</option>                        <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Category 1</option>
                        <option value="13" {{ old('category_id') == 2 ? 'selected' : '' }}>Travel</option>
                        <option value="14" {{ old('category_id') == 3 ? 'selected' : '' }}>Gifts</option>                        <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Category 1</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>

                    

            <div class="w-full md:w-1/2 px-4 mb-6">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="submit">Create Finance Record</button>
            </div>
        </div>
    </form>
</div>
