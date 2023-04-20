<?php
require_once("../includes/public_require.php"); 
$current_page = "settings";
include("../includes/layouts/public_header.php"); 
include("../includes/api/privacy.php"); 
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h1 class="text-center mb-4">Edit Privacy : Visibility</h1>
            <?php echo message(); ?>
            <form role="form" action="edit_privacy.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Birthday :</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="birthday_privacy" value="1"
                            <?php if ($user["birthday_privacy"]=='1') echo 'checked'; ?>>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="birthday_privacy" value="0"
                            <?php if ($user["birthday_privacy"]=='0') echo 'checked'; ?>>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone Number :</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="phone_privacy" value="1"
                            <?php if ($user["phone_privacy"]=='1') echo 'checked'; ?>>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="phone_privacy" value="0"
                            <?php if ($user["phone_privacy"]=='0') echo 'checked'; ?>>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">E-Mail :</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="email_privacy" value="1"
                            <?php if ($user["email_privacy"]=='1') echo 'checked'; ?>>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="email_privacy" value="0"
                            <?php if ($user["email_privacy"]=='0') echo 'checked'; ?>>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Emergency Contact :</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="emergency_privacy" value="1"
                            <?php if ($user["emergency_privacy"]=='1') echo 'checked'; ?>>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="emergency_privacy" value="0"
                            <?php if ($user["emergency_privacy"]=='0') echo 'checked'; ?>>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">About Me:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="about_privacy" value="1"
                            <?php if ($user["about_privacy"]=='1') echo 'checked'; ?>>
                        <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="about_privacy" value="0"
                            <?php if ($user["about_privacy"]=='0') echo 'checked'; ?>>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
                <input type="hidden" name="prev_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <div class="text-center">
                    <button class="btn btn-primary" type="submit" name="submit">EDIT</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include("../includes/layouts/public_footer.php"); ?>