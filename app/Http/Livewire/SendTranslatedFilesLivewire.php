<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use App\Notifications\FilesTranslatedNotification;
use App\Services\ZipCreator;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class SendTranslatedFilesLivewire extends Component
{
    use WithFileUploads;
    public $orderId = '';
    public $files = '';


    public function save(ZipCreator $zipCreator ,Order $order){

        $this->validate([
            'files' => 'required',
            'orderId' => 'required',
        ]);
        // check if exist delete it
        if( !empty(Order::find($this->orderId)->translated_files ))
        {
            $rawFiles = Order::find($this->orderId)->translated_files;
            $files = str_replace('storage/','',json_decode($rawFiles));
            Storage::disk('public')->delete($files);
        }
        // create zip file and stor data
        $zip_path = $zipCreator->CreateZip($this->files);
        $result = $order->Update_status_for_sending_translated_files($this->orderId,$zip_path);

        // check if saving data was  delete it
        if(!$result){
            $files = str_replace('storage/','',json_decode($zip_path));
            Storage::disk('public')->delete($zip_path);
            return back()->with('try','ناموفق دوباره امتحان کنید!');
        }
        User::find(auth()->id())->notify(new FilesTranslatedNotification($this->orderId,auth()->user()->name));
        session()->flash('status' , 'ارسال فایل موفقیت آمیز بود');
        return redirect('/admin/orders');
    }

    public function render()
    {
        return view('livewire.send-translated-files-livewire');
    }
}
