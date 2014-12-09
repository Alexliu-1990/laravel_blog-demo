<div id="loginFormdiv">
<form action="{{URL::to('/login')}}" method="post" id="ajaxLoginForm">
<div class="row">
    <div class="large-6 columns">
        <div class="row collapse">
            <div class="large-3 columns">
                <span class="prefix">Email:</span>
            </div>
            <div class="large-9 columns">
                <input type="text" placeholder="Your email address" name="email" id="loginEmail">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="large-6 columns">
        <div class="row collapse">
            <div class="large-3 columns">
                <span class="prefix">Password:</span>
            </div>
            <div class="large-9 columns">
                <input type="password" placeholder="Your password" name="password" id="loginPassword">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-6 columns">
        <div class="row collapse">
            <input type="submit" value="submit" class="button expand radius" id="ajaxLoginSubmit">
        </div>
    </div>
</div>
</form>
</div>
