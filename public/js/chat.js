$(function () {
    //make connection
    let socket = io.connect('http://localhost:5000');

    //buttons and inputs
    let message = $("#message");
    let message_img = null;
    let send_message = $("#send_message");
    let chatroom = $("#chatroom-history");
    let feedback = $("#feedback");
    let usersList = $("#users-list");
    let nickname = $("#nickname-input");
    $("#message_img")[0].addEventListener('change', getBase64FromInput);

    function getBase64FromInput() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);

        reader.onload = function () {
            message_img = reader.result //base64encoded string
        };
        reader.onerror = function (error) {
            console.log('Error: ', error);
        };
    }
    
    //Emit message
    // If send message btn is clicked
    send_message.click(function(){
        socket.emit('new_message', {
            message: message.val(),
            message_img
        })
    });
    // Or if the enter key is pressed
    message.keypress( e => {
        let keycode = (e.keyCode ? e.keyCode : e.which);
        if(keycode == '13'){
            send_message.click()
        }
    })

    //Listen on new_message
    socket.on("new_message", (data) => {
        $("#message_img")[0].value = null;
        message_img = null;
        feedback.html('');
        message.val('');

        //append the new message on the chatroom
        if (data.message_img) {
            chatroom.append(`
            <div>
                <div class="box3 sb14">
                    <p style='color:${data.color}' class="chat-text user-nickname">${data.username}</p>
                    <p class="chat-text" style="color: rgba(0,0,0,0.87)">${data.message}</p>
                    <img width="100%" src="${data.message_img}" / >
                </div>
            </div>
        `)
        } else {
            chatroom.append(`
                <div>
                    <div class="box3 sb14">
                        <p style='color:${data.color}' class="chat-text user-nickname">${data.username}</p>
                        <p class="chat-text" style="color: rgba(0,0,0,0.87)">${data.message}</p>
                    </div>
                </div>
            `)
        }
        keepTheChatRoomToTheBottom()
    });

    //Emit a username
    nickname.keypress( e => {
        let keycode = (e.keyCode ? e.keyCode : e.which);
        if(keycode == '13'){
            socket.emit('change_username', {nickname : nickname.val()});
            socket.on('get users', data => {
                let html = '';
                for(let i=0;i<data.length;i++){
                    html += `<li class="list-item" style="color: ${data[i].color}">${data[i].username}</li>`;
                }
                usersList.html(html)
            })
        }
    });

    //Emit typing
    message.on("keypress", e => {
        let keycode = (e.keyCode ? e.keyCode : e.which);
        if(keycode != '13'){
            socket.emit('typing')
        }
    });

    //Listen on typing
    socket.on('typing', (data) => {
        feedback.html("<p><i>" + data.username + " is typing a message..." + "</i></p>")
        keepTheChatRoomToTheBottom()
    });
});

// function thats keeps the chatbox stick to the bottom
const keepTheChatRoomToTheBottom = () => {
    const chatroom = document.getElementById('chatroom');
    chatroom.scrollTop = chatroom.scrollHeight - chatroom.clientHeight;
}
