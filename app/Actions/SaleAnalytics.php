<?php

namespace App\Actions;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SaleAnalytics
{
    public Builder $order;
    public function __construct()
    {
        $this->order = Order::query();
    }

    /**
     * Today sales
     */
    public function getTodaySales(): Builder
    {
        return $this->order->where('created_at', today());
    }

    /**
     * yesterday sales
     */
    public function getYesterdaySales(): Builder
    {
        return $this->getMonthlySales(now()->month)
            ->whereDate('created_at', today()->subDays(1));
    }

    /**
     * This week sales
     */
    public function getThisWeekSales(): Builder
    {
        return $this->getMonthlySales(now()->month)
            ->whereDate('created_at', '>=', today()->startOfWeek())
            ->whereDate('created_at', '<=', today()->endOfWeek());
    }

    /**
     * Weekly sales
     */
    public function getWeeklySales(): Builder
    {
        return $this->getMonthlySales(now()->month)
            ->whereDate('created_at', '>=', today()->startOfWeek());
    }

    /**
     * Monthly sales
     */
    public function getMonthlySales(int $month = null, int $year = null): Builder
    {
        $month = $month?? now()->month;
        $year = $year ?? now()->year;

        return $this->order->whereMonth('created_at', $month)
            ->whereYear('created_at', $year);
    }

    /**
     * Yearly sales
     */
    public function getYearlySales(int $year = null): Builder
    {
        $year = $year ?? now()->year;

        return $this->order->whereYear('created_at', $year);
    }

    /**
     * Get sales
     */
    public function get(array|string $columns=['*']): Collection|array
    {
        return $this->order->get($columns);
    }
}
