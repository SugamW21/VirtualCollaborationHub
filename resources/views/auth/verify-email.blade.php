{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}
<x-guest-layout>
    <div style="min-height: 100vh; background: linear-gradient(135deg, #6B46C1 0%, #4F46E5 100%); display: flex; align-items: center; justify-content: center; padding: 20px; font-family: system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;">
        <div style="width: 100%; max-width: 500px; background-color: rgba(255, 255, 255, 0.95); border-radius: 16px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); overflow: hidden;">
            <!-- Header with wave design -->
            <div style="background: linear-gradient(90deg, #6B46C1, #4F46E5); height: 120px; position: relative; display: flex; align-items: center; justify-content: center;">
                <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 40px;">
                    <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                        <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgba(255, 255, 255, 0.95);"></path>
                    </svg>
                </div>
                <img src="/images/logo.png" alt="Logo" style="width: 80px; height: 80px; object-fit: contain; z-index: 10; filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));">
            </div>
            
            <!-- Content -->
            <div style="padding: 30px 40px 40px;">
                <h1 style="color: #1F2937; font-size: 24px; font-weight: 700; text-align: center; margin-bottom: 16px;">Verify Your Email</h1>
                
                <p style="color: #4B5563; font-size: 16px; line-height: 1.5; margin-bottom: 24px; text-align: center;">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </p>
                
                @if (session('status') == 'verification-link-sent')
                    <div style="background-color: #D1FAE5; border-left: 4px solid #10B981; padding: 16px; border-radius: 8px; margin-bottom: 24px;">
                        <p style="color: #065F46; font-size: 14px; margin: 0;">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </p>
                    </div>
                @endif
                
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <form method="POST" action="{{ route('verification.send') }}" style="width: 100%;">
                        @csrf
                        <button type="submit" style="width: 100%; background: linear-gradient(90deg, #6B46C1, #4F46E5); color: white; border: none; padding: 12px 20px; border-radius: 8px; font-weight: 600; font-size: 16px; cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 6px rgba(107, 70, 193, 0.25);">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('logout') }}" style="width: 100%;">
                        @csrf
                        <button type="submit" style="width: 100%; background: transparent; color: #6B46C1; border: 1px solid #6B46C1; padding: 12px 20px; border-radius: 8px; font-weight: 500; font-size: 16px; cursor: pointer; transition: all 0.2s;">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

