<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Order;

//Исходим из того что в App\Http\Controllers есть Controller.php который экстендит \Illuminate\Routing\Controller

class OrderController extends Controller
{
    public function __invoke(): View|Factory|array|Application
    {
        // TODO: При реализации реальной задачи нужно ограничить список столбцов и из Order, и из Manager
        // TODO: Более сложную логику вынести в сервис-класс
        $orders = Order::with('manager')
            ->whereHas('manager')
            ->take(50)
            ->get();
        

        // В $order->manager->fullName - будет доступен fullName менеджера
        
        return view('orders', compact('orders'));
        
    }

}