function setTypeConvertSubmit(value) {
    const hiddenInput = document.getElementById("typeConvert");
    hiddenInput.value = value;
}

function jsonToxml_PHP(route) {
    setTypeConvertSubmit("xml");
    console.log(document.getElementById("typeConvert").value);

    let e = outputEditor.getText();

    var t = outputEditor.getMode();
    if ("tree" === t || "form" === t || "view" === t) {
        var n = $.parseJSON(e);
        e = JSON.stringify(n, null, 2);
    }

    const data = {
        content_formatter: e,
    };

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
        .then((data) => {
            const formattedData = data;
            outputEditor.setText(formattedData);
        });
}
