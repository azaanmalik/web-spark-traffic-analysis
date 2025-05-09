<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include('header.php'); ?>

    <div class="container mt-5">
        <h2>Add Your Website</h2>
        <form id="addSiteForm" method="POST" action="add_website_action.php">
            <div class="mb-3">
                <label class="form-label">Website Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter website name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Website URL</label>
                <input type="url" name="url" class="form-control" placeholder="https://example.com" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Enter website description"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Add Website</button>
        </form>
    </div>

    <?php include('footer.php'); ?>

    <script>
    $('#addSiteForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'add_website_action.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Log the raw response to debug issues
                console.log("Raw response:", response);

                try {
                    const data = typeof response === 'object' ? response : JSON.parse(response);

                    Swal.fire({
                        icon: data.status === 'success' ? 'success' : 'error',
                        title: data.message
                    }).then(() => {
                        if (data.status === 'success') {
                            window.location.reload();
                        }
                    });
                } catch (e) {
                    console.error("JSON parse error:", e);
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid server response'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", status, error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong. Please try again later.'
                });
            }
        });
    });
</script>

</body>
</html>
