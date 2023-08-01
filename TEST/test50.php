<!DOCTYPE html>
<html>
<head>
    <title>Specialization Details</title>
    <style>
        /* Your attractive styles here */
    </style>
</head>
<body>
    <h1>Specialization Details</h1>
    <div id="details-container">
        <p>Loading...</p>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const urlParams = new URLSearchParams(window.location.search);
            const specialization = urlParams.get("specialization");
            const detailsContainer = document.getElementById("details-container");

            // Replace the following with actual details for each specialization
            const details = {
                "Cardiology": "Cardiology is the study of the heart and cardiovascular system...",
                "Neurology": "Neurology focuses on the diagnosis and treatment of disorders...",
                "Oncology": "Oncology deals with the diagnosis and treatment of cancer...",
                // Add other specializations and details here
            };

            if (details[specialization]) {
                detailsContainer.innerHTML = `<p>${details[specialization]}</p>`;
            } else {
                detailsContainer.innerHTML = "<p>Details not found.</p>";
            }
        });
    </script>
</body>
</html>
