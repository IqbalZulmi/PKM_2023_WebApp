<?php

namespace App\Livewire;

use App\Models\Sensor;
use Livewire\Attributes\On;
use Livewire\Component;

class DetailDashboard extends Component{
    public $id_titik;
    public $dataTerbaru;
    public $empatDataTerbaru;

    public $formattedData;

    public function mount($id_titik)
    {
        $this->id_titik = $id_titik;

        $this->dataTerbaru = Sensor::where('id_titik', $this->id_titik)->latest()->first();

        $this->empatDataTerbaru = Sensor::where('id_titik', $this->id_titik)
            ->latest()
            ->take(4)
            ->get();

        $data = [];
        
        foreach($this->empatDataTerbaru as $item){
            $data['label'][]= $item->created_at->format('d F Y - H:i:s');
            $data['turbidity'][] = $item->turbidity;
            $data['ph'][] = $item->ph;
            $data['temperature'][] = $item->temperature;
        }

        $this->formattedData = json_encode($data);

    }

    public function refreshDataChart(){
        $this->empatDataTerbaru = Sensor::where('id_titik', $this->id_titik)
            ->latest()
            ->take(4)
            ->get();

        $data = [];

        foreach($this->empatDataTerbaru as $item){
            $data['label'][]= $item->created_at->format('d F Y - H:i:s');
            $data['turbidity'][] = $item->turbidity;
            $data['ph'][] = $item->ph;
            $data['temperature'][] = $item->temperature;
        }

        $this->formattedData = json_encode($data);

        $this->dispatch('refreshChart',$this->formattedData);
    }


    public function render()
    {
        return view('livewire.detail-dashboard', [
            'dataTerbaru' => $this->dataTerbaru,
            'empatDataTerbaru' => $this->empatDataTerbaru,
        ]);
    }
}

