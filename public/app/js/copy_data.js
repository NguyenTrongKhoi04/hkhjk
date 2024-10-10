function copyToClipboard_Button() {
    outputEditor.getText()
        ? copyToClipboard(outputEditor.getText())
        : toastr.warning("Can't copy empty text in formatter");
}
