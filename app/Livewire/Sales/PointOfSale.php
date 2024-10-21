<?php

namespace App\Livewire\Sales;

use App\Actions\OrderSaver;
use App\Actions\PaymentProcessor;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class PointOfSale extends Component
{
    use WithPagination;

    public string $searchTerm = '';
    public bool $success = false;

    public $cartShippingFee = 0;
    public $cartTax = 0;
    public $cartTotal = 0;
    public $cartItems = [];
    public Collection $cart;

    public $discountAmount = 0;
    public $discountCode = '';

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
    }

    /**
     * Process cash payments
     */
    public function processCashPayment($cashAmount)
    {
        // Process cash payment and save order
        $change = PaymentProcessor::cash($cashAmount);

        OrderSaver::create([
            'is_paid' => true,
            'payment_method' => 'cash',
            'customer_phone' => ''
        ]);
        dd($this->cart->first());
    }

    public function saveOrder(): void
    {
        $order = new Order();
//        $order->fill([
//            'customer_name' => ['required','string','max:255'],
//            'customer_email' => ['required','email','max:255'],
//            'customer_phone' => ['required','string','max:255'],
//        ]);
        $order->total = $this->cart->sum('subtotal');
        $order->save();

        foreach ($this->cart as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price = $cartItem->product->price;
            $orderItem->save();
        }

        Cart::destroyCart();
        $this->success = true;
        $this->cart = Cart::getCart();
        $this->resetPage();
    }

    public function mount()
    {
        $this->updateCart();
    }

    public function render()
    {
        $query = Product::query();
        $query->where('is_active', true);

        if ($this->searchTerm !== '') {
            $query->where('name', 'like', '%' . $this->searchTerm . '%');
        }

        return view('livewire.sales.point-of-sale', [
            'order' => Order::query()->first(),
            'products' => $query->paginate(12)
        ]);
    }
}
