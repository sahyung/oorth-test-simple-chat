const axios = require("axios");
const NodeCache = require("node-cache");
const myCache = new NodeCache({ stdTTL: 120, checkperiod: 120 }); // auto delete cache after 2 minutes
const express = require('express');
const app = express();
let randomColor = require('randomcolor');
const uuid = require('uuid');

//middlewares
app.use(express.static('public'));

//routes
app.get('/api/articles',(req,res)=>{
    let {offset, limit} = req.query;
    let url = `https://conduit.productionready.io/api/articles`;

    if (!offset) offset = 0;
    if (!limit) limit = 10;

    let key = `getArticles_${offset}_${limit}`;
    cachedArticles = myCache.get(key);
    if (cachedArticles == undefined) {
        // handle miss!
        axios.get(url, {
            params: {
                offset,
                limit,
            }
        })
        .then(function (response) {
            console.log('cache not found, call endpoint');
            // handle success
            myCache.set(key, response.data);
            res.json(response.data)
        })
        .catch(function (error) {
            // handle error
            res.status(500).json(error);
        });
    } else {
        console.log("cache found");
        res.json(cachedArticles);
    }
});

//Listen on env port 5000
const PORT = process.env.PORT || 5000
server = app.listen(PORT, function () {
    console.log('listening on ' + PORT);
});

//socket.io instantiation
const io = require("socket.io")(server);

let users = [];
let connnections = [];

//listen on every connection
io.on('connection', (socket) => {
    console.log('New Anonymous user connected');
    connnections.push(socket)
    //initialize a random color for the socket
    let color = randomColor();

    socket.username = 'Anonymous';
    socket.color = color;

    //listen on change_username
    socket.on('change_username', data => {
        let id = uuid.v4(); // create a random id for the user
        socket.id = id;
        socket.username = data.nickname;
        console.log(`change name to ${socket.username}`);
        users.push({id, username: socket.username, color: socket.color});
        updateUsernames();
    })

    //update Usernames in the client
    const updateUsernames = () => {
        io.sockets.emit('get users',users)
    }

    //listen on new_message
    socket.on('new_message', (data) => {
        //broadcast the new message
        io.sockets.emit('new_message', {
            message_img: data.message_img,
            message: data.message,
            username: socket.username,
            color: socket.color
        });
    })

    //listen on typing
    socket.on('typing', data => {
        socket.broadcast.emit('typing',{username: socket.username})
    })

    //Disconnect
    socket.on('disconnect', data => {

        if(!socket.username)
            return;
        //find the user and delete from the users list
        let user = undefined;
        for(let i= 0;i<users.length;i++){
            if(users[i].id === socket.id){
                user = users[i];
                break;
            }
        }
        users = users.filter( x => x !== user);
        //Update the users list
        updateUsernames();
        connnections.splice(connnections.indexOf(socket),1);
    })
})
