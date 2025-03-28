<x-app-layout>
    {{-- <div class="flex items-center justify-center min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('images/dashboard.jpg'); filter: blur(8px);"></div>
        <div class="absolute inset-0 bg-black opacity-30"></div>--}}
        <head>
            <link rel="icon" href="images/logo.png" type="image/x-icon">
            <title>Virtual Collaboration Hub</title>
        </head>
        <div class="container mt-4">  

        <div class ="row">
            @if(count($groups) > 0 || count($joinedGroups) > 0)
            
            <div class="col-md-3">

                <ul class = "list-group">
                    @foreach($groups as $group)

                    <li class="list-group-item list-group-item-dark cursor-pointer group-list" data-id="{{optional($group)->id}}">
                        
                        <img src="/{{ $group->image}}" class="user-image">
                        {{ $group->name}}
                    </li>
                    @endforeach

                    @foreach($joinedGroups as $group)

                    <li class="list-group-item list-group-item-dark cursor-pointer group-list" data-id="{{$group->getGroup->id}}">
                        
                        <img src="/{{ $group->getGroup->image}}" class="user-image">
                        {{ $group->getGroup->name}}
                    </li>
                    @endforeach


                </ul>
            </div>
            <div id="notification-container" class="notification-area"></div>
            <div class="col-md-9">
             
                <h1 class="group-start-head">Click in group to Start the chat</h1>

                <div class="group-chat-section">
                    <div id="selected-user-info" class="d-flex align-items-center mb-3" style="display: none;">
                        <img id="selected-user-image" src="" class="rounded-circle" width="50" height="50" style="margin-right: 10px;">
                        <h5 id="selected-user-name"></h5>
                    </div>
                    <div id="group-chat-container">

                  </div> 
                    {{-- <form action="" id="group-chat-form">
                        <input type="text" name="message" placeholder="Enter Message" id="group-message" class="border" required>
                        <input type="submit" value = "Send Message" class="btn btn-primary">
                    </form> --}}

                    <form action="" id="group-chat-form" enctype="multipart/form-data">
                        <input type="text" name="message" placeholder="Enter Message" id="group-message" class="border" required>
                        <input type="file" name="attachment" id="group-attachment" class="border">
                        <input type="submit" value="Send Message" class="btn btn-primary">
                    </form>

                

            </div>

            
            @else
                <div class = "col-md-12">
                    <h3>Groups not Found!!</h3>
                </div>
            @endif
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