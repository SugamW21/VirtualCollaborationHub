$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function() {
    $('.user-list').click(function() {
        $('#chat-container').html('');

        var getUserId = $(this).attr('data-id');
        receiver_id = getUserId;

        // Get user details from the clicked list item
        var userName = $(this).text().trim();
        var userImage = $(this).find('img').attr('src'); // Get the user's image

        // Update the selected user display
        $('#selected-user-name').text(userName);
        $('#selected-user-image').attr('src', userImage);

        // Show the selected user info section
        $('.selected-user-info').removeClass('hidden');

        $('.start-head').hide();
        $('.chat-section').show();

        loadOldChats();
    });


    // $('#chat-form').submit(function(e) {
    //     e.preventDefault();
    
    //     var message = $('#message').val();
    
    //     $.ajax({
    //         url: "/save-chat",
    //         type: "POST",
    //         data: { sender_id: sender_id, receiver_id: receiver_id, message: message },
    //         success: function(res) {
    //             if(res.success) {
    //                 $('#message').val('');
    //                 let chat = res.data;
    //                 let userImage = (chat.sender_data.image == null) ? 'images/dummy.png' : chat.sender_data.image;
    //                 let userName = chat.sender_data.name;
                    
    //                 let date = new Date(chat.created_at);
    //                 let cDateTime = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear() + 
    //                                 ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
    
    //                 let html = `
    //                 <div class="current-user-chat" id='${chat.id}-chat'>
    //                     <h1>
    //                         <span>${chat.message}</span>
    //                         <i class="fa fa-trash" aria-hidden="true" data-id='${chat.id}' data-toggle="modal" data-target="#deleteChatModal"></i>
    //                         <i class="fa fa-edit" aria-hidden="true" data-id='${chat.id}' data-msg='${chat.message}' data-toggle="modal" data-target="#updateChatModal"></i>
    //                     </h1>
    //                     <div class="user-data">
    //                         <img src="${userImage}" class="user-chat-image" />
    //                         <b>Me</b>
    //                         ${cDateTime}
    //                     </div>
    //                 </div>
    //                 `;
    
    //                 $('#chat-container').append(html);
    //                 scrollChat();
    //             } else {
    //                 alert(res.msg);
    //             }
    //         }
    //     });
    // });
    $('#chat-form').submit(function(e) {
        e.preventDefault();
        
        var formData = new FormData(this); // Create a FormData object from the form
        formData.append('sender_id', sender_id);
        formData.append('receiver_id', receiver_id);
    
        $.ajax({
            url: "/save-chat",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                if(res.success) {
                    $('#message').val('');
                    $('#attachment').val(''); // Reset the attachment input
                    let chat = res.data;
                    let userImage = (chat.sender_data.image == null) ? 'images/dummy.png' : chat.sender_data.image;
                    let userName = chat.sender_data.name;
    
                    let date = new Date(chat.created_at);
                    let cDateTime = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear() + 
                                    ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
    
                    let html = `
                    <div class="current-user-chat" id='${chat.id}-chat'>
                        <h1>
                            <span>${chat.message}</span>${chat.attachment ? `<a href="/storage/${chat.attachment}" target="_blank"><b style="color:blue">View Attachment</b></a>` : ''}

                            <i class="fa fa-trash" aria-hidden="true" data-id='${chat.id}' data-toggle="modal" data-target="#deleteChatModal"></i>
                            <i class="fa fa-edit" aria-hidden="true" data-id='${chat.id}' data-msg='${chat.message}' data-toggle="modal" data-target="#updateChatModal"></i>
                        </h1>
                        <div class="user-data">
                            <img src="${userImage}" class="user-chat-image" />
                            <b>Me</b>
                            ${cDateTime}
                        </div>
                    </div>
                    `;
    
                    $('#chat-container').append(html);
                    scrollChat();
                } else {
                    alert(res.msg);
                }
            }
        });
    });
    
    

    $(document).on('click','.fa-trash',function(){
        var id = $(this).attr('data-id');
        $('#delete-chat-id').val(id);
        $('#delete-message').text($(this).parent().text());
    });
    $('#delete-chat-form').submit(function(e){
        e.preventDefault();

        var id = $('#delete-chat-id').val();

        $.ajax({
            url: "/delete-chat",
            type: "POST",
            data: {id: id},
            success: function(res){
                alert(res.msg);
                if(res.success){
                    $('#'+id+'-chat').remove();
                    $('#deleteChatModal').modal('hide');
                }
                else{
                    alert(res.msg);
                }
                
            }
            });
    });

});




// function loadOldChats() {
//     $.ajax({
//         url: "/load-chats",
//         type: "POST",
//         data: { sender_id: sender_id, receiver_id: receiver_id },
//         success: function(res) {
//             if(res.success) {
//                 let chats = res.data;
//                 let html = '';

//                 for(let i = 0; i < chats.length; i++) {
//                     let chat = chats[i];
//                     let addClass = (chat.sender_id == sender_id) ? 'current-user-chat' : 'distance-user-chat';
//                     let userImage = (chat.sender_data.image == null) ? 'images/dummy.png' : chat.sender_data.image;
//                     let userName = chat.sender_data.name;

//                     let date = new Date(chat.created_at);
//                     let cDateTime = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear() + 
//                                     ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();

//                     html += `
//                     <div class="${addClass}" id='${chat.id}-chat'>
//                         <h1>
//                             <span>${chat.message}</span>
//                             `;

//                     // Show edit and delete buttons for the sender only
//                     if (chat.sender_id == sender_id) {
//                         html += `
//                         <i class="fa fa-trash" aria-hidden="true" data-id="${chat.id}" data-toggle="modal" data-target="#deleteChatModal"></i>
//                         <i class="fa fa-edit" aria-hidden="true" data-id="${chat.id}" data-msg="${chat.message}" data-toggle="modal" data-target="#updateChatModal"></i>`;
//                     }

//                     html += `
//                         </h1>
//                         <div class="user-data">
//                             <img src="${userImage}" class="user-chat-image" />
//                             <b>${chat.sender_id == sender_id ? "Me" : userName}</b>
//                             ${cDateTime}
//                         </div>
//                     </div>`;
//                 }

//                 $('#chat-container').append(html);
//                 scrollChat();
//             } else {
//                 alert(res.msg);
//             }
//         }
//     });
// }
function loadOldChats() {
    $.ajax({
        url: "/load-chats",
        type: "POST",
        data: { sender_id: sender_id, receiver_id: receiver_id },
        success: function(res) {
            if(res.success) {
                let chats = res.data;
                let html = '';

                for(let i = 0; i < chats.length; i++) {
                    let chat = chats[i];
                    let addClass = (chat.sender_id == sender_id) ? 'current-user-chat' : 'distance-user-chat';
                    let userImage = (chat.sender_data.image == null) ? 'images/dummy.png' : chat.sender_data.image;
                    let userName = chat.sender_data.name;

                    let date = new Date(chat.created_at);
                    let cDateTime = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear() + 
                                    ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();

                    html += `
                    <div class="${addClass}" id='${chat.id}-chat'>
                        <h1>
                            <span>${chat.message}</span>
                            ${chat.attachment ? `<a href="/storage/${chat.attachment}" target="_blank"><b style="color:blue">View Attachment</b></a>` : ''}
                    `;

                    // Show edit and delete buttons for the sender only
                    if (chat.sender_id == sender_id) {
                        html += `
                        <i class="fa fa-trash" aria-hidden="true" data-id="${chat.id}" data-toggle="modal" data-target="#deleteChatModal"></i>
                        <i class="fa fa-edit" aria-hidden="true" data-id="${chat.id}" data-msg="${chat.message}" data-toggle="modal" data-target="#updateChatModal"></i>`;
                    }

                    html += `
                        </h1>
                        <div class="user-data">
                            <img src="${userImage}" class="user-chat-image" />
                            <b>${chat.sender_id == sender_id ? "Me" : userName}</b>
                            ${cDateTime}
                        </div>
                    </div>`;
                }

                $('#chat-container').append(html);
                scrollChat();
            } else {
                alert(res.msg);
            }
        }
    });
}



//scroll chat to bottom

function scrollChat() {
    $('#chat-container').animate({
        scrollTop: $('#chat-container').offset().top + $('#chat-container')[0].scrollHeight
    },0);
}

Echo.join('status-update')
.here((users)=>{
    // console.log(users);
    for(let x = 0; x < users.length; x++){
        if(sender_id != users[x]['id']){
            $('#'+users[x]['id']+'-status').removeClass('offline-status');
            $('#'+users[x]['id']+'-status').addClass('online-status');
            $('#'+users[x]['id']+'-status').text('Online');
        }
    }
    })
.joining((user)=>{
    // console.log(user.name+'Joined')
    $('#'+user.id+'-status').removeClass('offline-status');
    $('#'+user.id+'-status').addClass('online-status');
    $('#'+user.id+'-status').text('Online');
})

.leaving((user)=>{
    // console.log(user.name+'Leaved')
    $('#'+user.id+'-status').addClass('offline-status');
    $('#'+user.id+'-status').removeClass('online-status');
    $('#'+user.id+'-status').text('Offline');
})

.listen('UserStatusEvent',(e)=>{
    // console.log('hhhh'+e);
});

// Echo.private('broadcast-message')
//     .listen('.getChatMessage', (data) => {
//         if(sender_id == data.chat.receiver_id && receiver_id == data.chat.sender_id) {
//             let chat = data.chat;
//             let userImage = (chat.sender_data.image == null) ? 'images/dummy.png' : chat.sender_data.image;
//             let userName = chat.sender_data.name;

//             let date = new Date(chat.created_at);
//             let cDateTime = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear() + 
//                             ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();

//             let html = `
//             <div class="distance-user-chat" id="${chat.id}-chat">
//                 <h1>
//                     <span>${chat.message}</span>
//                 </h1>
//                 <div class="user-data">
//                     <img src="${userImage}" class="user-chat-image" />
//                     <b>${userName}</b>
//                     ${cDateTime}
//                 </div>
//             </div>
//             `;
//             $('#chat-container').append(html);
//             scrollChat();
//         }
//     });
Echo.private('broadcast-message')
    .listen('.getChatMessage', (data) => {
        if(sender_id == data.chat.receiver_id && receiver_id == data.chat.sender_id) {
            let chat = data.chat;
            let userImage = (chat.sender_data.image == null) ? 'images/dummy.png' : chat.sender_data.image;
            let userName = chat.sender_data.name;

            let date = new Date(chat.created_at);
            let cDateTime = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear() + 
                            ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();

            let html = `
            <div class="distance-user-chat" id="${chat.id}-chat">
                <h1>
                    <span>${chat.message}</span>
                    ${chat.attachment ? `<a href="/storage/${chat.attachment}" target="_blank"><b style="color:blue">View Attachment</b></a>` : ''}
                </h1>
                <div class="user-data">
                    <img src="${userImage}" class="user-chat-image" />
                    <b>${userName}</b>
                    ${cDateTime}
                </div>
            </div>
            `;
            $('#chat-container').append(html);
            scrollChat();
        }
    });



//delete chat message listen

Echo.private('message-deleted')
.listen('MessageDeletedEvent', (data) => {
    $('#'+data.id+'-chat').remove();

});

// update chat message

$(document).on('click','.fa-edit',function(){

    $('#update-chat-id').val($(this).attr('data-id'));
    $('#update-message').val($(this).attr('data-msg'));
});

$(document).ready(function(){
    $('#update-chat-form').submit(function(e){
        e.preventDefault();
    
        var id = $('#update-chat-id').val();
        var msg = $('#update-message').val();
    
        $.ajax({
            url: "/update-chat",
            type: "POST",
            data: {id: id, message: msg},
            success: function(res){
                // alert(res.msg);
                if(res.success){
                    $('#updateChatModal').modal('hide');
                    $('#'+id+'-chat').find('span').text(msg);
                    $('#'+id+'-chat').find('.fa-edit').attr('data-msg',msg);
                }
                else{
                    alert(res.msg);
                }
                
            }
            });
    
    });
});

Echo.private('message-updated')
.listen('MessageUpdatedEvent', (data) => {

    $('#'+data.data.id+'-chat').find('span').text(data.data.message);
    
});

















//chat group script
$(document).ready(function(){
    $('#createGroupForm').submit(function(e){
        e.preventDefault();

        $.ajax({
            url:"/create-group",
            type:"POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success:function(res){
                alert(res.msg);
                if(res.success){
                    location.reload();
                }
            }
            
        });

    });
});


function scrollGroupChat() {
    $('#group-chat-container').animate({
        scrollTop: $('#group-chat-container').offset().top + $('#group-chat-container')[0].scrollHeight
    },0);
}

//member script

$(document).ready(function(){
    $('.addMember').click(function(){
        var id = $(this).attr('data-id');

        var limit = $(this).attr('data-limit');
    
        $('#add-group-id').val(id);
        $('#add-limit').val(limit);
    
        $.ajax({
            url:"/get-members",
            type:"POST",
            data: {group_id:id},
            success:function(res){
                
                if(res.success){
                    
                    var users = res.data;
                    var html = '';

                    for(let i = 0; i<users.length; i++){
                        let isGroupMemberChecked = '';
                        if(users[i]['group_user'] != null){
                            isGroupMemberChecked ='checked';
                        }
                        html += `
                            <tr>
                            <td>
                            <input type="checkbox" name="members[]" value="`+users[i]['id']+`"
                            `+isGroupMemberChecked+`/>
                            </td>
                            <td>
                            `+users[i]['name']+`
                            </td>
                            </tr>
                         `;
                    }
                    $('.addMembersInTable').html(html);
                }
                else{
                    alert(res.msg);   
                }
            }
        });
    });

    $('#add-member-form').submit(function(e){
        e.preventDefault();

        var formData = $(this).serialize();
        

        $.ajax({
            url:"/add-member",
            type:"POST",
            data: formData,
            success:function(res){
                
                if(res.success){
                    $('#memberModal').modal('hide');
                    $('#add-member-form')[0].reset();
                    alert(res.msg);
                }
                else{
                    $('#add-member-error').text(res.msg);

                    setTimeout(function(){
                        $('#add-member-error').text('')
                    },3000);
                }
            }
        })

    });
    $('.deleteGroup').click(function(){
        $('#delete-group-id').val($(this).attr('data-id'));
        $('#group-name').text($(this).attr('data-name'));
    });

    $('#delete-group-form').submit(function(e){
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url:"/delete-group",
            type:"POST",
            data: formData,
            success:function(res){
                
                if(res.success){
                    location.reload();
                }
                else{
                    alert(res.msg);
                }
            }
        });
    });
    $('.updateGroup').click(function(){
        $('#update-group-id').val($(this).attr('data-id'));
        $('#update-group-name').val($(this).attr('data-name'));
        $('#update-group-limit').val($(this).attr('data-limit'));
    });

    $('#updateGroupForm').submit(function(e){
        e.preventDefault();

        $.ajax({
            url:"/update-group",
            type:"POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success:function(res){
                alert(res.msg);
                if(res.success){
                    location.reload();
                }
               }
        });
    });


    $('.copy').click(function(){
        $(this).prepend('<span class="copied_text">Copied</span>');
        setTimeout(()=>{
            $('.copied_text').remove();
        },1000);

        var group_id = $(this).attr('data-id');

        var url = window.location.host+'/share-group/'+group_id;

        var temp = $("<input>");
        $('body').append(temp);
        temp.val(url).select();
        document.execCommand("copy");

        temp.remove();

    });

    $('.join-now').click(function(){

        $(this).text('Wait...');
        $(this).attr('disabled','disabled');

        var group_id = $(this).attr('data-id');

        $.ajax({
            url:"/join-group",
            type:"POST",
            data: {group_id:group_id},
            success:function(res){
                alert(res.msg);
                if(res.success){
                    location.reload();
                }
                else{
                    alert(res.msg);
                    $(this).text('Join Now');
                    $(this).removeAttr('disabled');
                }
            }
        });

    });

    
        $('.group-list').click(function () {
            var groupId = $(this).attr('data-id');
            global_group_id = groupId;
    
            // Retrieve user name and image from clicked element
            var userName = $(this).text().trim();
            var userImage = $(this).find('img').attr('src');
    
            // Update the UI with user details
            $('#selected-user-image').attr('src', userImage);
            $('#selected-user-name').text(userName);
            $('#selected-user-info').show(); // Display the user info container
    
            $('#group-chat-container').html('');
    
            $('.group-start-head').hide();
            $('.group-chat-section').show();
    
            loadGroupChats();
        });
    
    

    //group chat script implemented

    // $('#group-chat-form').submit(function(e){
    //     e.preventDefault();

    //     var message = $('#group-message').val();

    //     $.ajax({
    //         url: "/save-group-chat",
    //         type: "POST",
    //         data: {sender_id:sender_id, group_id:global_group_id, message:message},
    //         success: function(res){
                
    //             if(res.success){
    //                 $('#group-message').val('');

    //                 let chat = res.data.message;

    //                 let html = `
    //                 <div class="current-user-chat" id='`+res.data.id+`-chat'>
    //                     <h1>
    //                         <span>`+chat+`</span>
    //                         <i class="fa fa-trash deleteGroupMessage" aria-hidden="true" data-id='`+res.data.id+`' data-toggle="modal" data-target="#groupDeleteChatModal"></i>
    //                         <i class="fa fa-edit editGroupChat" aria-hidden="true" data-id='`+res.data.id+`' data-msg='`+res.data.message+`' data-toggle="modal" data-target="#updateGroupChatModal"></i>
    //                     </h1>`;
    //                     // var date = new Date(res.data.user_data.updated_at);
    //                     var date = new Date(res.data.created_at);
    //                     var cDate = date.getDate();
    //                     var cMonth = (date.getMonth() + 1) > 9 ? (date.getMonth() + 1) : '0' + (date.getMonth() + 1);
    //                     var cYear = date.getFullYear();
    //                     var cHours = date.getHours();
    //                     var cMinutes = date.getMinutes();
    //                     var cSeconds = date.getSeconds();
                        

    //                     let cDateTime =  cDate+'-'+cMonth+'-'+cYear+' '+(cHours > 9?cHours:'0'+cHours)+':'+(cMinutes > 9?cMinutes:'0'+cMinutes)+':'+cSeconds;

    //                     let userImage = (res.data.user_data.image == null)?'images/dummy.png':res.data.user_data.image;

    //                     html += `
    //                                             <div class="user-data">
    //                         <img src="${userImage}" class="user-chat-image" />
    //                             <b>Me</b>
    //                         `+cDateTime+`
    //                         </div>
    //                 </div>
    //             `;
    //             $('#group-chat-container').append(html);
    //             scrollGroupChat();
    //             }
    //             else{
    //                 alert(res.msg);
    //             }
                
    //         }
    //         });
    // });
    $('#group-chat-form').submit(function(e) {
        e.preventDefault();
        
        var formData = new FormData(this); // Create FormData object from the form
        formData.append('sender_id', sender_id);
        formData.append('group_id', global_group_id);
    
        $.ajax({
            url: "/save-group-chat",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.success) {
                    $('#group-message').val('');
                    $('#group-attachment').val(''); // Reset the attachment input
    
                    let chat = res.data.message;
    
                    let html = `
                    <div class="current-user-chat" id='${res.data.id}-chat'>
                        <h1>
                            <span>${chat}</span>
                            ${res.data.attachment ? `<a href="/storage/${res.data.attachment}" target="_blank"><b style="color:blue">View Attachment</b></a>` : ''}
                            <i class="fa fa-trash deleteGroupMessage" aria-hidden="true" data-id='${res.data.id}' data-toggle="modal" data-target="#groupDeleteChatModal"></i>
                            <i class="fa fa-edit editGroupChat" aria-hidden="true" data-id='${res.data.id}' data-msg='${res.data.message}' data-toggle="modal" data-target="#updateGroupChatModal"></i>
                        </h1>`;
    
                    // Date formatting
                    var date = new Date(res.data.created_at);
                    let cDateTime = formatDateTime(date);
    
                    let userImage = (res.data.user_data.image == null) ? 'images/dummy.png' : res.data.user_data.image;
    
                    html += `
                        <div class="user-data">
                            <img src="${userImage}" class="user-chat-image" />
                            <b>Me</b>
                            ${cDateTime}
                        </div>
                    </div>`;
                    $('#group-chat-container').append(html);
                    scrollGroupChat();
                } else {
                    alert(res.msg);
                }
            }
        });
    });
    
    function formatDateTime(date) {
        var cDate = date.getDate();
        var cMonth = (date.getMonth() + 1 > 9) ? (date.getMonth() + 1) : '0' + (date.getMonth() + 1);
        var cYear = date.getFullYear();
        var cHours = date.getHours();
        var cMinutes = date.getMinutes();
        var cSeconds = date.getSeconds();
    
        return `${cDate}-${cMonth}-${cYear} ${cHours > 9 ? cHours : '0' + cHours}:${cMinutes > 9 ? cMinutes : '0' + cMinutes}:${cSeconds}`;
    }
});

Echo.private('broadcast-group-message')
.listen('.getGroupChatMessage', (data) => {
    
    if(sender_id != data.chat.sender_id && global_group_id == data.chat.group_id) {
        let html = `
        <div class="distance-user-chat" id= '`+data.chat.id+`-chat'>
            <h1>
            <span>`+data.chat.message+`</span>
            ${data.chat.attachment ? `<a href="/storage/${data.chat.attachment}" target="_blank"><b style="color:blue">View Attachment</b></a>` : ''}
            </h1>`;
            
            // var date = new Date(data.chat.user_data.updated_at);
            var date = new Date(data.chat.created_at);

            var cDate = date.getDate();
            var cMonth = (date.getMonth() + 1) > 9 ? (date.getMonth() + 1) : '0' + (date.getMonth() + 1);
            var cYear = date.getFullYear();
            var cHours = date.getHours();
            var cMinutes = date.getMinutes();
            var cSeconds = date.getSeconds();
            

            let cDateTime =  cDate+'-'+cMonth+'-'+cYear+' '+(cHours > 9?cHours:'0'+cHours)+':'+(cMinutes > 9?cMinutes:'0'+cMinutes)+':'+cSeconds;

            let userImage = (data.chat.user_data.image == null)?'images/dummy.png':data.chat.user_data.image;

            html+= `
                        <div class="user-data">
                            <img src="${userImage}" class="user-chat-image" />
                                <b>`+data.chat.user_data.name+`</b>
                            `+cDateTime+`
                        </div>
        </div>
        `;
        $('#group-chat-container').append(html);
        scrollGroupChat();
    }

});


function loadGroupChats(){

    $('#group-chat-container').html('');

    $.ajax({
        url: "/load-group-chats",
        type: "POST",
        data: {group_id: global_group_id},
        success: function(res){
            
            if(res.success){
                
                let chats = res.chats;
                let html = '';
                for(let i = 0; i < chats.length; i++){
                    let addClass = 'distance-user-chat';
                    if(chats[i].sender_id == sender_id){
                        addClass = 'current-user-chat';
                    }

                    html += `
                    <div class="`+addClass+`" id= '`+chats[i].id+`-chat'>
                        <h1>
                            <span>`+chats[i].message+`</span>
                            ${chats[i].attachment ? `<a href="/storage/${chats[i].attachment}" target="_blank"><b style="color:blue">View Attachment</b></a>` : ''}
                            `;
                        
                            if(chats[i].sender_id == sender_id){
                                html += `
                                <i class="fa fa-trash deleteGroupMessage" aria-hidden="true" data-id='`+chats[i].id+`' data-toggle="modal" data-target="#groupDeleteChatModal"></i>
                                <i class="fa fa-edit editGroupChat" aria-hidden="true" data-id='`+chats[i].id+`' data-msg='`+chats[i].message+`' data-toggle="modal" data-target="#updateGroupChatModal"></i>
                                `;
                            }


                            
                        html += `</h1>`;

                        // var date = new Date(chats[i].user_data.updated_at);
                        var date = new Date(chats[i].created_at);

                        var cDate = date.getDate();
                        var cMonth = (date.getMonth() + 1) > 9 ? (date.getMonth() + 1) : '0' + (date.getMonth() + 1);
                        var cYear = date.getFullYear();
                        var cHours = date.getHours();
                        var cMinutes = date.getMinutes();
                        var cSeconds = date.getSeconds();
                        

                        let cDateTime =  cDate+'-'+cMonth+'-'+cYear+' '+(cHours > 9?cHours:'0'+cHours)+':'+(cMinutes > 9?cMinutes:'0'+cMinutes)+':'+cSeconds;

                        let userImage = (chats[i].user_data.image == null)?'images/dummy.png':chats[i].user_data.image;
                        html += `
                        <div class="user-data">
                            <img src="${userImage}" class="user-chat-image" />`;

                            if(chats[i].sender_id == sender_id){
                                html += `
                                <b>Me</b>
                                `;
                            }
                            else{
                                html += `
                                <b>`+chats[i].user_data.name+`</b>
                                `;
                            }
                        
                        html += `
                            `+cDateTime+`
                        </div>
                    </div>
                    `;
                }
                $('#group-chat-container').append(html);
                scrollGroupChat();
            }
            else{
                alert(res.msg);
            }
        }
        });
    }

    $(document).ready(function(){

        $(document).on('click','.deleteGroupMessage', function(){
            let msg = $(this).parent().text();
            $('#delete-group-message').text(msg);

            $('#delete-group-message-id').val($(this).attr('data-id'));
        });

        $('#delete-group-chat-form').submit(function(e){
            e.preventDefault();

            var id = $('#delete-group-message-id').val();

            $.ajax({
                url: "/delete-group-chat",
                type: "POST",
                data: {id:id},
                success: function(res){
                    
                    if(res.success){
                        
                        $('#'+id+'-chat').remove();
                        $('#groupDeleteChatModal').modal('hide');
                    }
                    else{
                        alert(res.msg);
                    }
                }
            })


        });

    });

    Echo.private('group-message-deleted')
    .listen('GroupMessageDeletedEvent', (data) =>{
        $('#'+data.id+'-chat').remove();
    });


    // update group chat message

$(document).on('click','.editGroupChat',function(){

    $('#update-group-message-id').val($(this).attr('data-id'));
    $('#update-group-message').val($(this).attr('data-msg'));
});

$(document).ready(function(){
    $('#update-group-chat-form').submit(function(e){
        e.preventDefault();
    
        var id = $('#update-group-message-id').val();
        var msg = $('#update-group-message').val();
    
        $.ajax({
            url: "/update-group-chat",
            type: "POST",
            data: {id: id, message: msg},
            success: function(res){
                // alert(res.msg);
                if(res.success){
                    $('#updateGroupChatModal').modal('hide');
                    $('#'+id+'-chat').find('span').text(msg);
                    $('#'+id+'-chat').find('.fa-edit').attr('data-msg',msg);
                }
                else{
                    alert(res.msg);
                }
                
            }
            });
    
    });
});

Echo.private('group-message-updated')
.listen('GroupMessageUpdatedEvent', (data) => {

    $('#'+data.data.id+'-chat').find('span').text(data.data.message);
    
});