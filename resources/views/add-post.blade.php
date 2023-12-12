
<di>
<form action="{{ route('add-post') }}" method="post">
            @csrf <!-- Corrected line -->
            
            <label for="finance_title">Title:</label>
            <input type="text" name="finance_title" value="{{ old('finance_title') }}" required>


            <label for="finance_amount">Amount:</label>
            <input type="number" name="finance_amount" value="{{ old('finance_amount') }}" required>

            <label for="finance_description">Description:</label>
            <textarea name="finance_description">{{ old('finance_description') }}</textarea>

            <label for="finance_purchase_date">Purchase Date:</label>
            <input type="date" name="finance_purchase_date" value="{{ old('finance_purchase_date') }}" required>

            <label for="transaction_type">Transaction Type:</label>
            <input type="text" name="transaction_type" value="{{ old('transaction_type') }}" required>

            <label for="supplier_address">Supplier Address:</label>
            <input type="text" name="supplier_address" value="{{ old('supplier_address') }}">

            <label for="supplier_name">Supplier Name:</label>
            <input type="text" name="supplier_name" value="{{ old('supplier_name') }}">

            <label for="supplier_phone">Supplier Phone:</label>
            <input type="text" name="supplier_phone" value="{{ old('supplier_phone') }}">

            <label for="finance_tax_amount">Tax Amount:</label>
            <input type="number" name="finance_tax_amount" value="{{ old('finance_tax_amount') }}">

            <label for="finance_tax_rate">Tax Rate:</label>
            <input type="number" name="finance_tax_rate" value="{{ old('finance_tax_rate') }}">

            <label for="document_type">Document Type:</label>
            <input type="number" name="document_type" value="{{ old('document_type') }}" required>

            <label for="image_path">Image Path:</label>
            <input type="text" name="image_path" value="{{ old('image_path') }}">

            <label for="category_id">Category ID:</label>
            <input type="number" name="category_id" value="{{ old('category_id') }}" required>

            <label for="file_id">File ID:</label>
            <input type="number" name="file_id" value="{{ old('file_id') }}">

            <button type="submit">Create Finance Record</button>
        </form>
    </div>
</div>
