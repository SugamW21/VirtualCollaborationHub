{{-- 
<!-- Feedback Modal -->
<div x-show="showFeedbackModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
    <div class="bg-white rounded-lg shadow-lg p-8 w-96 max-w-lg transition-transform transform scale-95 opacity-0 animate__animated animate__fadeIn">
        <!-- Back Button -->
        <button @click="showFeedbackModal = false" class="absolute top-4 left-4 text-gray-700 hover:text-gray-900 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <h2 class="text-xl font-semibold text-center text-gray-800 mb-6">We Value Your Feedback</h2>
        <form @submit.prevent="submitFeedback" method="POST" action="{{ route('submit-feedback') }}">
            @csrf
            <textarea name="feedback" rows="4" class="w-full border-gray-300 border rounded-lg p-3 mb-5 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your feedback"></textarea>
            <div class="mb-5">
                <label for="rating" class="block text-sm font-medium text-gray-700">Rate your experience:</label>
                <select name="rating" class="w-full border-gray-300 border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="5">Excellent</option>
                    <option value="4">Good</option>
                    <option value="3">Average</option>
                    <option value="2">Poor</option>
                    <option value="1">Very Poor</option>
                </select>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button" @click="showFeedbackModal = false" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg transition duration-300 hover:bg-gray-400">Cancel</button>
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg transition duration-300 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
            </div>
        </form>
        @if(session('status'))
            <div class="mt-4 text-green-500 font-semibold text-center">
                {{ session('status') }}
            </div>
        @endif
    </div>
</div>

<script>
    function submitFeedback() {
        const feedbackForm = document.querySelector('form');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(feedbackForm.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new FormData(feedbackForm)
        })
        .then(response => {
            if (response.ok) {
                alert('Feedback submitted successfully!');
                this.showFeedbackModal = false;
            } else {
                alert('Failed to submit feedback');
            }
        });
    }
</script>

<!-- Add CSS to enhance appearance -->
<style>
    /* Basic Modal Styles */
    .bg-white {
        background-color: #ffffff;
    }

    .rounded-lg {
        border-radius: 8px;
    }

    .shadow-lg {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Back Button Styles */
    .absolute {
        position: absolute;
    }

    .top-4 {
        top: 1rem;
    }

    .left-4 {
        left: 1rem;
    }

    .w-6, .h-6 {
        width: 1.5rem;
        height: 1.5rem;
    }

    /* Input and Select Styles */
    input,
    textarea,
    select {
        transition: all 0.2s ease-in-out;
    }

    input:focus,
    textarea:focus,
    select:focus {
        border-color: #1D4ED8;
        outline: none;
        box-shadow: 0 0 0 2px rgba(29, 78, 216, 0.5);
    }

    /* Button Styles */
    button {
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    button:hover {
        transform: translateY(-2px);
    }

    button:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(29, 78, 216, 0.5);
    }

    /* Modal Appearance Animation */
    .animate__fadeIn {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Focus Rings and Transitions */
    .focus\:ring-2:focus {
        box-shadow: 0 0 0 2px rgba(29, 78, 216, 0.5);
    }
</style> --}}
<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-semibold mb-4">We Value Your Feedback</h1>
        
        <form method="POST" action="{{ route('submit-feedback') }}">
            @csrf
            <textarea name="feedback" rows="4" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Your feedback"></textarea>
            
            <label for="rating" class="block mt-4 font-medium text-gray-700">Rate your experience:</label>
            <select name="rating" class="w-full border border-gray-300 rounded-lg p-3">
                <option value="5">⭐⭐⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="2">⭐⭐</option>
                <option value="1">⭐</option>
            </select>

            <div class="mt-4 flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-500">Submit</button>
            </div>
        </form>

        @if(session('status'))
            <div class="mt-4 text-green-500 font-semibold">
                {{ session('status') }}
            </div>
        @endif
    </div>

    
</x-app-layout>
