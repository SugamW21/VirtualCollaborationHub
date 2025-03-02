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
    <head>
        <link rel="icon" href="images/logo.png" type="image/x-icon">
        <title>Virtual Collaboration Hub</title>
    </head>
    <div class="flex items-center justify-center min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('images/dashboard.jpg'); filter: blur(8px);"></div>
        <div class="absolute inset-0 bg-black opacity-30"></div>

    <div class="container mt-4"> 

        <div class ="row">
            <?php if(count($users) > 0): ?>
            
            <div class="col-md-3">

                <ul class = "list-group">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                            if($user->image != "" && $user->image !=null){
                                $image = $user->image;
                            }
                            else{
                                $image="images/dummy.png";
                            }
                            
                                
                            
                        ?>
                    <li class="list-group-item list-group-item-dark cursor-pointer user-list" data-id="<?php echo e($user->id, false); ?>">
                        
                        <img src="<?php echo e($image, false); ?>" alt="" class="user-image">
                        <?php echo e($user->name, false); ?>

                        <b><sup id="<?php echo e($user->id, false); ?>-status" class="offline-status">Offline</sup></b>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <div class="col-md-9">
                <h1 class="start-head">Click in user to Start the chat</h1>

                <div class="chat-section">
                  <div class="chat-section">
                    <div class="selected-user-info hidden">
                      <img id="selected-user-image" src="" alt="User Image" class="selected-user-image">
                      <span id="selected-user-name"></span>
                  </div>
                    <div id="chat-container">

                  </div> 
                    
                    <form action="" id="chat-form" enctype="multipart/form-data">
                      <input type="text" name="message" placeholder="Enter Message" id="message" class="border" required>
                      <input type="file" name="attachment" id="attachment" class="border">
                      <input type="submit" value="Send Message" class="btn btn-primary">
                  </form>


                  

            </div>

            
            <?php else: ?>
                <div class = "col-md-12">
                    <h3>Users not Found!!</h3>
                </div>
            <?php endif; ?>
        </div>
        </div>



  <!-- Modal -->
  <div class="modal fade" id="deleteChatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Delete Chat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" id="delete-chat-form">
            <div class="modal-body">
                <input type="hidden" name="id" id="delete-chat-id">
                <p>Are you sure you want to <b>UnSend</b> this Message?</p>
                <p><b id="delete-message"></b></p>
 
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>

      </div>
    </div>
  </div>




  <!-- Update Chat Modal -->
  <div class="modal fade" id="updateChatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Chat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" id="update-chat-form">
            <div class="modal-body">
                <input type="hidden" name="id" id="update-chat-id">
                <input type="text" name="message" class="from-control" placeholder="Enter Message" id="update-message">
                
 
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

      </div>
    </div>
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
<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/dashboard.blade.php ENDPATH**/ ?>