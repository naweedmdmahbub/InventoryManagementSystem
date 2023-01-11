<?php

namespace App\Interfaces;

interface OrderInterface 
{
    public function getAllOrders();
    public function getOrderById($orderId);
    public function deleteOrder($orderId);
    public function createOrUpdateOrder($request, $method, $id);
    public function getFulfilledOrders();
}
