<?php

namespace App\Http\Controllers;

use App\Order;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    protected $order;

    public function __construct()
    {
        if (Auth::check()) {
            $this->order = Order::where('status', 'cart')->first();
        }
    }

    /**
     * Trang dành cho người dùng
     */
    public function tintuc()
    {
        $posts = Post::paginate(12);
        return view('posts.tintuc', compact('posts'));
    }

    /**
     * Xem tin tức cho người dùng
     */
    public function xemtin(Post $post)
    {
        return view('posts.xemtin', compact('post'));
    }

    /**
     * Trang dành cho người dùng
     */
    public function sanpham()
    {
        $products = Product::paginate(12);
        return view('products.sanpham', compact('products'));
    }

    /**
     * Chi tiết sản phẩm
     */
    public function xemsp(Product $product)
    {
        return view('products.xemsp', compact('product'));
    }

    /**
     * Giỏ hàng
     *
     */
    public function giohang()
    {
        $order = $this->order;
        return view('orders.giohang', compact('order'));
    }

    /**
     * Thêm vào giỏ hàng
     *
     */
    public function themproduct(Product $product)
    {
        $this->order->products()->attach($product);
    }

    /**
     * Xóa sp khỏi giỏ hàng
     *
     */
    public function xoasp(Product $product)
    {
        $this->order->products()->detach($product);
        return redirect()->route('gio-hang');
    }

    /**
     * Mua hàng
     */
    public function mua()
    {
        $this->order->status = 'pending';
        $this->order->save();
        $order = $this->order;
        $this->order = new Order(['user_id' => Auth::id()]);

        return view('orders.donhang', compact('order'));
    }

    /**
     * Huy đơn hàng
     */
    public function huy()
    {
    }
}
