function getUsernamePassword()
{
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    if(email == "" || password == "")
    {
        console.log("Please enter valid email");
    }
    else
    
    console.log(username + " " + password)
}
function createAccount()
{
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var passwordConfirm = document.getElementById("repeatPassword").value;
    console.log("Pass! input")
    if(email == "" || password == "")
    {
        window.alert("Please enter a valid username or password");
    }
    else
    {
        console.log("Pass! first IF")
        if(password == passwordConfirm)
        {
            startDb();
        }
        else
        {
            window.alert("Password doesn't match, please try again");
        }
    }
}
function startDb()
{
    var mysql = require('mysql');

    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: ""
      });
    
    con.connect(function(err) {
        if (err) throw err;
        console.log("Connected!");
    });
}