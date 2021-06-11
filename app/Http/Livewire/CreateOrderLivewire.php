<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Orders\CreateOrder;
use App\Services\ZipCreator;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateOrderLivewire extends Component
{
    use WithFileUploads;

    public $files = [];
    public $title = '';
    public $translation_mode = '2';
    public $Expected_date = '';
    public $source_language = 'English';
    public $destination_language = 'Persian';
    public $message = '';
    
    public function save(ZipCreator $ZipCreator,Order $order,CreateOrder $createOrder)
    {
        $validated = $this->validate([
           'files' => 'required',
           'files.*' => ['max:20000','mimes:docx,doc,txt,bmp,jpg,png,pdf,gif,html,htm,rar,zip,ppt,pps,sdlppx,xliff'],
           'title' => ['max:20'],
           'translation_mode' => ['in:1,2,3'],
           'Expected_date' => ['shamsi_date'],
           'source_language' => ['in:English,Persian','required'],
           'destination_language' => ['in:English,Persian','required'],
           'message' => ['max:250'],
        ]);

        $order = $createOrder->create($validated);

        session()->flash('NewOrderResult','success');
        session()->flash('id', $order->id);
        return redirect('/orders');

    }

    public function render()
    {
        return view('livewire.create-order-livewire');
    }
}
