
<!--<div class="container">
  <div class="row" style="margin-top: 35px;">
      <div class="col-xs-12 col-md-8">
          <div class="row">

            <div class="col-md-6">
              <div class="view overlay posts">
              <img class="img-responsive img-fx" src="<?php echo base_url() ?>uploads/blog/blog-dummy.jpg" alt="Card image cap">
                <div class="card-body">
                  <h2 class="card-title">Post Title</h2>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                </div>   
                 <div class="mask flex-center rgba-red-strong">
                         <a href="#" class="btn btn-read-more">Read More →</a>
                 </div>
              </div>             
            </div>

            <div class="col-md-6">
              <div class="view overlay posts">
              <img class="img-responsive img-fx" src="<?php echo base_url() ?>uploads/blog/blog-dummy.jpg" alt="Card image cap">
                <div class="card-body">
                  <h2 class="card-title">Post Title</h2>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                </div>   
                 <div class="mask flex-center rgba-red-strong">
                         <a href="#" class="btn btn-read-more">Read More →</a>
                 </div>
              </div>             
            </div>

            <div class="col-md-6">
              <div class="view overlay posts">
              <img class="img-responsive img-fx" src="<?php echo base_url() ?>uploads/blog/blog-dummy.jpg" alt="Card image cap">
                <div class="card-body">
                  <h2 class="card-title">Post Title</h2>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                </div>   
                 <div class="mask flex-center rgba-red-strong">
                         <a href="#" class="btn btn-read-more">Read More →</a>
                 </div>
              </div>             
            </div>

            <div class="col-md-6">
              <div class="view overlay posts">
              <img class="img-responsive img-fx" src="<?php echo base_url() ?>uploads/blog/blog-dummy.jpg" alt="Card image cap">
                <div class="card-body">
                  <h2 class="card-title">Post Title</h2>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                </div>   
                 <div class="mask flex-center rgba-red-strong">
                         <a href="#" class="btn btn-read-more">Read More →</a>
                 </div>
              </div>             
            </div>


          </div>
      </div>
  </div>

</div>-->


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="filtermenu">
        <li id="sec_all" data-filter="all">HOME</li>
        <li id="sec_1" data-filter="1">NEWS</li>
        <li id="sec_3" data-filter="3">LIFT AT HOME</li>
        <li id="sec_4" data-filter="4">RESEARCH</li>
        <li id="sec_2" data-filter="2">TIPS & ADVICE</li>
      </ul>
    </div>

<div class="row">
  <div class="col-md-8">

<!-- post -->
     <?php foreach ($all_posts as $key => $listval) { ?>

      <div class="post <?php echo $listval['article_category']; ?>">
            <div class="col-md-6">
              <div class="view overlay posts">
                    <?php if(!empty($listval['article_img'])) { ?>
                          <img src="<?php echo base_url().$listval['article_img'] ?>" alt="Posts" class="img-responsive img-fx">
                    <?php } else { ?>
                          <img src="<?php echo base_url() ?>uploads/blog/blog-dummy.jpg" alt="Posts" class="img-responsive img-fx">
                    <?php } ?>
                <div class="card-body">
                  <h2 class="card-title"><?php echo $listval['article_title']; ?></h2>
                  <p class="card-text">
                      <?php
                         $string = strip_tags($listval['article_des']);

                                            if (strlen($string) > 100) {

                                                // truncate string
                                                $stringCut = substr($string, 0, 100);

                                                // make sure it ends in a word so assassinate doesn't become ass...
                                                $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '... <a href="' . site_url('blog_view/'.$listval['article_id']) . '">Read More</a>';
                          }
                          echo $string;
                      ?>
                  </p>
                </div>
                 <div class="mask flex-center rgba-red-strong">
                         <a href="<?php echo site_url('blog_view/'.$listval['article_id']) ?>" class="btn btn-read-more">Read More →</a>
                 </div>
              </div>
            </div>
      </div>

      <?php } ?>
<!-- post -->

</div>

 <div class="col-md-4">
    <div class="row">
      <div class="col-md-12 sidebar">
          <h4><span>MOST POPULAR POSTS</span></h4>
          <?php foreach ($most_popular_posts as $key => $value) { ?>
             <div class="push-down-15">
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <?php if(!empty($value['article_img'])) { ?>
                          <img src="<?php echo base_url().$value['article_img'] ?>" alt="Posts" class="img-responsive blog-small-thumb">
                    <?php } else { ?>
                          <img src="<?php echo base_url() ?>uploads/blog/blog-dummy.jpg" alt="Posts" class="img-responsive blog-small-thumb">
                    <?php } ?>

                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <h5>
                    <a href="<?php echo site_url('blog_view/'.$value['article_id']) ?>"><?php echo $value['article_title']; ?></a>
                    </h5>
                    <span class="widget-posts__time"><?php echo $value['updated_time']; ?></span>
                  </div>
              </div>
            </div>
         <?php } ?>

      </div>
    </div>

    <div class="row pad-top15">
      <div class="col-md-12 sidebar pd-b-25">
          <h4><span>LATEST POSTS</span></h4>

          <?php foreach ($latest_posts as $key => $value2) { ?>
             <div class="push-down-15">
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4">
                    <?php if(!empty($value2['article_img'])) { ?>
                          <img src="<?php echo base_url().$value2['article_img'] ?>" alt="Posts" class="img-responsive blog-small-thumb">
                    <?php } else { ?>
                          <img src="<?php echo base_url() ?>uploads/blog/blog-dummy.jpg" alt="Posts" class="img-responsive blog-small-thumb">
                    <?php } ?>

                  </div>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <h5>
                    <a href="<?php echo site_url('blog_view/'.$value2['article_id']) ?>"><?php echo $value2['article_title']; ?></a>
                    </h5>
                    <span class="widget-posts__time"><?php echo $value2['updated_time']; ?></span>
                  </div>
              </div>
            </div>
         <?php } ?>

      </div>
    </div>
</div>

</div>
</div>
</div>



<script type="text/javascript">

    $("document").ready(function() {
        var url = $(location).attr('href');
        var menu_item = url.split('sec=').reverse()[0];

        $("#sec_" + menu_item).trigger('click');
    });



class FilterGallery {

  constructor(){
    this.$filtermenuList = $('.filtermenu li');
    this.$container      = $('.container');

    this.updateMenu('all');
    this.$filtermenuList.on('click', $.proxy(this.onClickFilterMenu, this));
  }

  onClickFilterMenu(event){
    const $target      = $(event.target);
    const targetFilter = $target.data('filter');

    this.updateMenu(targetFilter);
    this.updateGallery(targetFilter);
  }

  updateMenu(targetFilter){
    this.$filtermenuList.removeClass('active');
    this.$filtermenuList.each((index, element)=>{
      const targetData = $(element).data('filter');

      if(targetData === targetFilter){
        $(element).addClass('active');
      }
    })
  }

  updateGallery(targetFilter){

    if(targetFilter === 'all'){
      this.$container.fadeOut(300, ()=>{
        $('.post').show();
        this.$container.fadeIn();
      });
    }else {
      this.$container.find('.post').each((index, element)=>{
        this.$container.fadeOut(300, ()=>{
          if($(element).hasClass(targetFilter)) {
            $(element).show();
          }else {
            $(element).hide();
          }
          this.$container.fadeIn();
        })
      });
    }
  }
}

const fliterGallery = new FilterGallery();

</script>