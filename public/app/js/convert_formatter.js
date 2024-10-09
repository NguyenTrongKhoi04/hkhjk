function setTypeConvertSubmit(value) {
    const hiddenInput = document.getElementById("typeConvert");
    hiddenInput.value = value;
}

function convertJson(route, format) {
    setTypeConvertSubmit(format);

    let jsonText = inputEditor.getText();
    const editorMode = outputEditor.getMode();

    if (["tree", "form", "view"].includes(editorMode)) {
        try {
            const parsedJson = JSON.parse(jsonText);
            jsonText = JSON.stringify(parsedJson, null, 2);
        } catch (error) {
            console.error("Invalid JSON input:", error);
            return;
        }
    }

    const data = { content_formatter: jsonText };

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
                throw new Error(
                    `Network response was not ok, status: ${response.status}`
                );
            }
            return response.text();
        })
        .then((responseData) => {
            outputEditor.setMode("text");
            outputEditor.setText(responseData);
        })
        .catch((error) => {
            console.error("There was an error!", error);
        });
}

function jsonToxml_PHP(route) {
    convertJson(route, "xml");
}

function jsonToCSV_PHP(route) {
    convertJson(route, "csv");
}

function jsonToYaml_PHP(route) {
    convertJson(route, "yaml");
}
