<?php

namespace App\Services;

use App\Models\Branch;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class BusinessOrdersService
{
    private Builder $orderQuery;
    private ?\Illuminate\Database\Eloquent\Model $vendor;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        // initialize vendor
        $this->vendor = (new VendorService())->getVendor();
    }

    /*
     * Load the orders
     */
    public function get(array $columns = ['id', 'reference', 'total', 'subtotal', 'status', 'channel', 'order_type', 'branch_id', 'customer_id', 'employee_id']): Collection|array
    {
        return $this->orderQuery->get(columns: $columns);
    }

    /*
     * Get orders associated with current business
     */
    public function orders(Branch $branch = null, array $relations = ['orderItems', 'customer']): ?Builder
    {
        $this->orderQuery = Order::query()
            ->where('vendor_id', $this->vendor->id)
            ->with($relations);

        if ($branch) {$this->orderQuery->where('branch_id', $branch->id);}

        return $this->orderQuery;
    }

    /*
     * Get total revenue for current business
     */
    public function totalRevenue(): float
    {
        return $this->orders()->sum('total');
    }

    /*
     * Get total revenue for current business by branch
     */
    public function totalRevenueByBranch(Branch $branch): float
    {
        return $this->orders($branch)->sum('total');
    }

    /*
     * Get total revenue for current business by month
     */
    public function totalRevenueByMonth(int $month, int $year): float
    {
        return $this->orders()->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('total');
    }

    /*
     * Get total revenue for current business by day
     */
    public function totalRevenueByDay(int $day, int $month, int $year): float
    {
        return $this->orders()->whereDay('created_at', $day)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('total');
    }

    /*
     * Get total revenue for current business by week
     */
    public function totalRevenueByWeek(int $week, int $month, int $year): float
    {
        return $this->orders()->whereWeek('created_at', $week)->whereMonth('created_at', $month)->whereYear('created_at', $year)->sum('total');
    }

    /*
     * Get the revenue for today
     */
    public function todayRevenue(): float
    {
        return $this->orders()->whereDate('created_at', today())->sum('total');
    }

    /*
     * Get the revenue for this week
     */
    public function thisWeekRevenue(): float
    {
        return $this->orders()->whereDate('created_at', '>=', today()->startOfWeek())->whereDate('created_at', '<=', today()->endOfWeek())->sum('total');
    }
}
