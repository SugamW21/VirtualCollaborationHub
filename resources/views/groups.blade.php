{{-- <x-app-layout> --}}
    {{-- <div class="flex items-center justify-center min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('images/dashboard.jpg'); filter: blur(8px);"></div>
        <div class="absolute inset-0 bg-black opacity-30"></div> --}}
        {{-- <head>
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


</x-app-layout>  --}}

<x-app-layout>
  
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="icon" href="images/logo.png" type="image/x-icon">
      <title>Virtual Collaboration Hub</title>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
      <style>
          /* Modern UI Styles */
          body {
              font-family: 'Inter', sans-serif;
              background-color: #f8fafc;
              color: #333;
          }

          .container {
              max-width: 1200px;
              margin: auto;
              padding: 2rem;
          }

          .page-header {
              margin-bottom: 2rem;
              text-align: center;
          }

          .page-title {
              font-size: 2.5rem;
              font-weight: 800;
              background: linear-gradient(to right, #6366f1, #ec4899);
              -webkit-background-clip: text;
              -webkit-text-fill-color: transparent;
              margin-bottom: 0.5rem;
          }

          .page-subtitle {
              color: #64748b;
              font-size: 1.1rem;
          }

          .btn {
              padding: 0.75rem 1.5rem;
              border-radius: 0.5rem;
              font-weight: 500;
              transition: all 0.2s;
              font-size: 0.875rem;
              display: inline-flex;
              align-items: center;
              justify-content: center;
              cursor: pointer;
          }

          .btn-primary {
              background: linear-gradient(to right, #6366f1, #ec4899);
              color: white;
              border: none;
              box-shadow: 0 4px 6px rgba(99, 102, 241, 0.25);
          }

          .btn-primary:hover {
              transform: translateY(-2px);
              box-shadow: 0 6px 10px rgba(99, 102, 241, 0.3);
          }

          .btn-secondary {
              background: #f1f5f9;
              color: #334155;
              border: 1px solid #e2e8f0;
          }

          .btn-secondary:hover {
              background: #e2e8f0;
          }

          .btn-danger {
              background: #ef4444;
              color: white;
              border: none;
          }

          .btn-danger:hover {
              background: #dc2626;
          }

          .btn-icon {
              margin-right: 0.5rem;
          }

          .search-container {
              position: relative;
              margin-bottom: 1.5rem;
          }

          .search-input {
              width: 100%;
              padding: 0.75rem 1rem 0.75rem 2.5rem;
              border-radius: 0.5rem;
              border: 1px solid #e2e8f0;
              background-color: white;
              font-size: 0.875rem;
          }

          .search-icon {
              position: absolute;
              left: 0.75rem;
              top: 50%;
              transform: translateY(-50%);
              color: #94a3b8;
          }

          .card-grid {
              display: grid;
              grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
              gap: 1.5rem;
              margin-top: 1.5rem;
          }

          .card {
              background: white;
              border-radius: 1rem;
              overflow: hidden;
              box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
              transition: all 0.3s;
              border: 1px solid #e2e8f0;
          }

          .card:hover {
              transform: translateY(-5px);
              box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
          }

          .card-header {
              padding: 1.5rem;
              background: linear-gradient(to right, rgba(99, 102, 241, 0.1), rgba(236, 72, 153, 0.1));
              position: relative;
              display: flex;
              justify-content: center;
              align-items: center;
          }

          .card-img {
              width: 80px;
              height: 80px;
              border-radius: 50%;
              object-fit: cover;
              border: 4px solid white;
              box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          }

          .card-body {
              padding: 1.5rem;
          }

          .card-title {
              font-size: 1.25rem;
              font-weight: 600;
              margin-bottom: 0.5rem;
              color: #1e293b;
          }

          .card-info {
              display: flex;
              justify-content: space-between;
              margin-bottom: 1rem;
              font-size: 0.875rem;
              color: #64748b;
          }

          .card-badge {
              background: #f1f5f9;
              color: #334155;
              padding: 0.25rem 0.75rem;
              border-radius: 9999px;
              font-size: 0.75rem;
              font-weight: 500;
          }

          .card-actions {
              display: flex;
              justify-content: space-between;
              margin-top: 1rem;
          }

          .action-btn {
              background: none;
              border: none;
              cursor: pointer;
              color: #64748b;
              transition: all 0.2s;
              padding: 0.5rem;
              border-radius: 0.375rem;
          }

          .action-btn:hover {
              background: #f1f5f9;
              color: #1e293b;
          }

          .action-btn.delete:hover {
              color: #ef4444;
          }

          .action-btn.edit:hover {
              color: #6366f1;
          }

          .action-btn.copy:hover {
              color: #0ea5e9;
          }

          .modal-content {
              border-radius: 1rem;
              border: none;
              overflow: hidden;
          }

          .modal-header {
              background: linear-gradient(to right, #6366f1, #ec4899);
              color: white;
              border-bottom: none;
              padding: 1.5rem;
          }

          .modal-title {
              font-weight: 600;
          }

          .modal-body {
              padding: 1.5rem;
          }

          .modal-footer {
              border-top: none;
              padding: 1rem 1.5rem 1.5rem;
          }

          .form-group {
              margin-bottom: 1.5rem;
          }

          .form-label {
              display: block;
              margin-bottom: 0.5rem;
              font-weight: 500;
              color: #334155;
          }

          .form-control {
              width: 100%;
              padding: 0.75rem 1rem;
              border-radius: 0.5rem;
              border: 1px solid #e2e8f0;
              background-color: white;
              font-size: 0.875rem;
              transition: border-color 0.2s;
          }

          .form-control:focus {
              outline: none;
              border-color: #6366f1;
              box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.25);
          }

          .warning-text {
              color: #ef4444;
              font-size: 0.875rem;
              margin-top: 0.5rem;
          }

          .member-list {
              max-height: 300px;
              overflow-y: auto;
              border: 1px solid #e2e8f0;
              border-radius: 0.5rem;
              margin-top: 1rem;
          }

          .member-item {
              display: flex;
              align-items: center;
              padding: 0.75rem 1rem;
              border-bottom: 1px solid #e2e8f0;
          }

          .member-item:last-child {
              border-bottom: none;
          }

          .member-checkbox {
              margin-right: 1rem;
          }

          .member-name {
              font-weight: 500;
          }

          .empty-state {
              text-align: center;
              padding: 3rem 1rem;
              color: #64748b;
          }

          .empty-icon {
              font-size: 3rem;
              margin-bottom: 1rem;
              color: #cbd5e1;
          }

          .notification-container {
              position: fixed;
              bottom: 1rem;
              right: 1rem;
              z-index: 1000;
          }

          .notification {
              background: white;
              border-radius: 0.5rem;
              box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
              padding: 1rem;
              margin-top: 0.5rem;
              display: flex;
              align-items: center;
              max-width: 350px;
              animation: slideIn 0.3s ease-out;
          }

          @keyframes slideIn {
              from {
                  transform: translateX(100%);
                  opacity: 0;
              }
              to {
                  transform: translateX(0);
                  opacity: 1;
              }
          }

          .notification-icon {
              margin-right: 0.75rem;
              color: #6366f1;
          }

          .notification-close {
              margin-left: auto;
              background: none;
              border: none;
              color: #94a3b8;
              cursor: pointer;
          }

          .progress-container {
              width: 100%;
              height: 0.5rem;
              background-color: #e2e8f0;
              border-radius: 9999px;
              overflow: hidden;
              margin: 0.5rem 0 1rem;
          }

          .progress-bar {
              height: 100%;
              background: linear-gradient(to right, #6366f1, #ec4899);
              border-radius: 9999px;
              transition: width 0.3s ease;
          }

          /* Responsive adjustments */
          @media (max-width: 768px) {
              .card-grid {
                  grid-template-columns: 1fr;
              }
              
              .page-title {
                  font-size: 2rem;
              }
          }

          /* Animation for copied text */
          .copied-text {
              position: absolute;
              background: rgba(0, 0, 0, 0.7);
              color: white;
              padding: 0.25rem 0.5rem;
              border-radius: 0.25rem;
              font-size: 0.75rem;
              top: -2rem;
              left: 50%;
              transform: translateX(-50%);
              animation: fadeOut 1s forwards;
          }

          @keyframes fadeOut {
              0% { opacity: 1; }
              70% { opacity: 1; }
              100% { opacity: 0; }
          }
      </style>
  </head>

  <div id="notification-container" class="notification-area"></div>

  <div class="container">
      <div class="page-header">
          <h1 class="page-title">Group Management</h1>
          <p class="page-subtitle">Create and manage your collaboration groups</p>
      </div>

      <div class="d-flex justify-content-between align-items-center mb-4">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createGroupModal">
              <i class="fa fa-plus btn-icon"></i> Create Group
          </button>

          <div class="search-container d-none d-md-block ml-auto" style="max-width: 300px;">
              <i class="fa fa-search search-icon"></i>
              <input type="text" class="search-input" id="groupSearch" placeholder="Search groups...">
          </div>
      </div>

      @if (count($groups) > 0)
          <div class="card-grid">
              @foreach($groups as $group)
                  <div class="card group-card" data-name="{{ strtolower($group->name) }}">
                      <div class="card-header">
                          <img src="{{ $group->image }}" alt="{{ $group->name }}" class="card-img">
                      </div>
                      <div class="card-body">
                          <h3 class="card-title">{{ $group->name }}</h3>
                          
                          <div class="card-info">
                              <span>Member Limit</span>
                              <span class="card-badge">{{ $group->join_limit }}</span>
                          </div>
                          
                          <div class="progress-container">
                              <div class="progress-bar" style="width: 0%;" data-id="{{ $group->id }}"></div>
                          </div>
                          
                          <button class="btn btn-secondary w-100 mb-3 addMember" 
                              data-limit="{{ $group->join_limit }}"
                              data-id="{{ $group->id }}" 
                              data-toggle="modal" 
                              data-target="#memberModal">
                              <i class="fa fa-users btn-icon"></i> Manage Members
                          </button>
                          
                          <div class="card-actions">
                              <button class="action-btn edit updateGroup" 
                                  data-id="{{ $group->id }}" 
                                  data-name="{{ $group->name }}" 
                                  data-limit="{{ $group->join_limit }}"  
                                  data-toggle="modal" 
                                  data-target="#updateGroupModal">
                                  <i class="fa fa-pencil"></i>
                              </button>
                              
                              <button class="action-btn delete deleteGroup" 
                                  data-id="{{ $group->id }}" 
                                  data-name="{{ $group->name }}" 
                                  data-toggle="modal" 
                                  data-target="#deleteGroupModal">
                                  <i class="fa fa-trash"></i>
                              </button>
                              
                              <button class="action-btn copy" data-id="{{ $group->id }}">
                                  <i class="fa fa-copy"></i>
                              </button>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      @else
          <div class="empty-state">
              <div class="empty-icon">
                  <i class="fa fa-users"></i>
              </div>
              <h3>No Groups Found</h3>
              <p>Create your first group to get started</p>
              <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#createGroupModal">
                  <i class="fa fa-plus btn-icon"></i> Create Group
              </button>
          </div>
      @endif
  </div>

  <!-- Create Group Modal -->
  <div class="modal fade" id="createGroupModal" tabindex="-1" role="dialog" aria-labelledby="createGroupModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="createGroupModalLabel">Create New Group</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form enctype="multipart/form-data" id="createGroupForm">
                  <div class="modal-body">
                      <div class="form-group">
                          <label class="form-label" for="group-name">Group Name</label>
                          <input type="text" id="group-name" name="name" placeholder="Enter Group Name" required class="form-control">
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label" for="group-image">Group Image</label>
                          <input type="file" id="group-image" required name="image" class="form-control">
                          <div id="image-preview" class="mt-3 text-center d-none">
                              <img src="/placeholder.svg" alt="Preview" style="max-width: 100%; max-height: 150px; border-radius: 0.5rem;">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label" for="group-limit">Member Limit</label>
                          <input type="number" id="group-limit" name="limit" min="1" placeholder="Enter User Limit" required class="form-control">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Create Group</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Members Modal -->
  <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="memberModalLabel">Manage Members</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form id="add-member-form">
                  <div class="modal-body">
                      <input type="hidden" name="group_id" id="add-group-id">
                      <input type="hidden" name="limit" id="add-limit">
                      
                      <div class="member-list">
                          <div class="addMemberTable">
                              <table class="table addMembersInTable w-100">
                                  <!-- Members will be loaded here -->
                              </table>
                          </div>
                      </div>
                      
                      <div id="add-member-error" class="warning-text mt-3"></div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Delete Group Modal -->
  <div class="modal fade" id="deleteGroupModal" tabindex="-1" role="dialog" aria-labelledby="deleteGroupModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="deleteGroupModalLabel">Delete Group</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form id="delete-group-form">
                  <div class="modal-body">
                      <input type="hidden" name="id" id="delete-group-id">
                      <div class="text-center mb-4">
                          <i class="fa fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                          <p class="mb-1">Are you sure you want to delete this group?</p>
                          <p class="font-weight-bold" id="group-name"></p>
                          <p class="text-muted small">This action cannot be undone.</p>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-danger">Delete Group</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Update Group Modal -->
  <div class="modal fade" id="updateGroupModal" tabindex="-1" role="dialog" aria-labelledby="updateGroupModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="updateGroupModalLabel">Update Group</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form enctype="multipart/form-data" id="updateGroupForm">
                  <div class="modal-body">
                      <input type="hidden" name="id" id="update-group-id">
                      
                      <div class="form-group">
                          <label class="form-label" for="update-group-name">Group Name</label>
                          <input type="text" id="update-group-name" name="name" placeholder="Enter Group Name" required class="form-control">
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label" for="update-group-image">Group Image (Optional)</label>
                          <input type="file" id="update-group-image" name="image" class="form-control">
                          <div id="update-image-preview" class="mt-3 text-center d-none">
                              <img src="/placeholder.svg" alt="Preview" style="max-width: 100%; max-height: 150px; border-radius: 0.5rem;">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <label class="form-label" for="update-group-limit">Member Limit</label>
                          <input type="number" id="update-group-limit" name="limit" min="1" placeholder="Enter User Limit" required class="form-control">
                      </div>
                      
                      <div class="warning-text">
                          <i class="fa fa-exclamation-circle mr-1"></i>
                          NOTE: If you reduce the member limit below the current number of members, all members will be removed from this group.
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Update Group</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <script>
      // Initialize image preview for create form
      document.getElementById('group-image').addEventListener('change', function(e) {
          const file = e.target.files[0];
          if (file) {
              const reader = new FileReader();
              reader.onload = function(event) {
                  const preview = document.getElementById('image-preview');
                  preview.classList.remove('d-none');
                  preview.querySelector('img').src = event.target.result;
              };
              reader.readAsDataURL(file);
          }
      });

      // Initialize image preview for update form
      document.getElementById('update-group-image').addEventListener('change', function(e) {
          const file = e.target.files[0];
          if (file) {
              const reader = new FileReader();
              reader.onload = function(event) {
                  const preview = document.getElementById('update-image-preview');
                  preview.classList.remove('d-none');
                  preview.querySelector('img').src = event.target.result;
              };
              reader.readAsDataURL(file);
          }
      });

      // Search functionality
      document.getElementById('groupSearch').addEventListener('input', function(e) {
          const searchTerm = e.target.value.toLowerCase();
          const cards = document.querySelectorAll('.group-card');
          
          cards.forEach(card => {
              const groupName = card.getAttribute('data-name');
              if (groupName.includes(searchTerm)) {
                  card.style.display = 'block';
              } else {
                  card.style.display = 'none';
              }
          });
      });

      // Load member counts for progress bars
      document.addEventListener('DOMContentLoaded', function() {
          const progressBars = document.querySelectorAll('.progress-bar');
          
          progressBars.forEach(bar => {
              const groupId = bar.getAttribute('data-id');
              
              // This would be replaced with an actual AJAX call to get member count
              // For now, we'll use a random number for demonstration
              const memberCount = Math.floor(Math.random() * 10);
              const limit = parseInt(document.querySelector(`.addMember[data-id="${groupId}"]`).getAttribute('data-limit'));
              const percentage = (memberCount / limit) * 100;
              
              bar.style.width = `${percentage}%`;
          });
      });
  </script>

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

