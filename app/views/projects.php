<!DOCTYPE html>
<html>

<head>
    <title>Project Management</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .project-container {
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 20px;
    }

    .project-container img {
        max-width: 100%;
        height: auto;
    }
    </style>
</head>

<body>
    <h1>My Projects</h1>

    <form method="post" enctype="multipart/form-data">
        <div class="project-container">
            <h2>Add a New Project</h2>
            <label for="project-title">Project Title:</label>
            <input type="text" id="project-title" name="project-title" required>

            <label for="project-image">Project Image:</label>
            <input type="file" id="project-image" name="project-image" required>

            <label for="project-description">Project Description:</label>
            <textarea id="project-description" name="project-description" rows="5" required></textarea>

            <button type="submit" name="add-project">Add Project</button>
        </div>
    </form>

    <?php
    // Check if the form was submitted
    if (isset($_POST['add-project'])) {
        // Get the form data
        $project_title = $_POST['project-title'];
        $project_description = $_POST['project-description'];

        // Handle the image upload
        $project_image = $_FILES['project-image'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($project_image['name']);
        if (move_uploaded_file($project_image['tmp_name'], $target_file)) {
            // Save the project data to a file or database
            $project_data = [
                'title' => $project_title,
                'image' => $target_file,
                'description' => $project_description
            ];
            file_put_contents('projects.json', json_encode($project_data, JSON_PRETTY_PRINT), FILE_APPEND);
            echo "<div class='project-container'>";
            echo "<h2>$project_title</h2>";
            echo "<img src='$target_file' alt='$project_title'>";
            echo "<p>$project_description</p>";
            echo "</div>";
        } else {
            echo "There was an error uploading your image.";
        }
    }

    // Load and display existing projects
    if (file_exists('projects.json')) {
        $projects = json_decode(file_get_contents('projects.json'), true);
        foreach ($projects as $project) {
            echo "<div class='project-container'>";
            echo "<h2>{$project['title']}</h2>";
            echo "<img src='{$project['image']}' alt='{$project['title']}'>";
            echo "<p>{$project['description']}</p>";
            echo "</div>";
        }
    }
    ?>
</body>

</html>