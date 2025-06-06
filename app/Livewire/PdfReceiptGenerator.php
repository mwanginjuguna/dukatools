<?php

namespace App\Livewire;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.pdf'), Title('Receipt')]
class PdfReceiptGenerator extends Component
{
    public Order $order;

    public function pdf()
    {
        $pdf = Pdf::loadView('receipt.pdf');
        return $pdf->stream();
    }

    public function render()
    {
        return view('livewire.pdf-receipt-generator');
    }
}
