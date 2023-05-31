<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //Display the admin dashboard
    public function index()
    {
        return view('admin.dashboard');
    }

    //Get all customers
    public function getCustomers()
    {
        $customers = User::where('role_id', 2)->orderBy('created_at', 'desc')->simplePaginate(5);
        return view('admin.index', compact('customers'));
    }

    //Delete the customer
    public function destroy(User $user)
    {
        $user->delete();
        if(File::exists(public_path('avatar/').$user->avatar)) {
            File::delete(public_path('avatar/').$user->avatar);
        }
        return redirect()->back()->with('success', 'Customer deleted successfully!');
    }

    //Block the customer
    public function blockCustomer(User $user)
    {
        $user->update([
            'is_blocked' => 1
        ]);
        return redirect()->back()->with('error', 'Customer blocked successfully!');
    }

    //Unblock the customer
    public function unblockCustomer(User $user)
    {
        $user->update([
            'is_blocked' => 0
        ]);
        return redirect()->back()->with('unblocked', 'Customer unblocked successfully!');
    }
}
