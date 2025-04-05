<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-semibold mb-4">We Value Your Feedback</h1>

        <form method="POST" action="<?php echo e(route('submit-feedback'), false); ?>">
            <?php echo csrf_field(); ?>

            <!-- Feedback Textarea -->
            <textarea name="feedback" rows="4" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Your feedback"></textarea>

            <!-- Star Rating -->
            <label class="block mt-4 font-medium text-gray-700">Rate your experience:</label>

            <div x-data="{ rating: 0 }" class="flex space-x-1 mt-2 mb-4">
                <template x-for="index in 5" :key="index">
                    <svg
                        @click="rating = index"
                        @mouseover="rating = index"
                        @mouseleave="rating = rating"
                        :class="rating >= index ? 'text-yellow-400' : 'text-gray-300'"
                        class="w-8 h-8 cursor-pointer transition-colors"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.957a1 1 0 00.95.69h4.163c.969 0 1.371 1.24.588 1.81l-3.37 2.448a1 1 0 00-.364 1.118l1.285 3.956c.3.921-.755 1.688-1.538 1.118L10 13.347l-3.37 2.448c-.783.57-1.838-.197-1.538-1.118l1.286-3.956a1 1 0 00-.364-1.118L2.644 9.384c-.783-.57-.38-1.81.588-1.81h4.163a1 1 0 00.95-.69l1.286-3.957z" />
                    </svg>
                </template>

                <!-- Hidden input to store selected rating -->
                <input type="hidden" name="rating" :value="rating">
            </div>

            <!-- Submit Button -->
            <div class="mt-4 flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition-colors">
                    Submit
                </button>
            </div>
        </form>

        <!-- Success Message -->
        <?php if(session('status')): ?>
            <div class="mt-4 text-green-500 font-semibold">
                <?php echo e(session('status'), false); ?>

            </div>
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/feedbackandrating.blade.php ENDPATH**/ ?>