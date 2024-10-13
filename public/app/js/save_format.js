function openSaveFormatModal() {
    $("#saveFormatModal").modal("show");
}

function validateAndSaveFormat(route) {
    const name = document.getElementById("name").value.trim();
    const title = document.getElementById("title").value.trim();
    const tag = document.getElementById("tag").value.trim();
    const description = document.getElementById("description").value.trim();
    const dataJson = inputEditor.getText().trim();

    const data = {
        name: name,
        title: title,
        tag: tag,
        description: description,
        dataJson: dataJson,
    };

    console.log(data);
    // Clear previous error messages
    document.getElementById("name-error").innerText = "";
    document.getElementById("title-error").innerText = "";
    document.getElementById("error-message").style.display = "none";

    let valid = true;

    // Validation
    if (!dataJson || !JSON.parse(dataJson)) {
        toastr.error("Data must be valid JSON and not empty!");
        valid = false;
    }

    if (!name) {
        document.getElementById("name-error").innerText = "Name is required.";
        valid = false;
    }

    if (name.length > 100) {
        document.getElementById("name-error").innerText =
            "Name should not exceed 100 characters.";
        valid = false;
    }

    if (!title) {
        document.getElementById("title-error").innerText = "Title is required.";
        valid = false;
    }
    if (title.length > 100) {
        document.getElementById("title-error").innerText =
            "Title should not exceed 100 characters.";
        valid = false;
    }

    if (tag.length > 50) {
        document.getElementById("tag-error").innerText =
            "Tag should not exceed 50 characters.";
        valid = false;
    }

    if (description.length > 500) {
        document.getElementById("description-error").innerText =
            "Description should not exceed 500 characters.";
        valid = false;
    }

    if (valid) {
        fetch(route, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify(data),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((responseData) => {
                if (responseData.success) {
                    toastr.success("Saved Successfully");
                    $("#saveFormatModal").modal("hide");
                    document.getElementById("saveFormatForm").reset();
                } else {
                }
            })
            .catch((error) => {
                toastr.error("You must login");
                console.error("Error:", error);
            });
    }
}
