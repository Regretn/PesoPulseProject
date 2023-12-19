<div>
<form wire:submit.prevent="predict" enctype="multipart/form-data">
    <div>
        <label for="file">Upload PDF file:</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" wire:model="file" id="file" onchange="previewImage()">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
    </div>
    <div>
        <button type="submit">Predict</button>
    </div>
</form>


    @if ($extractedData)
        <div>
            <h2>Extracted Data</h2>
            <p>Document Type: {{ $extractedData['document']['type'] }}</p>
            <p>Supplier Name: {{ $extractedData['document']['supplier_name'] }}</p>
            <p>Category: {{ $extractedData['document']['category'] }}</p>
            <p>Purchase Date: {{ $extractedData['document']['purchase_date'] }}</p>
            <p>Total Amount: {{ $extractedData['document']['total_amount'] }}</p>
            <p>Total Net: {{ $extractedData['document']['total_net'] }}</p>
            <p>Total Tax: {{ $extractedData['document']['total_tax'] }}</p>

            @if (!empty($extractedData['document']['line_items']))
                <div>
                    <h3 style="font-weight: bold;">Line Items</h3>
                    <ul>
                        @foreach ($extractedData['document']['line_items'] as $item)
                            <li>
                                <p>Description: {{ $item['description'] }}</p>
                                <p>Total Amount: {{ $item['total_amount'] }}</p>
                                <p>Unit Price: {{ $item['unit_price'] }}</p>
                                <p>Tax Rate: {{ $item['tax_rate'] }}</p>
                                <p>Quantity: {{ $item['quantity'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    @endif
</div>