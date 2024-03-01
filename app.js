    var d = new Date();
    // Set the value of the "date" field
    document.getElementById("date").value = d.toDateString();

    // Set the value of the "time" field
    var hours = d.getHours();
    var mins = d.getMinutes();
    var seconds = d.getSeconds();
    document.getElementById("time").value = hours + ":" + mins + ":" + seconds;




    let activeUser = [];
    let aDisplay = document.getElementById('userDisplay').innerHTML;
    let aAvatar = document.getElementById('userAvatar').innerHTML;
    let aUser = document.getElementById('userName').innerHTML;


    activeUser.push(aDisplay);
    activeUser.push(aAvatar);
    activeUser.push(aUser);

    aDisplay.style.display = 'none';