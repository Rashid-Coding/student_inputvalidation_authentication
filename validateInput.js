function validateInput() {
    let name = document.getElementById("name").value;
    let errorMessage = "";

    if (!/^[a-zA-Z ]+$/.test(name)) {
        alert("Name can only contain letters and spaces");
        errorMessage += "Name can only contain letters and spaces.";
        exit();

    }

    if(errorMessage !== ""){
        document.getElementById("error-message").innerHTML = errorMessage;
        return false;
    }

    return true;
}
