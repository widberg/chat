var roomName = window.location.split('/')[window.location.split('/').length-1];

send = function() {
    if (this.msg) {
        axios.post('send',{
            message: this.msg,
        }).then(function (response) {
            if (response.data.result == 'ok') {
                this.pushMessage("test", this.message);
                this.msg = '';
            }
        }).catch(function (error) {
            console.log(error);
        });
    }else{
        alert('type something...');
    }
}

pushMessage = function(user, message) {
    this.messageArray.push({
        user: user,
        message: message,
    });
}

pushUsers = function(users) {
    this.users.push.apply(this.users, users);
}

removeUser = function(user) {
    this.users.splice(this.users.indexOf(user), 1);
}

listen = function() {
    Echo.channel('room.'+this.room)
        .here(function (users) {
            this.pushUsers(users);
        })
        .joining(function (user) {
            this.pushUsers([user]);
        })
        .leaving(function (user) {
            this.removeUser(user);
        })
        .listen('ChatMessageWasReceived', function (e) {
            this.pushMessage(e.user, e.message);
        });
}

info = function() {
    alert("info");
}
