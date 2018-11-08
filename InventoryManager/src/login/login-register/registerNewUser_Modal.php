<!-- Modal of registration that can appear on the login page -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:blue" id="exampleModalCenterTitle">REGISTRATION DEMAND</h5>
                <button type="button" class="close" onclick="myFunction()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="login-register/uploaduser.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mx-auto">


                        <p> First Name :
                            <input type="text" name="firstname" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </p>

                        <p> Last name :
                            <input type="text" name="lastname" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </p>

                        <div class="form-group">
                            <label for="sex">Sex :</label>
                            <select class="form-control" name="sex" id="sex">
                                <option value="m" selected>male</option>
                                <option value="f">female</option>
                                <option value="o">other</option>
                            </select>
                        </div>

                        <p> Age :
                            <input type="text" name="age" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </p>

                        <p> User name :
                            <input type="text" name="newusername" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </p>
                        <p> Password :
                            <input type="password" placeholder="Choose a password" name="psw" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </p>

                        <p> Repeat Password :
                            <input type="password" placeholder="Repeat password" name="repeatedpsw" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </p>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">REGISTER</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

