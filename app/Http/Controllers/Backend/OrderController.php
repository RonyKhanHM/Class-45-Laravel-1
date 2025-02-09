<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function showAllOrders()
    {
        $orders = Order::with('orderDetails')->get();
        return view('backend.order.all-orders', compact('orders'));
    }
    public function updateStatus($order_id, $status_type)
    {
        $order = Order::find($order_id);
        $order->status = $status_type;

        //Courier API Integration.................
        if($status_type == "delivared"){
            if($order->courier_name == "steadfast"){

                $endPoint = "https://portal.packzy.com/api/v1/create_order";

                //Auth parametars.............
                $appkay = "hnjd2eoqpywkwwnqkgho1gglcrcw8u3c";
                $secretKey = "3l9ptzy38timuwg6hfkniu6h";
                $contentType = "application/json";

                //The Body Parameters.....................
                $invoiceNumber = $order->invoiceId;
                $customerName = $order->c_name;
                $customerPhone = $order->c_phone;
                $customerAddress = $order->address;
                $price = $order->price;

                //The Steadfast Header Array.............................
                $header = [
                    'Api-Key' => $appkay,
                    'Secret-Key' => $secretKey,
                    'Content-Type' => $contentType,
                ];
                //The Steadfast payloads Array.............................
                $payLoad = [
                    'invoice' => $invoiceNumber,
                    'recipient_name' => $customerName,
                    'recipient_phone' => $customerPhone,
                    'recipient_address' => $customerAddress,
                    'cod_amount' => $price,
                ];

                $response = Http::withHeaders($header)->post($endPoint, $payLoad);
                
            }
            elseif($order->courier_name == "redx"){
                //REDX API
            }
            elseif($order->courier_name == "others"){
                //others
            }
            else{
                toastr()->error('Courier not selected!');
                return redirect()->back();
            }
        }
         //Courier API Integration.................

        $order->save();
        toastr()->success('Status Updated Successfully!');
        return redirect()->back();
    }
    public function statusWiseOrder($status_type)
    {
        $orders = Order::with('orderDetails')->where('status', $status_type)->get();
        return view('backend.order.all-orders', compact('orders'));
    }
    public function editOrder($id)
    {
        $order = Order::with('orderDetails')->where('id', $id)->first();
        return view('backend.order.edit-order', compact('order'));
    }
    public function updateOrder(Request $request, $id)
    {
        $order = Order::find($id);

        $order->c_name = $request->c_name;
        $order->c_phone = $request->c_phone;
        $order->address = $request->address;
        $order->area = $request->area;
        $order->courier_name = $request->courier_name;
        $order->price = $request->price;

        $order->save();
        toastr()->success('Order Updated Successfully!');
        return redirect()->back();
    }
}
