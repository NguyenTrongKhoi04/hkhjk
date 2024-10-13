    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Bảng Thông Tin</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f8f8;
                margin: 0;
                padding: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .table-container {
                background-color: #fff;
                padding: 15px;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                width: 80%;
                max-width: 80%;
            }

            h2 {
                text-align: center;
                margin-bottom: 15px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                /* Prevents double borders */
            }

            th,
            td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #f5f5f5;
            }

            /* Styling for description */
            .description {
                cursor: pointer;
                /* Shows that it is clickable */
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
                max-width: 300px;
                /* Adjust width as needed */
            }

            .expanded {
                white-space: normal;
                /* Allow normal wrapping when expanded */
                max-width: none;
                /* Remove max-width when expanded */
            }

            /* Remove underline from links */
            a {
                text-decoration: none;
                color: blue;
                /* Change color to blue */
            }

            a:hover {
                text-decoration: underline;
                /* Optional: Add underline on hover */
            }
        </style>
    </head>

    <body>
        <div class="table-container">
            <h2>Table #2</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Link</th>
                        <th>DateSave</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1392</td>
                        <td>James Yates</td>
                        <td onclick="toggleDescription(this)" class="description"
                            data-full="Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quia voluptates, ullam nostrum quibusdam vitae tempore nemo asperiores tenetur est suscipit, minus neque cupiditate, laboriosam architecto consequatur quasi debitis! Omnis nobis facere expedita ea, mollitia optio harum et iste, eveniet quis at id totam. Minus fugit magnam rerum est unde aut cupiditate ratione qui non beatae culpa, laborum deleniti vitae repellendus amet. Esse ipsam alias perferendis placeat, vel doloribus, architecto sint itaque mollitia facere modi nesciunt at hic saepe soluta magnam culpa quae, incidunt sunt et tempora? Optio, earum ratione quis quibusdam cum dignissimos ad dolorem quos dolores. Corrupti, temporibus.">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita...
                        </td>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>11-24-1201</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>1393</td>
                        <td>Jane Doe</td>
                        <td onclick="toggleDescription(this)" class="description"
                            data-full="Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quia reiciendis, dolorem obcaecati, consectetur fugit porro veniam repellat, possimus dignissimos dolor expedita laborum maxime. Error et eveniet velit reiciendis sint!">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta...
                        </td>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>11-24-1201</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            function toggleDescription(cell) {
                // Get the full text from the data-full attribute
                const fullText = cell.getAttribute("data-full");
                const isExpanded = cell.classList.toggle('expanded');

                // Update the text based on the expanded state
                cell.innerText = isExpanded ? fullText : fullText.substring(0, fullText.length - 3) +
                    "..."; // Show truncated text
            }
        </script>
    </body>

    </html>
