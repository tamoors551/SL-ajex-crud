<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX CRUD App</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <h2>AJAX CRUD App</h2>
    
    <!-- Form to add new data -->
    <form id="addForm">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Email">
        <button type="submit">Add</button>
    </form>
    
    <!-- Container to display existing data -->
    <div id="dataContainer"></div>
</body>
</html>
