<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment\DriverSubscription;
use App\Models\Admin\Driver;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DriverSubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = DriverSubscription::with(['driver.user'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $drivers = Driver::with('user')
            ->where('approve', 1)
            ->get();

        $main_menu = 'subscriptions';
        $sub_menu = 'subscriptions';
        $page = 'Abonnements Conducteurs';

        return view('admin.subscriptions.index', compact('subscriptions', 'drivers', 'main_menu', 'sub_menu', 'page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'driver_id'         => 'required',
            'transaction_id'    => 'required|string',
            'paid_amount'       => 'required|numeric',
            'subscription_type' => 'required|in:weekly,monthly',
        ]);

        $expiredAt = ($request->subscription_type === 'weekly')
            ? Carbon::now()->addWeek()
            : Carbon::now()->addMonth();

        DriverSubscription::where('driver_id', $request->driver_id)
            ->update(['active' => 0]);

        DriverSubscription::create([
            'driver_id'         => $request->driver_id,
            'transaction_id'    => $request->transaction_id,
            'subscription_type' => $request->subscription_type,
            'active'            => 1,
            'paid_amount'       => $request->paid_amount,
            'expired_at'        => $expiredAt,
        ]);

        return redirect()->back()->with('success', 'Abonnement créé avec succès');
    }

    public function suspend($driverId)
    {
        DriverSubscription::where('driver_id', $driverId)
            ->update(['active' => 0]);

        return redirect()->back()->with('success', 'Conducteur suspendu');
    }
}