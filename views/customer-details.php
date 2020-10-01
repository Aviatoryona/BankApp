
<div class="w3-animate-zoom">
    <form action="javascript:void(0)" class="w3-container w3-card-4 w3-white w3-text-black w3-margin" onsubmit="return false">
        <div class="w3-row w3-section">
            <div class="w3-half">
                <input class="w3-input w3-border" id="fname" type="text" value="<?= $customer->getCt_fname() ?>" placeholder="First Name">
            </div>
            <div class="w3-half">
                <input class="w3-input w3-border" id="lname" type="text" value="<?= $customer->getCt_lname() ?>" placeholder="Last Name">
            </div>
        </div>
        <div class="w3-row w3-section">
            <div class="w3-rest">
                <input class="w3-input w3-border" id="email" value="<?= $customer->getCt_email() ?>" readonly>
            </div>
        </div>
        <div class="w3-row w3-section">
            <div class="w3-rest">
                <input class="w3-input w3-border" id="phone" value="<?= $customer->getCt_phone() ?>">
            </div>
        </div>
        <div class="w3-row w3-section">
            <div class="w3-half">
                <input class="w3-input w3-border" value="<?= $customer->getCt_city() ?>" readonly>
            </div>
            <div class="w3-half">
                <input class="w3-input w3-border" value="<?= $customer->getCt_country() ?>" readonly>
            </div>
        </div>
        <div class="w3-row w3-section">
            <div class="w3-half">
                <input class="w3-input w3-border" value="<?= $customer->getCt_gender() ?>" readonly>
            </div>
            <div class="w3-half">
                <input class="w3-input w3-border" value="<?= $customer->getCt_address() ?>" readonly>
            </div>
        </div>
        <div class="w3-row w3-section">
            <div class="w3-half">
                <input class="w3-input w3-border" value="<?= $customer->getCt_accounttype() ?>" readonly>
            </div>
            <div class="w3-half">
                <input class="w3-input w3-border" value="<?= $customer->getCt_accountnumber() ?>" readonly>
            </div>
        </div>
        <div class="w3-row w3-section">
            <p id="msgbox"></p>
        </div>
        <div class="w3-row w3-section">
            <div class="w3-half"><p></p></div>
            <div class="w3-half">
                <button class="w3-btn w3-amber" onclick="admin.clientEdit()">Save</button>
                <button class="w3-btn w3-red w3-margin-left" onclick="admin.clientRemove()">Delete</button>
            </div>
        </div>
    </form>
</div>
