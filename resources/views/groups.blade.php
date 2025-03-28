<x-app-layout>
    {{-- <div class="flex items-center justify-center min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('images/dashboard.jpg'); filter: blur(8px);"></div>
        <div class="absolute inset-0 bg-black opacity-30"></div> --}}
        <head>
          <link rel="icon" href="images/logo.png" type="image/x-icon">
          <title>Virtual Collaboration Hub</title>
          <style>
            /* General Styles */
body {
    font-family: 'Inter', sans-serif;
    background-color: #f8fafc;
    color: #333;
}

/* Container Styling */
.container {
    max-width: 1200px;
    margin: auto;
    padding: 2rem;
    background: white;
    border-radius: 12px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 2.5rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
    color: #1e293b;
}

/* Table Styling */
.table {
    width: 100%;
    border-collapse: collapse;
    background: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
}

.table thead {
    background: #1e40af;
    color: white;
}

.table th, .table td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #e5e7eb;
}

.table img {
    border-radius: 8px;
    object-fit: cover;
}

/* Buttons */
.btn {
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-primary {
    background: #2563eb;
    color: white;
    border: none;
}

.btn-primary:hover {
    background: #1e40af;
}

.btn-danger {
    background: #dc2626;
    color: white;
    border: none;
}

.btn-danger:hover {
    background: #b91c1c;
}

/* Modal Styling */
.modal-content {
    border-radius: 12px;
    padding: 1.5rem;
}

.modal-header {
    background: #1e3a8a;
    color: white;
    border-radius: 12px 12px 0 0;
}

.modal-footer {
    display: flex;
    justify-content: space-between;
}

/* Form Inputs */
input[type='text'], input[type='number'], input[type='file'] {
    width: 100%;
    padding: 10px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    margin-bottom: 10px;
    font-size: 1rem;
}

/* Icons */
.fa-trash {
    color: #dc2626;
    cursor: pointer;
}

.fa-pencil {
    color: #2563eb;
    cursor: pointer;
    margin-left: 10px;
}

.fa-copy {
    color: #1e3a8a;
    cursor: pointer;
    margin-left: 10px;
}

.fa-trash:hover, .fa-pencil:hover, .fa-copy:hover {
    opacity: 0.7;
}
          </style>
      </head>    
      <div id="notification-container" class="notification-area"></div>
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
        @if (count($groups) > 0)
            @php
                $i = 0; // Start S.NO from 1 naturally
            @endphp
            @foreach($groups as $group)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img src="{{$group->image}}" alt="{{ $group->name }}" width="100px" height="100px"></td>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->join_limit }}</td>
                    <td><a style="cursor:pointer" class="addMember"
                         data-limit="{{$group->join_limit}}"
                          data-id="{{$group->id}}" data-toggle="modal" data-target="#memberModal">
                          Members
                        </a></td>
                        <td>
                          <i class="fa fa-trash deleteGroup" aria-hidden="true"
                          data-id="{{$group->id}}" data-name="{{$group->name}}" data-toggle="modal" data-target="#deleteGroupModal"></i>
                        
                          <i class="fa fa-pencil updateGroup" aria-hidden="true"
                          data-id="{{$group->id}}" data-name="{{$group->name}}" data-limit="{{$group->join_limit}}"  data-toggle="modal" data-target="#updateGroupModal"></i>
                        
                          <a class="copy cursor-pointer" data-id="{{$group->id}}">
                            <i class="fa fa-copy"></i>
                          </a>
                        </td>
                      </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center">No Groups Found!</td>
            </tr>
        @endif
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

<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/67df9e0c0df93d190c6bf814/1in0o2ocd';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->


</x-app-layout> 