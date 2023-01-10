<nav>
    <div class="title">
        <i><h1>DobhApp</h1></i>
        <i><h3>It's new to you!</h3></i>
    </div> <!-- title -->
    <ul id="account">
        <li><a href="<?php echo $login_path; ?>" class="link" id="login">Log In</a></li>
        <li><a href="<?php echo $signup_path; ?>" class="link" id="signup">Sign Up</a></li>
    </ul>
    <button class="link account-btn" id="account-btn">Account <i class="fa fa-caret-down" aria-hidden="true"></i></button>
</nav>
<div id="drop-down"></div>
<script>
    $("#account-btn").click(function() {
        var dropDown = $("#account");
        $("#login").removeClass("link");
        $("#signup").removeClass("link");
        $("#account").remove();
        $("#drop-down").html(dropDown);
        $("#login").addClass("menu");
        $("#signup").addClass("menu");
        $("#account").slideToggle("slow");
    })
</script>