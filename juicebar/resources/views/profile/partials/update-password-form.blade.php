<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div class="space-y-6">
            <div>
                <label for="update_password_current_password" class="block text-sm font-semibold text-gray-700 mb-2">
                    {{ __('Current Password') }}
                </label>
                <div class="relative">
                    <input id="update_password_current_password" name="current_password" type="password" 
                           class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" 
                           autocomplete="current-password"
                           placeholder="Enter your current password" />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <span class="text-gray-400 text-xl">🔒</span>
                    </div>
                </div>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="update_password_password" class="block text-sm font-semibold text-gray-700 mb-2">
                        {{ __('New Password') }}
                    </label>
                    <div class="relative">
                        <input id="update_password_password" name="password" type="password" 
                               class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" 
                               autocomplete="new-password"
                               placeholder="Enter new password" />
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <span class="text-gray-400 text-xl">🆕</span>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>

                <div>
                    <label for="update_password_password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                        {{ __('Confirm New Password') }}
                    </label>
                    <div class="relative">
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                               class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" 
                               autocomplete="new-password"
                               placeholder="Confirm new password" />
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <span class="text-gray-400 text-xl">✅</span>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>
            </div>
        </div>

        <!-- Password Requirements -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
            <h4 class="font-semibold text-blue-900 mb-2 flex items-center">
                <span class="mr-2">💡</span>
                Password Requirements
            </h4>
            <ul class="text-sm text-blue-800 space-y-1">
                <li class="flex items-center">
                    <span class="mr-2">•</span>
                    At least 8 characters long
                </li>
                <li class="flex items-center">
                    <span class="mr-2">•</span>
                    Include uppercase and lowercase letters
                </li>
                <li class="flex items-center">
                    <span class="mr-2">•</span>
                    Include at least one number
                </li>
                <li class="flex items-center">
                    <span class="mr-2">•</span>
                    Include at least one special character
                </li>
            </ul>
        </div>

        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <div class="flex items-center space-x-4">
                <button type="submit" 
                        class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <span class="mr-2">🔐</span>
                    {{ __('Update Password') }}
                </button>

                @if (session('status') === 'password-updated')
                    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                         class="flex items-center space-x-2 px-4 py-2 bg-green-100 border border-green-300 text-green-800 rounded-lg">
                        <span>🔒</span>
                        <span class="font-medium">{{ __('Password updated successfully!') }}</span>
                    </div>
                @endif
            </div>
        </div>
    </form>
</section>
