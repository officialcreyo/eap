    <!-- Copy from here -->
    <div class="section_wrapper mcb-section-inner"><div class="wrap mcb-wrap one  valign-top clearfix" style=""><div class="mcb-wrap-inner"><div class="column mcb-column one-fourth column_placeholder"><div class="placeholder">&nbsp;</div></div><div class="column mcb-column one-second column_accordion ">
        <div class="accordion">
            <div class="mfn-acc accordion_wrapper ">
                <?php
                
                $conn = new mysqli("insert_here", "insert_here", "insert_here", "insert_here");
                
                $sql = "SELECT * FROM press_releases WHERE deleted='0' ORDER BY date DESC LIMIT 6";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) 
                {
    
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        $excerp = utf8_encode($row['excerp']);
                        $title = utf8_encode($row['title']);
                        ?>
                        <div class="question">
                            <div class="title" style="font-size: 16px;">
                                <i class="icon-plus acc-icon-plus"></i>
                                <i class="icon-minus acc-icon-minus"></i>
                                <b style="font-size: 14"><?php echo $row['author']; ?></b> at <?php echo $row['date']; ?> | <?php echo $title; ?>
                            </div>
                            <div class="answer" style="font-size: 14px;"><p><?php echo $excerp; ?> [...]</p>
                                <a href="<?php echo $row['url']; ?>" target="_blank">→ More</a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "No press releases";
                }
                ?>
            </div>
        </div>
    </div></div></div></div>
    <!-- Copy to here -->