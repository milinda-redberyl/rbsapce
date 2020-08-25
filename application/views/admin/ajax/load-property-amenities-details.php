<ul class="amenities-list">
    <?php
    if (!empty($header)) {
        foreach ($header as $val) { ?>
            <li class="list">
                <i class="fa fa-check green"></i>
                <?php echo $val['amenity_name']; ?>&nbsp;&nbsp;
                <a href="#" onclick="delete_property_amenties(<?php echo $val['amenities_detail_id'];?>)" class="red">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                </a>
            </li>
            <?php
        }
    } else { ?>
        <br>
        <div style="text-align: center;">There are no records to display</div>
        <?php
    }
    ?>
</ul>
