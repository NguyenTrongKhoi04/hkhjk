function callDataUrl() {
    const url_api = document.querySelector("#path").value.trim();

    if (!url_api) {
        toastr.error("Empty URL");
        return;
    }

    if (!isValidURL(url_api)) {
        toastr.error("Please enter a valid URL");
        return;
    }

    fetch(url_api)
        .then((response) => {
            if (!response.ok) throw new Error("Network response was not ok");
            return response.text();
        })
        .then((data) => {
            console.log("Fetched data:", typeof data, data);
            inputEditor.setText(data);
            beautifyJSON();
            removeModal();
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
            toastr.error("Failed to fetch data: " + error.message);
        });
}

document.getElementById("path").onclick = null;
