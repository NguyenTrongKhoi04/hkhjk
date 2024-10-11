function isValidURL(url) {
    const regex = /^(https?:\/\/)?([a-z0-9-]+\.)+[a-z]{2,6}(\/[^\s]*)?$/i;
    return regex.test(url);
}

function copyToClipboard_Button() {
    outputEditor.getText()
        ? copyToClipboard(outputEditor.getText())
        : toastr.error("Can't copy empty text in formatter");
}

function removeModal() {
    document.getElementById("loadFileDialog").style.display = "none";
    var backdrop = document.querySelector(".modal-backdrop");
    if (backdrop) {
        backdrop.remove();
    }

    ["loadFileDialog", "page-top"].forEach((id) =>
        document
            .getElementById(id)
            ?.classList.remove("in", "modal-open")
            ?.style.removeProperty("padding-right")
    );
}
