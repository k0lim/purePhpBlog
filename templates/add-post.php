<?include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>
    <div class="container p-5">
        <h4 class="text-center mb-5 mt-2">Create a post</h4>
        <form class="w-50 m-auto" action="../src/handlers/post/add.php" method="post">
            <div class="mb-3">
                <label for="postTitle" class="form-label">Title</label>
                <input type="text" name="postTitle" class="form-control" id="postTitle">
            </div>
            <div class="mb-3">
                <label for="postAuthor" class="form-label">Author</label>
                <input type="text" name="postAuthor" class="form-control" id="postAuthor">
            </div>
            <div class="mb-3">
                <label for="postPreview" class="form-label">Preview</label>
                <textarea id="postPreview" name="postPreview" cols="10" rows="1"class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="postDetail" class="form-label">Detail Text</label>
                <textarea id="postDetail" name="postDetail" cols="30" rows="5"class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add post</button>
        </form>
    </div>
<?include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>