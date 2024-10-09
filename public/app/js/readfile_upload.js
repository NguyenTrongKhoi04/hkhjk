function openFileUser() {
    console.log("khôi");
    const filePicker = document.createElement("input");
    filePicker.type = "file";
    filePicker.accept = ".txt, .json, .csv";

    filePicker.onchange = (event) => {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                const content = e.target.result;
                // console.log(content);

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
            reader.readAsText(file);
        } else {
            console.error("No file selected");
        }
    };

    filePicker.click();
}
