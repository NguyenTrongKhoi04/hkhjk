function openFileUser() {
    const filePicker = document.createElement("input");
    filePicker.type = "file";
    filePicker.accept = ".txt, .json, .csv";

    filePicker.onchange = (event) => {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                const content = e.target.result;

                inputEditor.setText(content);
                beautifyJSON();

                document.getElementById("loadFileDialog").style.display =
                    "none";
                var backdrop = document.querySelector(".modal-backdrop");
                if (backdrop) {
                    backdrop.remove();
                }

                filePicker.value = "";
            };

            // Reset UI after submit file
            ["loadFileDialog", "page-top"].forEach((id) =>
                document
                    .getElementById(id)
                    ?.classList.remove("in", "modal-open")
                    ?.style.removeProperty("padding-right")
            );

            reader.readAsText(file);
        } else {
            console.error("No file selected");
        }
    };

    filePicker.click();
}
