
<?php ?>
<div class="w3-animate-zoom">
    <div class="w3-container w3-teal">
        <h3>Deposit</h3>
    </div>

    <form class="w3-container" onsubmit="return false">

        <p>
            <label>Amount</label>
            <input class="w3-input" name="amt" type="number" min="5" max="1000000" placeholder="Enter Amount" required>
        </p>

        <p id="msgbox"></p>

        <p>
            <button class="w3-btn w3-teal" type="text" onclick="deposit()">Submit</button>
        </p>
    </form>
</div>
