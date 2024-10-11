function openFileUser() {
    const filePicker = document.createElement("input");
    filePicker.type = "file";
    filePicker.accept = ".txt, .json";

    filePicker.onchange = (event) => {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                const content = e.target.result;

                inputEditor.setText(content);
                beautifyJSON();

                filePicker.value = "";
            };

            removeModal();

            reader.readAsText(file);
        } else {
            console.error("No file selected");
        }
    };

    filePicker.click();
}
