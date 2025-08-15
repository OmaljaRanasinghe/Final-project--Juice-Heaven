<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                    {{ __('Full Name') }}
                </label>
                <input id="name" name="name" type="text" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" 
                       value="{{ old('name', $user->name) }}" 
                       required autofocus autocomplete="name"
                       placeholder="Enter your full name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                    {{ __('Email Address') }}
                </label>
                <input id="email" name="email" type="email" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" 
                       value="{{ old('email', $user->email) }}" 
                       required autocomplete="username"
                       placeholder="Enter your email address" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-4 p-4 bg-orange-50 border border-orange-200 rounded-lg">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="text-lg">⚠️</span>
                            <p class="text-sm font-medium text-orange-800">
                                {{ __('Your email address is unverified.') }}
                            </p>
                        </div>
                        <button form="send-verification" 
                                class="inline-flex items-center px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white font-medium rounded-lg transition-colors duration-200 text-sm">
                            <span class="mr-2">📧</span>
                            {{ __('Resend Verification Email') }}
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <div class="mt-3 p-3 bg-green-50 border border-green-200 rounded-lg">
                                <div class="flex items-center space-x-2">
                                    <span class="text-lg">✅</span>
                                    <p class="text-sm font-medium text-green-800">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <!-- Additional Profile Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Health Goals (Optional)
                </label>
                <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white">
                    <option>Weight Management</option>
                    <option>Energy Boost</option>
                    <option>Detox & Cleanse</option>
                    <option>General Wellness</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Favorite Juice Category
                </label>
                <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white">
                    <option>Green & Detox</option>
                    <option>Fruit & Sweet</option>
                    <option>Citrus & Energizing</option>
                    <option>Berry & Antioxidant</option>
                </select>
            </div>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <div class="flex items-center space-x-4">
                <button type="submit" 
                        class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <span class="mr-2">💾</span>
                    {{ __('Update Profile') }}
                </button>

                @if (session('status') === 'profile-updated')
                    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                         class="flex items-center space-x-2 px-4 py-2 bg-green-100 border border-green-300 text-green-800 rounded-lg">
                        <span>✅</span>
                        <span class="font-medium">{{ __('Profile updated successfully!') }}</span>
                    </div>
                @endif
            </div>
        </div>
    </form>
</section>
