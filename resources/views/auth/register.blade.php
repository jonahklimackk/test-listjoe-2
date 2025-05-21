<?php
// if the user gets to the register page first
//without clicking homek then these vars are null
//so this is a workaround, for links not in your funnel
$aff = Cookie::get('aff');
$campaignName= Cookie::get('campaign');

if(!$aff || !$campaignName) {
    $cookies = App\Helpers\AffiliateTracker::clickedHome();
    $campaign = $cookies['campaign'];
} 
else 
    $campaign = App\Models\Campaigns::where('affiliate_id',App\Models\User::getSponsor()->id)->where('value', $campaignName)->get()->first();

// dump($campaign);

?>

{!! RecaptchaV3::initJs() !!}
<x-guest-layout>

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />                   
        </x-slot>


        <x-validation-errors class="mb-4" />
        
        <div align="center">
            <b>Create a new account</b>
        </div>



        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-label for="username" value="{{ __('Desired Username') }}" />
                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            {!! RecaptchaV3::field('register') !!} 

            <div>
                <x-label for="sponsor_name" value="Your Sponsor: {{ App\Models\User::getSponsor()->name }} " />

                    <x-label for="sponsor_username" value="Your Sponsor Username: {{ App\Models\User::getSponsor()->username }} " />

                        <!-- <x-label for="sponsor_username" value="Your Sponsor Id: {{ App\Models\User::getSponsor()->id }} " /> -->

                            <x-input id="sponsor_id" class="block mt-1 w-full" type="hidden" name="sponsor_id" value="{{ App\Models\User::getSponsor()->id }}" required autofocus autocomplete="sponsor_id" />



                                <!-- <x-label for="sponsor_username" value="Campaign Id: {{ $campaign->id ?? ''}} " /> -->

                                    <x-input id="campaign_id" class="block mt-1 w-full" type="hidden" name="campaign_id" value="{{ $campaign->id ?? ''}}" required autofocus autocomplete="campaign_id" />

                                    </div>

                                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mt-4">
                                        <x-label for="terms">
                                            <div class="flex items-center">
                                                <x-checkbox name="terms" id="terms" required />

                                                <div class="ms-2">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="/terms" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="/privacy" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </x-label>
                                    </div>
                                    @endif

                                    <div class="flex items-center justify-end mt-4">
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                            {{ __('Already registered?') }}
                                        </a>

                                        <x-button class="ms-4">
                                            {{ __('Register') }}
                                        </x-button>
                                    </div>
                                </form>
                            </x-authentication-card>
                        </x-guest-layout>
