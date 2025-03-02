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
        <h1 style="font-size:50px">Groups</h1>
        
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createGroupModal">
    Create Group
  </button>
  
  <table class="table">
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Image</th>
            <th>Name</th>
            <th>Limit</th>
            <th>Members</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($groups) > 0): ?>
            <?php
                $i = 0; // Start S.NO from 1 naturally
            ?>
            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(++$i, false); ?></td>
                    <td><img src="<?php echo e($group->image, false); ?>" alt="<?php echo e($group->name, false); ?>" width="100px" height="100px"></td>
                    <td><?php echo e($group->name, false); ?></td>
                    <td><?php echo e($group->join_limit, false); ?></td>
                    <td><a style="cursor:pointer" class="addMember"
                         data-limit="<?php echo e($group->join_limit, false); ?>"
                          data-id="<?php echo e($group->id, false); ?>" data-toggle="modal" data-target="#memberModal">
                          Members
                        </a></td>
                        <td>
                          <i class="fa fa-trash deleteGroup" aria-hidden="true"
                          data-id="<?php echo e($group->id, false); ?>" data-name="<?php echo e($group->name, false); ?>" data-toggle="modal" data-target="#deleteGroupModal"></i>
                        
                          <i class="fa fa-pencil updateGroup" aria-hidden="true"
                          data-id="<?php echo e($group->id, false); ?>" data-name="<?php echo e($group->name, false); ?>" data-limit="<?php echo e($group->join_limit, false); ?>"  data-toggle="modal" data-target="#updateGroupModal"></i>
                        
                          <a class="copy cursor-pointer" data-id="<?php echo e($group->id, false); ?>">
                            <i class="fa fa-copy"></i>
                          </a>
                        </td>
                      </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No Groups Found!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>



  <!-- Modal -->
  <div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create group</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" id="createGroupForm">
            <div class="modal-body">
          
                <input type="text" name="name" placeholder="Enter Group Name" required class="w-100 mb-2">
                <input type="file" required name="image" class="w-100 mb-2">
                <input type="number" name="limit" min="1"  placeholder="Enter User Limit" required class="w-100 mb-2">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
             </div>
             </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Members</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="add-member-form">
            <div class="modal-body">
                <input type="hidden" name="group_id" id="add-group-id">

                <input type="hidden" name="limit" id="add-limit">

                <table class="table">
                    <thead>
                    <tr>
                        <th>Select</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td colspan="2">
                            <div class="addMemberTable">
                                <table class="table addMembersInTable">

                                </table>

                            </div>  
                            </td>  
                        </tr>
                </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <span id="add-member-error"></span>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Member</button>
             </div>
             </form>
      </div>
    </div>
  </div>





<!--Delete Group-->
  <div class="modal fade" id="deleteGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Group</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="delete-group-form">
            <div class="modal-body">
                <input type="hidden" name="id" id="delete-group-id">
                <p>Are you sure you want to delete <b id="group-name"></b> Group?</p>
             </div>  

            
            <div class="modal-footer">
                <span id="add-member-error"></span>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete Group</button>
             </div>
             </form>
      </div>
    </div>
  </div>
</div>




<!--update group-->
<div class="modal fade" id="updateGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form enctype="multipart/form-data" id="updateGroupForm">
          <div class="modal-body">
              <input type="hidden" name="id" id="update-group-id">
              <input type="text" name="name" placeholder="Enter Group Name" id="update-group-name" required class="w-100 mb-2">
              <input type="file" name="image" class="w-100 mb-2">
              <input type="number" name="limit" min="1"  placeholder="Enter User Limit" id="update-group-limit" required class="w-100 mb-2">
              <p style="color: red">NOTE: If you enter the less then limit to previous limit, then system will remove the all members from your group!</p>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
           </div>
           </form>
    </div>
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
<?php endif; ?> <?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/groups.blade.php ENDPATH**/ ?>