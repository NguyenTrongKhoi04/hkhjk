let isDraggingFile = false;
let dragCounter = 0;

document.addEventListener("dragenter", function (e) {
    e.preventDefault();
    e.stopPropagation();

    if (
        e.dataTransfer &&
        e.dataTransfer.types &&
        e.dataTransfer.types.includes("Files")
    ) {
        dragCounter++;
        isDraggingFile = true;
        document.getElementById("dropMask").style.display = "flex";
    }
});

document.addEventListener("dragover", function (e) {
    e.preventDefault();
    e.stopPropagation();
});

document.addEventListener("dragleave", function (e) {
    e.preventDefault();
    e.stopPropagation();

    if (
        e.dataTransfer &&
        e.dataTransfer.types &&
        e.dataTransfer.types.includes("Files")
    ) {
        dragCounter--;

        if (dragCounter === 0) {
            isDraggingFile = false;
            document.getElementById("dropMask").style.display = "none";
        }
    }
});

document.addEventListener("drop", function (e) {
    e.preventDefault();
    e.stopPropagation();

    dragCounter = 0;
    isDraggingFile = false;

    document.getElementById("dropMask").style.display = "none";

    const file = e.dataTransfer.files[0];

    if (file && (file.name.endsWith(".txt") || file.name.endsWith(".xml"))) {
        const reader = new FileReader();
        reader.onload = function (event) {
            const content = event.target.result;

            inputEditor.setText(content);
            beautifyJSON();
            const modal = document.querySelector(".modal");
            if (modal && modal.style.display === "block") {
                modal.style.display = "none";
                const backdrop = document.querySelector(".modal-backdrop");
                if (backdrop) {
                    backdrop.remove();
                }
            }
        };
        reader.readAsText(file);
    } else {
        toastr.error("Only .txt and .xml files are allowed.");
    }
});
