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

/**
 * =============================================================================
 *
 * =============================================================================
 */
// Biến để theo dõi trạng thái kéo tệp
let isDraggingFile = false;
let dragCounter = 0; // Đếm số lượng phần tử bị kéo vào

// Sự kiện khi bắt đầu kéo tệp vào browser
document.addEventListener("dragenter", function (e) {
    e.preventDefault();
    e.stopPropagation();

    // Chỉ tăng dragCounter và hiển thị mask nếu là tệp (file)
    if (
        e.dataTransfer &&
        e.dataTransfer.types &&
        e.dataTransfer.types.includes("Files")
    ) {
        dragCounter++;
        isDraggingFile = true;
        document.getElementById("dropMask").style.display = "flex"; // Hiển thị mask
    }
});

// Sự kiện khi tệp di chuyển bên trong vùng browser
document.addEventListener("dragover", function (e) {
    e.preventDefault();
    e.stopPropagation();
});

// Sự kiện khi kéo tệp ra khỏi browser
document.addEventListener("dragleave", function (e) {
    e.preventDefault();
    e.stopPropagation();

    // Giảm dragCounter khi rời khỏi vùng kéo
    if (
        e.dataTransfer &&
        e.dataTransfer.types &&
        e.dataTransfer.types.includes("Files")
    ) {
        dragCounter--;

        // Khi toàn bộ các phần tử bị kéo ra khỏi vùng browser
        if (dragCounter === 0) {
            isDraggingFile = false;
            document.getElementById("dropMask").style.display = "none"; // Ẩn mask
        }
    }
});

// Sự kiện khi tệp được thả vào browser
document.addEventListener("drop", function (e) {
    e.preventDefault();
    e.stopPropagation();

    // Reset lại trạng thái kéo
    dragCounter = 0;
    isDraggingFile = false;

    // Ẩn mask sau khi thả tệp
    document.getElementById("dropMask").style.display = "none";

    const file = e.dataTransfer.files[0];

    // Chỉ xử lý file .txt hoặc .xml
    if (file && (file.name.endsWith(".txt") || file.name.endsWith(".xml"))) {
        const reader = new FileReader();
        reader.onload = function (event) {
            const content = event.target.result;

            // Gán nội dung file vào inputEditor
            inputEditor.setText(content);
            beautifyJSON();
            // Đóng modal nếu đang mở
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
