<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;


class AdminController extends Controller
{
    public function product()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='1')
            {
                return view('admin.product');
            }
            else
            {
                return redirect()->back();
            }
            
        }
        else
        {
            return redirect('login');
        }
      
    }
    public function showProduct()
    {
        $data = Product::all();
        return view('admin.showProduct', compact('data'));
    }
    public function uploadProduct(Request $request)
    {
        $data = new Product;
        $image = $request->file;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productImage', $imageName);
        
        $data->image = $imageName;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->des;
        $data->quantity = $request->quantity;

        $data->save();
        return redirect()->back()->with('message','Product added successfully');
    }
    public function deleteProduct($id) 
    {
        $data = product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product deleted');
    }
    public function updateView($id) 
    {
        $data = product::find($id);
        return view('admin.updateView', compact('data'));
    }
    public function updateProduct(Request $request, $id)
    {
        $data = product::find($id);

        $image = $request->file;

        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('productImage', $imageName);
            
            $data->image = $imageName;
        }
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->des;
        $data->quantity = $request->quantity;

        $data->save();
        return redirect()->back()->with('message','Product updated successfully');

    }
    public function showOrder()
    {
        $order = Order::all();
        return view('admin.showOrder', compact('order'));
    }
    public function updateStatus($id)
    {
        $order = order::find($id);
        $order->status = 'delivered';
        $order->save();

        return redirect()->back();
    }
}
