<?php

namespace App\Livewire\Charts;

use App\Actions\ProductFilters;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Livewire\Component;

class SalesByCategoryDoughnut extends Component
{
    public int $year = 2023;
    public object $vendor;
    public mixed $ordersPerYear;
    public mixed $orders;
    public mixed $products;
    public mixed $topProducts;
    public mixed $purchasedProducts;
    public int $productsCount;
    public int $ordersCount;
    public float $revenue;

    public int $maxChartBarValue = 10;

    // sales
    public array $categories = [];
    public mixed $categoryProducts;
    public array $salesPerCategory = [];
    public array $saleCountPerCategory = [];
    public array $revenuePerCategory = [];
    public array $categoryChartData = [];

    public array $months = [];
    public array $orderCountPerMonth = [];

    public mixed $totalPerYear = 0;
    public float $yearTotal = 0;

    public function getYearOrders()
    {
        $this->ordersPerYear = Order::query()
            ->where('vendor_id', $this->vendor->id)
            ->getYearOrders($this->year)
            ->oldest()
            ->get(['order_number', 'total', 'created_at'])
            ->groupBy(
                fn($order) => Carbon::parse($order->created_at)->monthName
            )->all();

        $this->updateMonths();

        $this->updateTotalAndCount();

        $this->maxChartBarValue = $this->orderCountPerMonth ? max($this->orderCountPerMonth) + 2 : 0;

    }

    public function updateChart()
    {
        $this->getYearOrders();

        $this->dispatch('update-sales-chart');
    }

    public function updateMonths()
    {
        $this->months = collect($this->ordersPerYear)->keys()->values()->toArray();
    }

    public function updateTotalAndCount()
    {
        $this->yearTotal = 0;
        foreach ($this->ordersPerYear as $monthly) {
            $this->yearTotal += $monthly->sum('total');
            $this->orderCountPerMonth[] = $monthly->count();
        }
        $this->totalPerYear = number_format($this->yearTotal, 2);
    }

    public function mount()
    {
        $this->vendor = session()->get('vendor');
        $this->year = now()->year;

        $this->revenue = Order::query()->where('vendor_id', $this->vendor->id)->sum('total');

        $this->getYearOrders();

        $this->categoryProducts = (new ProductFilters($this->vendor->id))
            ->purchasedProducts()
            ->get();

        $this->salesPerCategory = $this->categoryProducts
            ->groupBy(fn($product) => $product->category->name)->all();

        $this->categories = collect($this->salesPerCategory)
            ->keys()
            ->values()
            ->toArray();

        foreach ($this->salesPerCategory as $item)
        {
            $this->revenuePerCategory[] = $item->sum(fn($product)=>$product->price);
            $this->saleCountPerCategory[] = $item->count();
        }

        $this->categoryChartData = [
            'labels' => $this->categories,
            'revenue_dataset' => $this->revenuePerCategory,
            'sale_count_dataset' => $this->saleCountPerCategory,
        ];
    }

    public function render()
    {
        //dd($this->saleCountPerCategory);
        return view('livewire.charts.sales-by-category-doughnut');
    }
}
