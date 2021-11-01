let bookNowBtn = document.getElementById("submit")
bookNowBtn.addEventListener("click", function () {
    let userguestRange = document.getElementById("userguestRange")
    let userguestRangeVal = userguestRange.value

    let usertitle = document.getElementById("usertitle")
    let usertitleVal = usertitle.value

    let userfirstName = document.getElementById("userfirstName")
    let userfirstNameVal = userfirstName.value

    let userlastName = document.getElementById("userlastName")
    let userlastNameVal = userlastName.value

    let useremail = document.getElementById("useremail")
    let useremailVal = useremail.value

    let usernumber = document.getElementById("usernumber")
    let usernumberVal = usernumber.value

    let userplan = document.getElementById("userplan")
    let userplanVal = userplan.value

   Submit(userguestRangeVal, usertitleVal, userfirstNameVal, userlastNameVal, useremailVal, usernumberVal, userplanVal)
})

function Submit(userguestRange, usertitle, userfirstName, userlastName, useremail, usernumber, userplan) {
    let url = 'https://api.sheety.co/d3ebf8ca8f55b36640149d211f20bad4/reservation/sheet1';
    let body = {
        Reservation: {
            guestrange: userguestRange,
            title: usertitle,
            firstname: userfirstName,
            lastname: userlastName,
            emailaddress: useremail,
            phonenumber:usernumber,
            selectplan: userplan

        }
    }
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(body),
        headers: {
            "Content-Type": "application/json"
        }
    })
        .then((response) => response.json())
        .then(json => {
            // Do something with object
            console.log(json.sheet1);
            alert(json.sheet1.name + " added in the list!")
        });
}