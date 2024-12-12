function validateTitle(field) {
    return field.trim() === "" ? "Title cannot be blank\n" : "";
}

function validateAuthor(field) {
    return field.trim() === "" ? "Author cannot be blank\n" : "";
}

function validateDescription(field) {
    return field.trim() === "" ? "Description cannot be blank\n" : "";
}

function validateISBN(field) {
    if (field.trim() === "") {
        return "ISBN cannot be blank\n";
    } else if (!/^\d{11,13}$/.test(field)) {
        return "ISBN should be an 11-13 digit number\n";
    } else {
        return "";
    }
}

function validateNewBook(form) {
    var result = validateTitle(form.title.value);
    result += validateAuthor(form.author.value);
    result += validateDescription(form.description.value);
    result += validateISBN(form.isbn.value);
    
    if (result === "") {
        return true;
    } else {
        alert("Error in Adding Book:\n" + result);
        return false;
    }
}
