<div class="wrap">
    <form action="post" id="tj-ur-form">
        <div class="form-group">
            <label for="tj-user-name">Username</label>
            <input type="text" name="tj-user-name" id="tj-user-name">
        </div>
        <div class="form-group">
            <label for="tj-email">Email</label>
            <input type="email" name="tj-email" id="tj-email">
        </div>
        <div class="form-group">
            <label for="tj-password">Password</label>
            <input type="password" name="tj-password" id="tj-password">
        </div>
        <div class="form-group">
            <button type="submit" id="tj-submit">Register</button>
        </div>
    </form>
</div>
<script>
    var ajaxUrl = "<?= admin_url('admin-ajax.php') ?>";
</script>