
function validateEmail(field) {
    if (field == "") {
        return "Enter Email\n"
    }
    else {
        const dot = field.indexOf(".") > 0
        const att = field.indexOf("@") > 0
        const pattern = /[a-zA-Z0-9._]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/.test(field)
        return (dot && att && pattern) ? "" : "Invalid Email Format\n"
    }
}

function validatePassword (field) {
    return (field == "" || field.length < 6) ? "Password should be at least 6 characters\n" : ""
}

function validateLogin (form) {
    var result = validateEmail (form.email.value)
    result += validatePassword (form.password.value)
    if (result == "") return true
    else { alert ("Error in Login:\n" + result); return false }
}
