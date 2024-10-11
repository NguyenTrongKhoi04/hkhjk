const button = document.getElementById("path");
button.onclick = null;

function callDataUrl() {
    const url_api = document.querySelector("#path").value.trim(); // Bỏ khoảng trắng thừa
    if (url_api) {
        if (isValidURL(url_api)) {
            console.log("Valid URL:", url_api); // In ra URL hợp lệ
            fetch(url_api)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.text();
                })
                .then((data) => {
                    console.log("Fetched data:", typeof data, data); // In ra kiểu dữ liệu và dữ liệu
                    inputEditor.setText(data); // Giả sử inputEditor đã được định nghĩa
                    beautifyJSON(); // Giả sử beautifyJSON đã được định nghĩa
                    removeModal(); // Giả sử removeModal đã được định nghĩa
                })
                .catch((error) => {
                    console.error("Error fetching data:", error); // Bắt lỗi fetch
                    toastr.error("Failed to fetch data: " + error.message);
                });
        } else {
            toastr.error("Please enter a valid URL");
        }
    } else {
        toastr.error("Empty URL");
    }
}
