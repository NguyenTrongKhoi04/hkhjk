function download(route) {
    const e = outputEditor.getText();

    var t = outputEditor.getMode();
    if ("tree" === t || "form" === t || "view" === t) {
        var n = $.parseJSON(e);
        e = JSON.stringify(n, null, 2);
    }
    console.log(document.getElementById("typeConvert").value);
    const data = {
        content_formatter: e,
        mode_formatter: t,
        convertType: document.getElementById("typeConvert").value,
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
            return Promise.all([response.blob(), response.headers]);
        })
        .then(([blob, headers]) => {
            const url = window.URL.createObjectURL(blob);
            const contentDisposition = headers.get("Content-Disposition");
            let filename = contentDisposition
                .match(/filename="([^"]+)"/)[1]
                .replace("http://", "")
                .replace("/", "_");
            const a = document.createElement("a");
            a.style.display = "none";
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            document.body.removeChild(a);
        })
        .catch((error) => {
            toastr.error("Not Found JSON ");
        });
}
