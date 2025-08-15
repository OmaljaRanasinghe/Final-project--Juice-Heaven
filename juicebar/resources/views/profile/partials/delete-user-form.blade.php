<section class="space-y-6">
    <div class="bg-red-50 border border-red-200 rounded-lg p-6">
        <div class="flex items-start space-x-4">
            <div class="flex-shrink-0">
                <span class="text-3xl">⚠️</span>
            </div>
            <div class="flex-1">
                <h4 class="text-lg font-semibold text-red-900 mb-2">
                    Account Deletion Warning
                </h4>
                <p class="text-red-800 mb-4">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. This includes:') }}
                </p>
                <ul class="text-red-800 text-sm space-y-1 mb-4">
                    <li class="flex items-center">
                        <span class="mr-2">•</span>
                        Your order history and preferences
                    </li>
                    <li class="flex items-center">
                        <span class="mr-2">•</span>
                        Saved favorite juices and nutrition data
                    </li>
                    <li class="flex items-center">
                        <span class="mr-2">•</span>
                        Account settings and personal information
                    </li>
                    <li class="flex items-center">
                        <span class="mr-2">•</span>
                        Any loyalty points or rewards
                    </li>
                </ul>
                <p class="text-red-800 text-sm font-medium">
                    {{ __('Please download any data or information that you wish to retain before proceeding.') }}
                </p>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
            <span class="mr-2">🗑️</span>
            {{ __('Delete My Account') }}
        </button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="p-8">
            <div class="text-center mb-8">
                <div class="text-6xl mb-4">⚠️</div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    {{ __('Are you absolutely sure?') }}
                </h2>
                <p class="text-gray-600 text-lg">
                    {{ __('This action cannot be undone. This will permanently delete your account and remove all your data from our servers.') }}
                </p>
            </div>

            <form method="post" action="{{ route('profile.destroy') }}" class="space-y-6">
                @csrf
                @method('delete')

                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-sm font-medium text-gray-800 mb-3">
                        {{ __('To confirm deletion, please enter your password:') }}
                    </p>
                    
                    <div class="relative">
                        <input id="password" name="password" type="password" 
                               class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200 bg-white" 
                               placeholder="{{ __('Enter your password') }}" />
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <span class="text-gray-400 text-xl">🔐</span>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <button type="button" x-on:click="$dispatch('close')"
                            class="inline-flex items-center px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-bold rounded-lg transition-all duration-300">
                        <span class="mr-2">↩️</span>
                        {{ __('Cancel') }}
                    </button>

                    <button type="submit"
                            class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span class="mr-2">💀</span>
                        {{ __('Delete Account Permanently') }}
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</section>
