
<?php ?>
<div class="w3-animate-zoom">

    <table class="w3-table w3-striped w3-bordered w3-card-4">
        <thead>
            <tr class="w3-teal">
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>City</th>
                <th>Country</th>
                <th>Gender</th>
            </tr>
        </thead>
        <?php
        foreach ($customers as $customer) {
            ?>
            <tr>
                <td><?= $customer->getCt_fname() . ' ' . $customer->getCt_lname() ?></td>
                <td><a href="javascript:void(0)" onclick="admin.clientDetails(this)"><?= $customer->getCt_email() ?></a></td>
                <td><?= $customer->getCt_phone() ?></td>
                <td><?= $customer->getCt_address() ?></td>
                <td><?= $customer->getCt_city() ?></td>
                <td><?= $customer->getCt_country() ?></td>
                <td><?= $customer->getCt_gender() ?></td>
            </tr>
            <?php
        }
        ?>
    </table>

</div>
