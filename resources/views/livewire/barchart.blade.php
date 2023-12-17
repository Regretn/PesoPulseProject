
<div>
@if (count($finances) > 0)
@foreach ($finances->take(5) as $finance)
    <div x-data="{ showModal: false}" class="mt-4">
        <div class="flex max-h-[400px] w-full flex-col">
            <button wire:click="getFinance({{$finance->id}})"@click="showModal = true" class="group flex items-center gap-x-5 rounded-md px-2.5 py-2 transition-all duration-75 hover:bg-green-100">
                <div class="flex h-12 w-12 items-center rounded-lg bg-gray-200 text-black group-hover:bg-green-200">
                    <span class="tag w-full text-center text-2xl font-medium text-gray-700 group-hover:text-green-900">{{ $finance->title}}</span>
                </div>
                <div class="flex flex-col items-start justify-between font-light text-gray-600">
                    <p class="text-[20px]">{{ $finance->finance_title}}</p>
                    <span class="text-xs font-light text-gray-400">
                        @php
                            $timeDifference = now()->diffInMinutes($finance->created_at);
                        @endphp
                        @if ($timeDifference <= 5)
                            Current
                        @elseif ($finance->created_at->isToday())
                            Today
                        @else
                            {{ $finance->created_at->format('Y/m/d') }}
                        @endif
                    </span>

                </div>
                <div class="ml-auto">
                    @if($finance->transaction_type == 0) 
                        <p class="text-[18px] text-green-400">+ {{$finance->finance_amount}}</p>
                    @else
                        <p class="text-[18px] text-red-400">+ {{$finance->finance_amount}}</p> 
                    @endif
                </div>
        </button class="btn btn-primary btn-sm">
        </div>
        @include('livewire.update-modal-component')
@endforeach
@else
<div class="m-2" style="margin-top: 10%;;">
<p class="text-gray-500 text-center ">No finance log entries available at the moment.</p>
<p class="text-green-500 text-center ">Why not add a new finance log and keep things flowing?</p>
                    <img
  class="w-full max-w-sm h-auto mx-auto transition-all duration-300 rounded-lg cursor-pointer"
  :src="'{{ asset('dashboard_nodata.svg') }}'"
  alt="image description"
>@endif
    <div>
</div>



