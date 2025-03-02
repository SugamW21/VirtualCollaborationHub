<x-app-layout>
    <head>
        <link rel="icon" href="images/logo.png" type="image/x-icon">
        <title>Virtual Collaboration Hub</title>
    </head>
    <div class="flex items-center justify-center min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('images/dashboard.jpg'); filter: blur(8px);"></div>
        <div class="absolute inset-0 bg-black opacity-30"></div>

    <div class="container mt-4"> 

        <div class ="row">
            @if(count($users) > 0)
            
            <div class="col-md-3">

                <ul class = "list-group">
                    @foreach($users as $user)
                    @php
                            if($user->image != "" && $user->image !=null){
                                $image = $user->image;
                            }
                            else{
                                $image="images/dummy.png";
                            }
                            
                                
                            
                        @endphp
                    <li class="list-group-item list-group-item-dark cursor-pointer user-list" data-id="{{$user->id}}">
                        
                        <img src="{{ $image}}" alt="" class="user-image">
                        {{ $user->name}}
                        <b><sup id="{{$user->id}}-status" class="offline-status">Offline</sup></b>
                    </li>
                    @endforeach
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
                    {{-- <form action="" id="chat-form">
                        <input type="text" name="message" placeholder="Enter Message" id="message" class="border" required>
                        <input type="submit" value = "Send Message" class="btn btn-primary">
                    </form> --}}
                    <form action="" id="chat-form" enctype="multipart/form-data">
                      <input type="text" name="message" placeholder="Enter Message" id="message" class="border" required>
                      <input type="file" name="attachment" id="attachment" class="border">
                      <input type="submit" value="Send Message" class="btn btn-primary">
                  </form>


                  

            </div>

            
            @else
                <div class = "col-md-12">
                    <h3>Users not Found!!</h3>
                </div>
            @endif
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
</x-app-layout> 
