<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\WithFileUploads;

class MindeeComponent extends Component
{
    use WithFileUploads;

    public $file;
    public $result;
    public $extractedData; 


    public function render()
    {
        return view('livewire.mindee-component');
    }

    public function predict()
    {
        $api_key = 'f0e5b4e57d5656133d84d6ab62f0fddf';
        $account = 'mindee';
        $version = '1';
        $endpoint = 'financial_document';

        $url = "https://api.mindee.net/v1/products/{$account}/{$endpoint}/v{$version}/predict";

        $response = Http::withHeaders([
            'Authorization' => "Token {$api_key}",
        ])->attach('document', file_get_contents($this->file->getRealPath()), 'document.pdf', [
            'Content-Type' => $this->file->getClientMimeType(),
        ])->post($url);

        $this->result = $response->json();

        if ($response->successful()) {
            $this->result = $response->json();
            $this->extractedData = $this->mapExtractedData($this->result);
        } else {
            // Handle the case when the response is not successful
            $this->result = [
                'api_request' => [
                    'error' => [
                        'code' => $response->status(),
                        'details' => 'HTTP Error',
                        'message' => 'Unexpected error occurred',
                    ],
                    'resources' => [],
                    'status' => 'failure',
                    'status_code' => $response->status(),
                    'url' => $url,
                ],
            ];
        }
    
    }

    public function mapExtractedData($result)
    {
        return [
            'document' => [
                'type' => data_get($result, 'document.inference.prediction.document_type.value', 'N/A'),
                'supplier_name' => data_get($result, 'document.inference.prediction.supplier_name.value', 'N/A'),
                'category' => data_get($result, 'document.inference.prediction.category.value', 'N/A'),
                'purchase_date' => data_get($result, 'document.inference.prediction.due_date.value', 'N/A'),
                'total_amount' => data_get($result, 'document.inference.prediction.total_amount.value', 'N/A'),
                'total_net' => data_get($result, 'document.inference.prediction.total_net.value', 'N/A'),
                'total_tax' => data_get($result, 'document.inference.prediction.total_tax.value', 'N/A'),
                'line_items' => data_get($result, 'document.inference.prediction.line_items', []),
            ],
        ];
    }
}
