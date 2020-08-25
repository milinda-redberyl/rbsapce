
<div class="container">

    <div class="row about-us-header au-black">
        <h1>A Bait Story</h1>
        <h2>Bringing ease and transparency to the market, connecting consumers to their perfect property</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-timeline">
                <?php foreach($s_result as $item) { ?>
                <div class="timeline">
                    <span class="timeline-icon"></span>
                    <span class="year"><?php echo $item['year']; ?></span>
                    <div class="timeline-content">
                        
                        <p class="description">
                            <?php echo $item['description']; ?>
                        </p>
                    </div>
                </div>
                <?php } ?>
              
            </div>
        </div>
    </div>
     <div class="row cus-text_1">
        <h1>Grow with us!</h1>    
    </div>
</div>