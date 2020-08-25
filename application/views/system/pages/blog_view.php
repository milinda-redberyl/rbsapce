<div class="container">
  <div class="row">
    <div class="col-md-12">   
      <ul class="filtermenu">
        <li class="menu-set" id="sec_all" data-filter="home"><a href="<?php echo site_url('home_controller/blog?sec=all') ?>">HOME</a></li>
        <li class="menu-set" id="sec_1" data-filter="news"><a href="<?php echo site_url('home_controller/blog?sec=1') ?>">NEWS</a></li>
        <li class="menu-set" id="sec_3" data-filter="lift_at"><a href="<?php echo site_url('home_controller/blog?sec=3') ?>">LIFT AT HOME</a></li>
        <li class="menu-set" id="sec_4" data-filter="research"><a href="<?php echo site_url('home_controller/blog?sec=4') ?>">RESEARCH</a></li>
        <li class="menu-set" id="sec_2" data-filter="tips"><a href="<?php echo site_url('home_controller/blog?sec=2') ?>">TIPS & ADVICE</a></li>
      </ul>
    </div>

<div class="row">
  <div class="col-md-8">
  <!-- post -->
  <div class="row">
    <div class="col-md-12">
      <div class="view-article-set">
        <h1 class="entry-title"><?php echo $get_post[0]['article_title']; ?></h1>
        <p class="post-date">This article was published on <?php echo $get_post[0]['updated_time']; ?></p>
      <?php $img_post = $get_post[0]['article_img']; ?>
        <div class="row">
          <div class="col-md-12 post-img">        
             <?php if(!empty($img_post)) { ?>
                          <img src="<?php echo base_url().$img_post  ?>" alt="Posts" class="img-responsive">
                    <?php } else { ?>
                          <img src="<?php echo base_url() ?>uploads/blog/blog-dummy.jpg" alt="Posts" class="img-responsive">
                    <?php } ?>
          </div>
           <div class="col-md-12 post-content">
            
            <p class="post-desc">
              <?php echo $get_post[0]['article_des']; ?>
            </p>

          </div>
        </div>
      </div>  
    </div>  
  </div>
  <!-- /post -->
 
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


<?php
print_r($get_post[0]['article_category']);
?>

<script type="text/javascript">

    $("document").ready(function() {
        var menu_item = '<?php echo $get_post[0]['article_category'];?>';
        //$("#sec_" + menu_item).trigger('click');
        $("#sec_" + menu_item).addClass('active');
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