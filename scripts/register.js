
function validateEmail(field) {
    if (field == "") {
        return "Must include Email\n"
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

function validatePhoneNumber(field) {
    const pattern = /^[0-9-+]{10,17}$/;
    return pattern.test(field) ? "" : "Invalid Phone Number Format\n"
}

function validateAddress(field) {
    return field == "" ? "Must Include Address\n" : ""
}

function validateName(field) {
    return field == "" ? "Must Include Name\n" : ""
}

function validateRegister (form) {
    var result = validateEmail (form.email.value)
    result += validatePassword (form.password.value)
    result += validatePhoneNumber (form.phone_number.value)
    result += validateAddress (form.address.value)
    result += validateName (form.name.value)
    if (result == "") return true
    else { alert ("Error in Login:\n" + result); return false }
}
