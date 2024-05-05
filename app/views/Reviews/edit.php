<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Review</title>
</head>
<body>
    <h1>Edit Review</h1>
    <form action="/Reviews/update/<?= $data['review']['reviewID'] ?>" method="POST">
        <label for="rating">Rating:</label><br>
        <input type="number" id="rating" name="rating" value="<?= $data['review']['rating'] ?>" required min="1" max="5"><br>
        <label for="text">Review Text:</label><br>
        <textarea id="text" name="text" required><?= $data['review']['text'] ?></textarea><br>
        <button type="submit">Update Review</button>
    </form>
</body>
</html>
