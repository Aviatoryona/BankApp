
<?php ?>
<div class="w3-animate-zoom">

    <table class="w3-table w3-striped w3-bordered w3-card-4">
        <thead>
            <tr class="w3-teal">
                <th>#</th>
                <th>Type</th>
                <th>Amount ($)</th>
                <th>Charge ($)</th>
                <th>Date</th>
            </tr>
        </thead>
        <?php
        foreach ($transactions as $transaction) {
            ?>
            <tr>
                <td><?= $transaction->getTr_id() ?></td>
                <td><?= $transaction->getTr_type() ?></td>
                <td><?= $transaction->getTr_amount() ?></td>
                <td><?= $transaction->getTr_charge() ?></td>
                <td><?= $transaction->getTr_date() ?></td>
            </tr>
            <?php
        }
        ?>
    </table>

</div>
