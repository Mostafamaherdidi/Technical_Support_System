<div class="col-md-6 mb-4">
    <div class="card">
        <img src="uploads/<?php echo $entry["photo_path"]; ?>" class="card-img-top" alt="Photo">
        <div class="card-body">
            <h5 class="card-title"><?php echo $entry["title"]; ?></h5>
            <p class="card-text"><?php echo $entry["content"]; ?></p>
            <p class="card-text"><small class="text-muted">Category: <?php echo $entry["category"]; ?></small></p>
            <div class="d-flex justify-content-between">
                <a href="update.php?id=<?php echo $entry["id"]; ?>" class="btn btn-primary">Update</a>
                <a href="delete.php?id=<?php echo $entry["id"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</a>
            </div>
        </div>
    </div>
</div>
