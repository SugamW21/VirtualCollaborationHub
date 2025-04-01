<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6 max-w-lg mx-auto">
            <img src="{{ asset('images/xmark.png') }}" alt="X Mark"  class="w-25 h-25 mr-4 mb-4 mx-auto">

            <h2 class="text-2xl font-bold mb-4 " style="text-align: center">Access Denied</h2>
            <p class="mb-4" style="text-align: center">{{ $message }}</p>
            <p class="opacity-90 mb-6" style="text-align: center">You need to be invited to this meeting to join.</p>
            
            <div class="flex justify-center">
                <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Return to Dashboard
                </a>
            </div>
        </div>
    </div>
    
    <script>
        // Redirect after 3 seconds
        setTimeout(function() {
            window.location.href = "{{ route('dashboard') }}";
        }, 5000);
    </script>
</x-app-layout>

