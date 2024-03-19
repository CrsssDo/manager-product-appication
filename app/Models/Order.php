<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'customer_id',
        'order_status',
        ];

    public function orderProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('amount', 'price');
    }

    public function totalAmount()
    {
        $total = 0;

        foreach ($this->orderProducts as $product) {
            $total += $product->pivot->amount * $product->pivot->price;
        }

        return $total;
    }

    public function totalQuantity()
    {
        return $this->orderProducts()->count();
    }

    public static function withTotalAmount()
    {
        return static::with(['customer','orderProducts'])
            ->get()
            ->map(function ($order) {
                $order->total_amount = number_format($order->totalAmount());
                $order->total_quantity = $order->totalQuantity();
                return $order;
            });
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
