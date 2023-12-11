<!-- resources/views/finance/create.blade.php -->
<div>
    <div>
        <h1>Create Finance Record</h1>

        <form action="{{ route('finance.post') }}" method="post">
            @csrf

            <div>
                <label for="finance_title">Finance Title</label>
                <input type="text" name="finance_title" id="finance_title" value="{{ old('finance_title') }}">
                @error('finance_title')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="category_id">Category ID</label>
                <input type="text" name="category_id" id="category_id" value="{{ old('category_id') }}">
                @error('category_id')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label for="document_type">Document Type</label>
                <input type="text" name="document_type" id="document_type" value="{{ old('document_type') }}">
                @error('document_type')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="finance_amount">Finance Amount</label>
                <input type="text" name="finance_amount" id="finance_amount" value="{{ old('finance_amount') }}">
                @error('finance_amount')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="finance_description">Finance Description</label>
                <textarea name="finance_description" id="finance_description">{{ old('finance_description') }}</textarea>
                @error('finance_description')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="finance_purchase_date">Finance Purchase Date</label>
                <input type="date" name="finance_purchase_date" id="finance_purchase_date" value="{{ old('finance_purchase_date') }}">
                @error('finance_purchase_date')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Submit</button>
        </form>

        @if (session()->has('message'))
            <div>
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
