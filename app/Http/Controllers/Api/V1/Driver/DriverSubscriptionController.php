<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Http\Controllers\Controller;
use App\Models\Payment\DriverSubscription;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DriverSubscriptionController extends Controller
{
    /**
     * Retourne le statut d'abonnement du conducteur connecté
     */
    public function getStatus(Request $request)
    {
        $driver = auth()->user();

        $subscription = DriverSubscription::where('driver_id', $driver->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$subscription) {
            return response()->json([
                'success' => true,
                'data' => [
                    'has_subscription' => false,
                    'active' => false,
                    'expired_at' => null,
                    'days_remaining' => 0,
                    'message' => 'Aucun abonnement trouvé',
                ]
            ]);
        }

        $expiredAt = Carbon::parse($subscription->expired_at);
        $now = Carbon::now();
        $daysRemaining = $now->diffInDays($expiredAt, false);
        $isActive = $subscription->active && $expiredAt->isFuture();

        return response()->json([
            'success' => true,
            'data' => [
                'has_subscription' => true,
                'active' => $isActive,
                'subscription_type' => $subscription->subscription_type,
                'paid_amount' => $subscription->paid_amount,
                'expired_at' => $subscription->expired_at,
                'days_remaining' => max(0, $daysRemaining),
                'message' => $isActive
                    ? ($daysRemaining <= 3 ? 'Abonnement expire bientôt' : 'Abonnement actif')
                    : 'Abonnement expiré',
            ]
        ]);
    }

    /**
     * Admin — Liste tous les abonnements
     */
    public function index()
    {
        $subscriptions = DriverSubscription::with('driver')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->json(['success' => true, 'data' => $subscriptions]);
    }

    /**
     * Admin — Créer/valider un abonnement pour un conducteur
     */
    public function store(Request $request)
    {
        $request->validate([
            'driver_id'         => 'required|exists:drivers,id',
            'transaction_id'    => 'required|string',
            'paid_amount'       => 'required|numeric',
            'subscription_type' => 'required|in:weekly,monthly',
        ]);

        $expiredAt = ($request->subscription_type === 'weekly')
            ? Carbon::now()->addWeek()
            : Carbon::now()->addMonth();

        // Désactiver l'ancien abonnement
        DriverSubscription::where('driver_id', $request->driver_id)
            ->update(['active' => 0]);

        $subscription = DriverSubscription::create([
            'driver_id'         => $request->driver_id,
            'transaction_id'    => $request->transaction_id,
            'subscription_type' => $request->subscription_type,
            'active'            => 1,
            'paid_amount'       => $request->paid_amount,
            'expired_at'        => $expiredAt,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Abonnement créé avec succès',
            'data'    => $subscription
        ]);
    }

    /**
     * Admin — Suspendre un conducteur
     */
    public function suspend($driverId)
    {
        DriverSubscription::where('driver_id', $driverId)
            ->update(['active' => 0]);

        return response()->json([
            'success' => true,
            'message' => 'Conducteur suspendu'
        ]);
    }
}