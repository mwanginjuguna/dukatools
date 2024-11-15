<?php

namespace App\Livewire\Sales;

use App\Actions\OrderSaver;
use App\Actions\PaymentProcessor;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use App\Services\VendorService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class PointOfSale extends Component
{
    use WithPagination;

    public string $searchTerm = '';
    public bool $success = false;

    public float $cartShippingFee = 0;
    public float $cartTax = 0;
    public float $cartTotal = 0;
    public array $cartItems = [];
    public Collection $cart;

    public float $discountAmount = 0;
    public string $discountCode = '';

    public string $paymentMethod = '';

    public float $cashAmount = 0;
    public float $mpesaAmount = 0;
    public float $cardAmount = 0;

    public string $mpesaNumber = '';
    public string $transactionCode = '';
    public string $customerNumber = '';
    public string $customerEmail = '';
    public string $customerName = '';

    private $orderData = [];

    public $vendor;
    public $customerSource = 'shop';

    public function addToCart(int $productId): void
    {
        Cart::addToCart($productId);
        $this->updateCart();
    }

    public function removeFromCart(int $productId): void
    {
        Cart::removeFromCart($productId);
        $this->updateCart();
    }

    public function deleteCart()
    {
        Cart::destroyCart();
    }

    public function updateCart()
    {
        $this->cart = Cart::getCart();
        $this->cartTotal = Cart::getCartTotal() ?? 0;
        $this->cardAmount = $this->cartTotal;
        $this->mpesaAmount = $this->cartTotal;
    }

    /**
     * Process cash payments
     */
    public function processCashPayment()
    {
        // Process cash payment and save order
        $change = PaymentProcessor::cash($this->cashAmount);
        $this->paymentMethod = 'cash';
        $this->saveOrder();
    }

    /**
     * Process mpesa payments
     */
    public function processMpesaPayment()
    {
        // Process mpesa payment and save order
        PaymentProcessor::mpesa($this->mpesaNumber, $this->transactionCode, $this->mpesaAmount);

        $this->paymentMethod ='mpesa';
        $this->saveOrder();

        // capture transaction
        // TODO: Create TransactionCapture action to record transactions
        // TODO: Capture mpesa transaction with logic in PaymentProcessor

    }

    /**
     * Process card payments
     */
    public function processCardPayment()
    {
        // Process card payment and save order
        PaymentProcessor::card($this->transactionCode, $this->cardAmount);

        $this->paymentMethod ='card';
        $this->saveOrder();
        // capture transaction
    }

    private function saveOrder(): void
    {
        $this->dispatch('saving-order');
        OrderSaver::create([
            'is_paid' => true,
            'payment_method' => $this->paymentMethod,
            'customer_name' => $this->customerName,
            'customer_email' => $this->customerEmail,
            'customer_phone' => $this->customerNumber,
            'transaction_code' => $this->transactionCode,
            'mpesa_number' => $this->mpesaNumber,
            'mpesa_amount' => $this->mpesaAmount,
            'card_amount' => $this->cardAmount,
            'cash_amount' => $this->cashAmount,
            'customer_id' => null,
            'vendor_id' => $this->vendor->id,
            'branch_id' => null,
            'employee_id' => null,
            'customer_source' => $this->customerSource
        ]);

        // update product stock quantity
        foreach ($this->cart as $item) {
            $product = Product::find($item['product']['id']);
            $product->stock_quantity -= $item['quantity'];
            $product->save();
        }

        Cart::destroyCart();
        $this->success = true;
        $this->cart = Cart::getCart();
        $this->cartTotal = Cart::getCartTotal();
        session()->flash('success', 'Order Saved successfully.');
        $this->dispatch('order-saved');
        $this->redirectRoute('vendor.pos');
    }

    public function mount()
    {
        $this->updateCart();

        $vendorService = new VendorService();

        $this->vendor = session()->get('vendor') ?? $vendorService->getVendor();
    }

    public function render()
    {
        $query = Product::query();
        $query->where('is_active', true)
            ->where('vendor_id', $this->vendor->id);

        if ($this->searchTerm !== '') {
            $query->where('name', 'like', '%' . $this->searchTerm . '%');
        }

        return view('livewire.sales.point-of-sale', [
            'products' => $query->paginate(12)
        ]);
    }
}
