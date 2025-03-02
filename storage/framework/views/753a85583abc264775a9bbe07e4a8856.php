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
        <div class="container mt-4">  

        <div class ="row">
            <?php if(count($groups) > 0 || count($joinedGroups) > 0): ?>
            
            <div class="col-md-3">

                <ul class = "list-group">
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <li class="list-group-item list-group-item-dark cursor-pointer group-list" data-id="<?php echo e(optional($group)->id, false); ?>">
                        
                        <img src="/<?php echo e($group->image, false); ?>" class="user-image">
                        <?php echo e($group->name, false); ?>

                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $joinedGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <li class="list-group-item list-group-item-dark cursor-pointer group-list" data-id="<?php echo e($group->getGroup->id, false); ?>">
                        
                        <img src="/<?php echo e($group->getGroup->image, false); ?>" class="user-image">
                        <?php echo e($group->getGroup->name, false); ?>

                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </ul>
            </div>

            <div class="col-md-9">
                <h1 class="group-start-head">Click in group to Start the chat</h1>

                <div class="group-chat-section">
                    <div id="selected-user-info" class="d-flex align-items-center mb-3" style="display: none;">
                        <img id="selected-user-image" src="" class="rounded-circle" width="50" height="50" style="margin-right: 10px;">
                        <h5 id="selected-user-name"></h5>
                    </div>
                    <div id="group-chat-container">

                  </div> 
                    

                    <form action="" id="group-chat-form" enctype="multipart/form-data">
                        <input type="text" name="message" placeholder="Enter Message" id="group-message" class="border" required>
                        <input type="file" name="attachment" id="group-attachment" class="border">
                        <input type="submit" value="Send Message" class="btn btn-primary">
                    </form>

                

            </div>

            
            <?php else: ?>
                <div class = "col-md-12">
                    <h3>Groups not Found!!</h3>
                </div>
            <?php endif; ?>
        </div>
        </div>


        <!-- Modal -->
  <div class="modal fade" id="groupDeleteChatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Delete Chat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" id="delete-group-chat-form">
            <div class="modal-body">
                <input type="hidden" name="id" id="delete-group-message-id">
                <p>Are you sure you want to <b>UnSend</b> this Message?</p>
                <p><b id="delete-group-message"></b></p>
 
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
    <div class="modal fade" id="updateGroupChatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Chat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" id="update-group-chat-form">
              <div class="modal-body">
                  <input type="hidden" name="id" id="update-group-message-id">
                  <input type="text" name="message" class="from-control" placeholder="Enter Message" id="update-group-message">
                  
   
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
<?php endif; ?><?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/group-chats.blade.php ENDPATH**/ ?>