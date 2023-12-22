
    <form>
        <div class="form-group">
            <label for="title">Share Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" name="link" class="form-control">
        </div>
        <input class="btn btn-primary" name="submit" type="submit" value="Submit">
        <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>posts">Cancel</a>
    </form>
