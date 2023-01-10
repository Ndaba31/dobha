<main>
    <h2>create account</h2>
    <div class="content">
        <div class="logo">
            <img src="../public/Dhobapp.jpeg" alt="Dobhapp Logo" width="100%" height="100%">
        </div>
        <form class="account-form">
            <fieldset>
                <legend>Personal Details</legend>
                <div class="input">
                    <input type="text" placeholder="First Name" name="first_name" id="firstName"><span>*</span>
                </div>
                <div class="input">
                    <input type="text" placeholder="Last Name" name="last_name" id="lastName"><span>*</span>
                </div>
                <div class="input">
                    <select name="sex" id="sex">
                        <option value="F">Female</option>
                        <option value="M">Male</option>
                    </select>
                    <span>*</span>
                </div>         
                <div class="input">
                    <input type="date" placeholder="Date of Birth" name="birth_date" id="birthDate"><label for="birthDate" style="display: flex; align-items: center;">D.O.B<span>*</span></label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Contact Details</legend>            
                <div class="input">
                    <input type="number" placeholder="Phone Number" name="phone" id="phone" min="0"><span>*</span>
                </div>           
                <div class="input">
                    <input type="email" placeholder="Email" name="email" id="email">
                </div>
            </fieldset>
            <fieldset>
                <legend>Account Access</legend>            
                <div class="input">
                    <input type="password" placeholder="Password" name="password" id="password"><span>*</span>
                </div>
                <div class="input">
                    <input type="password" placeholder="Repeat Password" name="password" id="password"><span>*</span>
                </div>
                <ul>
                    <li>Password must be a minimum of 8 characters</li>
                    <li>Password must contain at least one symbol e.g. $, #, *, !</li> 
                    <li>Password must contain at least one uppercase letter </li>                   
                </ul>
                <ul>
                    <li>Password must contain at least one lowercase letter</li>
                    <li>Password must contain at least one number</li>
                </ul>
            </fieldset>
            <button id="signup" class="link account-btn" style="padding: 10px;">Create Account</button>
        </form>
    </div>
</main>