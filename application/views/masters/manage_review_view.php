

<div class="modal fade" id="addArticleModal" tabindex="-1" role="dialog" aria-labelledby="addArticleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" name="addArticle" action="article/submit" id="addArticle">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Post Title:</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Post Description:</label>                        
                        <textarea class="form-control" rows="4" cols="50" name="description" id="description" required>

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Category:</label>
                        <select id="category" name="category" required>
                            <option value="">Select one</option>
                            <option value="1">News</option>
                            <option value="2">Tips and Advice</option>
                            <option value="3">List at Home</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Position:</label>
                        <select id="position" name="position" required>
                            <option value="">Select one</option>
                            <option value="1">Most Popular</option>
                            <option value="2">Latest Section</option>                            
                        </select>
                    </div>
                    <div class="alert alert-info" id="img_info" style="display: none;">
                        <strong>Info!</strong> Indicates a neutral informative change or action.
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Image:</label>
                        <input type="file" class="form-control" name="image_file" id="image_file">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Status:</label>
                        <select id="status" name="status" required>
                            <option value="0">Deactivate</option>
                            <option value="1">Active</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" value="" name="edit_id" id="edit_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue"><i class="menu-icon fa fa-tag"></i> Review Manager </h3>
        
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <table id="property_type_table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="min-width: 10%">ID</th>
                <th style="min-width: 30%">Property Name</th>
                <th style="min-width: 10%">Review Description</th>
                <th style="min-width: 10%">Rating</th>
                <th style="min-width: 10%">Name</th>
                <th style="min-width: 10%">Email</th>
                <th style="min-width: 10%">Published Date</th>
                <th style="min-width: 10%">Current Status</th>
                <th style="min-width: 10%">Change Status</th>

            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($extra as $value){
                    ?>
                    <tr>
                        <td class="rid" id="<?php echo $value['rating_id']?>"><?php echo $value['rating_id']?></td>
                        <td><?php echo $value['property_name']?></td>
                        <td><?php echo $value['review_description']?></td>
                        <td>
                            <?php 
                           if(4 < $value['rating_count']){ ?>
                                <img class="img-responsive"  src="<?php echo base_url('assets/system/images/5star.jpg') ?>" title="<?php echo $value['rating_count']?> star rating"/>
                          <?php } elseif (3 < $value['rating_count']) { ?>
                                <img class="img-responsive"  src="<?php echo base_url('assets/system/images/4star.jpg') ?>" title="<?php echo $value['rating_count']?> star rating"/>
                         <?php } elseif (2 < $value['rating_count']) { ?>
                                <img class="img-responsive"  src="<?php echo base_url('assets/system/images/3star.jpg') ?>" title="<?php echo $value['rating_count']?> star rating"/>
                         <?php } elseif (1 < $value['rating_count']) { ?>
                                <img class="img-responsive"  src="<?php echo base_url('assets/system/images/2star.jpg') ?>" title="<?php echo $value['rating_count']?> star rating"/>
                         <?php } else { ?> 
                         <img class="img-responsive"  src="<?php echo base_url('assets/system/images/1star.jpg') ?>" title="<?php echo $value['rating_count']?> star rating"/>    
                          <?php } ?>            
                        </td>
                        <td><?php echo $value['emp_name']?></td>
                        <td><?php echo $value['emp_email']?></td>
                        <td><?php echo $value['date']?></td>
                        <td><?php if($value['status'] == 1){ ?>
                                <span class="label label-success">Published</span>
                            <?php } else {  ?>
                                <span class="label label-danget">Block</span>
                            <?php } ?>
                        </td>          
                        <td>
                            <select id="<?php echo $value['rating_id']?>" class="my_select1" onchange="change_rv_status(this);">
                              <option id="<?php echo $value['rating_id']?>" value="">Select</option>
                              <option id="<?php echo $value['rating_id']?>" value="1">Publish</option>
                              <option id="<?php echo $value['rating_id']?>" value="0">Block</option>
                            </select>                            
                        </td>                                 
                    </tr>

                    <script>
                      
                               function change_rv_status(item)
                                {
                                    var st = item.value;
                                    var rating_id=$(item).attr('id');
                                  
                                     $.ajax({
                                        type: 'POST',
                                        dataType: 'text',
                                        url: "<?php echo site_url('article/change_rw_status'); ?>",
                                        data: {rating_id : rating_id, status:st},
                                        cache: false,
                                        success: function (data) {
                                               location.reload();
                                        }
                                    });
                                }
                       
                    </script>
                    <?php
                }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script>

    function delete_article(id) {
        $('#confirm_delete').modal('show');
        $('#del_id').val(id);
    }

    $('.btn_delete').click(function() {
        var id = $('#del_id').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('article/delete'); ?>",
            data: {id : id},
            cache: false,
            success: function (data) {

            }
        });
        location.reload();
    });

    function edit_article(id) {

        $("#image_file").removeAttr("required");

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo site_url('article/get_article_by_id'); ?>",
            data: {id : id},
            cache: false,
            success: function (data) {
                $.each(data, function (index, value) {

                    $('#addArticleModal').modal('show');

                    $("#edit_id").val(value.article_id);
                    $("#title").val(value.article_title);
                    $("#description").val(value.article_des);
                    $("#position").val(value.position);
                    $("#category").val(value.article_category);
                    $("#status").val(value.status);
                });
            }
        });
        //location.reload();
    }

</script>

