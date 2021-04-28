<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">SignUp for an iDiscuss account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./partials/_handleSignup.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Username</label>
                        <input type="text" class="form-control" name="signupEmail" id="signupEmail" aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label">Password</label>
                        <input type="password" name="signupPassword" class="form-control" id="signupPassword">
                    </div>
                    <div class="mb-3">
                        <label for="signupCpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="signupCpassword" id="signupCpassword">
                    </div>
                    <button type="submit" class="btn btn-primary">SignUp</button>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>