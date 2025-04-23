


<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                <h1 style="color: #1F2937; font-size: 24px; font-weight: 700; text-align: center; margin-bottom: 16px;">Reset Password</h1>
                
                <p style="color: #4B5563; font-size: 16px; line-height: 1.5; margin-bottom: 24px; text-align: center;">
                    <?php echo e(__('Create a new secure password for your account.'), false); ?>

                </p>
                
                <form method="POST" action="<?php echo e(route('password.store'), false); ?>">
                    <?php echo csrf_field(); ?>
                    
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="<?php echo e($request->route('token'), false); ?>">
                    
                    <!-- Email Address -->
                    <div style="margin-bottom: 20px;">
                        <label for="email" style="display: block; font-size: 14px; font-weight: 500; color: #4B5563; margin-bottom: 8px;">
                            <?php echo e(__('Email'), false); ?>

                        </label>
                        
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="<?php echo e(old('email', $request->email), false); ?>" 
                               required 
                               autofocus 
                               autocomplete="username"
                               style="width: 100%; padding: 12px 16px; border: 1px solid #D1D5DB; border-radius: 8px; font-size: 16px; transition: all 0.2s; outline: none; box-sizing: border-box;">
                        
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p style="color: #EF4444; font-size: 14px; margin-top: 8px;"><?php echo e($message, false); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <!-- Password -->
                    <div style="margin-bottom: 20px;">
                        <label for="password" style="display: block; font-size: 14px; font-weight: 500; color: #4B5563; margin-bottom: 8px;">
                            <?php echo e(__('New Password'), false); ?>

                        </label>
                        
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="new-password"
                               style="width: 100%; padding: 12px 16px; border: 1px solid #D1D5DB; border-radius: 8px; font-size: 16px; transition: all 0.2s; outline: none; box-sizing: border-box;">
                        
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p style="color: #EF4444; font-size: 14px; margin-top: 8px;"><?php echo e($message, false); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <!-- Confirm Password -->
                    <div style="margin-bottom: 24px;">
                        <label for="password_confirmation" style="display: block; font-size: 14px; font-weight: 500; color: #4B5563; margin-bottom: 8px;">
                            <?php echo e(__('Confirm Password'), false); ?>

                        </label>
                        
                        <input id="password_confirmation" 
                               type="password" 
                               name="password_confirmation" 
                               required 
                               autocomplete="new-password"
                               style="width: 100%; padding: 12px 16px; border: 1px solid #D1D5DB; border-radius: 8px; font-size: 16px; transition: all 0.2s; outline: none; box-sizing: border-box;">
                        
                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p style="color: #EF4444; font-size: 14px; margin-top: 8px;"><?php echo e($message, false); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div style="display: flex; justify-content: flex-end;">
                        <button type="submit" style="background: linear-gradient(90deg, #6B46C1, #4F46E5); color: white; border: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; font-size: 16px; cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 6px rgba(107, 70, 193, 0.25);">
                            <?php echo e(__('Reset Password'), false); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>

<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>