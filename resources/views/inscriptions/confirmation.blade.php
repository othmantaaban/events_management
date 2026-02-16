<<<<<<< HEAD
@extends('landing.layouts.app')
=======
﻿@extends('landing.layouts.app')
>>>>>>> a08b5f5 (améliorations)

@section('title', 'Confirmation - ' . ($inscription->evenements->first()->titre ?? 'Inscription'))

@section('content')
<<<<<<< HEAD

<!-- Meta tags pour JavaScript -->
<meta name="inscription-id" content="{{ $inscription->id_inscription }}">
<meta name="inscription-email" content="{{ $inscription->user->email ?? session('inscription_email') }}">

<!-- Section de confirmation -->
<section class="min-h-screen bg-gradient-to-br from-green-50 to-blue-50 flex items-center justify-center py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <!-- Carte de confirmation -->
            <div class="bg-white rounded-lg shadow-2xl overflow-hidden">
                <!-- En-tête vert -->
                <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-12 text-center">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-green-500 rounded-full mb-4">
                        <i class="fas fa-check text-white text-5xl"></i>
                    </div>
                    <h1 class="text-4xl font-bold text-white mb-2">Inscription confirmée!</h1>
                    <p class="text-green-100 text-lg">Bienvenue à l'événement</p>
                </div>

                <!-- Contenu -->
                <div class="px-8 py-12">
                    <!-- Message de succès -->
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-600 text-green-800 rounded">
                            <p class="font-semibold">✓ {{ session('success') }}</p>
                        </div>
                    @endif

                    <!-- Détails de l'inscription -->
                    <div class="mb-8 space-y-4">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Détails de votre inscription</h2>
                        
                        <!-- Événement -->
                        <div class="flex items-start border-b border-gray-200 pb-4">
                            <div class="flex-shrink-0 mr-4">
                                <i class="fas fa-calendar-alt text-blue-600 text-2xl mt-1"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-600">Événement</p>
                                <p class="text-lg text-gray-800">{{ $inscription->evenements->first()->titre ?? 'N/A' }}</p>
                                @if($inscription->evenements->first())
                                    <p class="text-sm text-gray-600 mt-1">
                                        <i class="far fa-calendar mr-1"></i>
                                        {{ $inscription->evenements->first()->date_heure_debut->format('d/m/Y H:i') }} - 
                                        {{ $inscription->evenements->first()->date_heure_fin->format('H:i') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start border-b border-gray-200 pb-4">
                            <div class="flex-shrink-0 mr-4">
                                <i class="fas fa-envelope text-blue-600 text-2xl mt-1"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-600">Email</p>
                                <p class="text-lg text-gray-800">{{ session('inscription_email') ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <!-- Numéro d'inscription -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mr-4">
                                <i class="fas fa-ticket-alt text-blue-600 text-2xl mt-1"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-600">N° d'inscription</p>
                                <p class="text-lg text-gray-800 font-mono">{{ $inscription->id_inscription }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Prochaines étapes -->
                    <div class="bg-blue-50 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">
                            <i class="fas fa-tasks text-blue-600 mr-2"></i>
                            Prochaines étapes
                        </h3>
                        <ol class="space-y-3 text-gray-700">
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center mr-3 mt-0.5 text-sm font-bold">1</span>
                                <span>Explorez les ateliers disponibles pour cet événement</span>
                            </li>
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center mr-3 mt-0.5 text-sm font-bold">2</span>
                                <span>Inscrivez-vous aux ateliers qui vous intéressent</span>
                            </li>
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center mr-3 mt-0.5 text-sm font-bold">3</span>
                                <span>Téléchargez votre badge et plaquette d'accueil</span>
                            </li>
                        </ol>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Voir les ateliers -->
                        <a href="{{ route('public.evenement.ateliers', $inscription->evenements->first()->id_event ?? 0) }}" 
                           class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                            <i class="fas fa-chalkboard mr-2"></i>
                            Voir les ateliers
                        </a>

                        <!-- Retour à l'événement -->
                        <a href="{{ route('public.evenement.landing', $inscription->evenements->first()->id_event ?? 0) }}" 
                           class="inline-flex items-center justify-center px-6 py-3 bg-gray-200 text-gray-800 rounded-lg font-semibold hover:bg-gray-300 transition">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Retour
                        </a>

                        <!-- Télécharger le badge -->
                        <a href="{{ route('inscription.badge.download', $inscription->id_inscription) }}" 
                           class="inline-flex items-center justify-center px-6 py-3 bg-purple-600 text-white rounded-lg font-semibold hover:bg-purple-700 transition">
                            <i class="fas fa-download mr-2"></i>
                            Badge
                        </a>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-gray-50 px-8 py-6 text-center text-sm text-gray-600">
                    <p>Un email de confirmation a été envoyé à <strong>{{ session('inscription_email') ?? 'votre adresse email' }}</strong></p>
                </div>
=======
@php
    $statut = strtolower((string) ($inscription->statut ?? ''));
    $isValidated = str_starts_with($statut, 'valid');
    $isVerified = !empty($inscription->verified_at) || $isValidated;
    $event = $inscription->evenements->first();
@endphp

<meta name="inscription-id" content="{{ $inscription->id_inscription }}">
<meta name="inscription-email" content="{{ $inscription->user->email ?? session('inscription_email') }}">

<section class="relative py-24 gradient-bg-dark min-h-screen overflow-hidden">
    <div class="absolute inset-0 hero-gradient opacity-70"></div>
    <div class="relative container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="scroll-reveal rounded-3xl p-6 md:p-10 bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl">
                <div class="text-center mb-10">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-white/15 border border-white/25 mb-4">
                        <i class="fas {{ $isVerified ? 'fa-check-circle text-green-300' : 'fa-shield-alt text-conf-light' }} text-4xl"></i>
                    </div>
                    <h1 class="text-3xl md:text-5xl font-bold text-white text-glow mb-2">
                        {{ $isVerified ? 'Inscription verifiee' : 'Verification de votre inscription' }}
                    </h1>
                    <p class="text-white/80 text-lg">{{ $event->titre ?? 'Evenement' }}</p>
                </div>

                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-green-500/20 border border-green-400/40 text-green-100">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-xl bg-red-500/20 border border-red-400/40 text-red-100">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-500/20 border border-red-400/40 text-red-100">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <div class="bg-white/10 border border-white/20 rounded-2xl p-4">
                        <p class="text-white/60 text-xs uppercase tracking-wide mb-1">Email</p>
                        <p class="text-white font-semibold break-all">{{ $inscription->user->email ?? session('inscription_email') ?? 'N/A' }}</p>
                    </div>
                    <div class="bg-white/10 border border-white/20 rounded-2xl p-4">
                        <p class="text-white/60 text-xs uppercase tracking-wide mb-1">Numero inscription</p>
                        <p class="text-white font-semibold">#{{ $inscription->id_inscription }}</p>
                    </div>
                    <div class="bg-white/10 border border-white/20 rounded-2xl p-4">
                        <p class="text-white/60 text-xs uppercase tracking-wide mb-1">Statut</p>
                        <p class="font-semibold {{ $isVerified ? 'text-green-300' : 'text-yellow-300' }}">
                            {{ $isVerified ? 'Verifiee' : 'En attente de verification' }}
                        </p>
                    </div>
                </div>

                @if(!$isVerified)
                    <div class="rounded-2xl p-6 bg-white/10 border border-white/20 mb-8">
                        <h2 class="text-white text-xl font-bold mb-2">Entrez votre code de confirmation</h2>
                        <p class="text-white/70 mb-4">Saisissez le code a 6 chiffres recu par email.</p>

                        <form method="POST" action="{{ route('inscription.verify.submit', $inscription) }}" class="space-y-4">
                            @csrf
                            <input
                                type="text"
                                name="code"
                                maxlength="6"
                                inputmode="numeric"
                                pattern="[0-9]{6}"
                                required
                                placeholder="123456"
                                class="w-full px-4 py-4 rounded-xl bg-white/15 border border-white/30 text-white text-center tracking-[0.35em] text-2xl placeholder-white/50 focus:outline-none focus:border-conf-light"
                            >
                            <button type="submit" class="w-full btn-gradient text-white py-4 rounded-full font-semibold">
                                Verifier mon inscription
                            </button>
                        </form>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-4">
                            <form method="POST" action="{{ route('inscription.verify.resend', $inscription) }}">
                                @csrf
                                <button type="submit" class="w-full px-4 py-3 rounded-xl border border-white/30 text-white hover:bg-white/10 transition">
                                    Renvoyer le code
                                </button>
                            </form>
                            <form method="POST" action="{{ route('inscription.verify.sms', $inscription) }}">
                                @csrf
                                <button type="submit" class="w-full px-4 py-3 rounded-xl border border-white/30 text-white hover:bg-white/10 transition">
                                    Essayer avec SMS
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="{{ $evenement ? route('public.evenement.landing', $evenement) : url('/') }}"
                       class="inline-flex items-center justify-center px-6 py-3 rounded-full border border-white/30 text-white hover:bg-white hover:text-conf-dark transition">
                        <i class="fas fa-arrow-left mr-2"></i> Retour
                    </a>

                    @if($isVerified)
                        <a href="{{ route('inscription.badge.download', $inscription->id_inscription) }}"
                           class="inline-flex items-center justify-center px-6 py-3 rounded-full btn-gradient text-white font-semibold">
                            <i class="fas fa-download mr-2"></i> Badge
                        </a>
                    @else
                        <button type="button" disabled class="inline-flex items-center justify-center px-6 py-3 rounded-full bg-white/10 text-white/60 border border-white/20 cursor-not-allowed">
                            <i class="fas fa-lock mr-2"></i> Badge bloque
                        </button>
                    @endif
                </div>

                <p class="text-center text-white/60 text-sm mt-8">
                    Un email de confirmation a ete envoye a
                    <strong class="text-white">{{ $inscription->user->email ?? session('inscription_email') ?? 'votre adresse email' }}</strong>
                </p>
>>>>>>> a08b5f5 (améliorations)
            </div>
        </div>
    </div>
</section>
<<<<<<< HEAD

=======
>>>>>>> a08b5f5 (améliorations)
@endsection
