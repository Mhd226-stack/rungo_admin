@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Abonnements Conducteurs</h3>
                </div>
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    {{-- Formulaire création abonnement --}}
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5>Valider un paiement</h5>
                        </div>
                        <div class="card-body">
                            <form action="/subscriptions/store" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Conducteur</label>
                                            <select name="driver_id" class="form-control" required>
                                                <option value="">-- Choisir --</option>
                                                @foreach($drivers as $driver)
                                                    <option value="{{ $driver->id }}">
                                                        {{ $driver->user->name }} - {{ $driver->user->mobile }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select name="subscription_type" class="form-control" required>
                                                <option value="weekly">Hebdomadaire</option>
                                                <option value="monthly">Mensuel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Montant (FCFA)</label>
                                            <input type="number" name="paid_amount" class="form-control" placeholder="2000" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Référence Orange Money</label>
                                            <input type="text" name="transaction_id" class="form-control" placeholder="OM-XXXXXXXX" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <button type="submit" class="btn btn-success btn-block">Valider</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Liste des abonnements --}}
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Conducteur</th>
                                <th>Téléphone</th>
                                <th>Type</th>
                                <th>Montant</th>
                                <th>Référence</th>
                                <th>Expiration</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subscriptions as $sub)
                            <tr>
                                <td>{{ $sub->driver->user->name ?? '-' }}</td>
                                <td>{{ $sub->driver->user->mobile ?? '-' }}</td>
                                <td>{{ $sub->subscription_type == 'weekly' ? 'Hebdomadaire' : 'Mensuel' }}</td>
                                <td>{{ number_format($sub->paid_amount) }} FCFA</td>
                                <td>{{ $sub->transaction_id }}</td>
                                <td>{{ \Carbon\Carbon::parse($sub->expired_at)->format('d/m/Y') }}</td>
                                <td>
                                    @if($sub->active && \Carbon\Carbon::parse($sub->expired_at)->isFuture())
                                        <span class="badge badge-success">Actif</span>
                                    @else
                                        <span class="badge badge-danger">Expiré</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="/subscriptions/suspend/{{ $sub->driver_id }}" method="POST" style="display:inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-warning"
                                            onclick="return confirm('Suspendre ce conducteur ?')">
                                            Suspendre
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Aucun abonnement trouvé</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $subscriptions->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection