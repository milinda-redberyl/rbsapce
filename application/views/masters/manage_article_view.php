<?php
/**
 * Created by PhpStorm.
 * User: Madura
 * Date: 3/13/2018
 * Time: 4:32 AM
 */
?>

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
                       <!-- <textarea class="form-control" rows="4" cols="50" name="description" id="description" required>

                        </textarea>-->

                        <textarea  class="form-control" name="description" id="description" rows="4" cols="50"></textarea>
                        <script>
                            CKEDITOR.replace( 'description' );
                        </script>

                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Category:</label>
                        <select id="category" name="category" required>
                            <option value="">Select one</option>
                            <option value="1">News</option>
                            <option value="2">Tips and Advice</option>
                            <option value="3">Lift at Home</option>
                            <option value="4">Research</option>
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
        <h3 class="header smaller lighter blue"><i class="menu-icon fa fa-tag"></i> Article Manager </h3>
        <div class="row" style="margin-top: 5px">
            <div class="col-xs-12">
                <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#addArticleModal">Add Article</button>
            </div>
        </div>
        <div class="clearfix">
            <div class="pull-right tableTools-container"></div>
        </div>
        <table id="property_type_table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="min-width: 25%">Title</th>
                <th style="min-width: 40%">Description</th>
                <th style="min-width: 10%">Post Image</th>
                <th style="min-width: 10%">Post Status</th>
                <th style="min-width: 15%">Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($extra as $value){
                    ?>
                    <tr>
                        <td><?php echo $value['article_title']?></td>
                        <td style="width: 50%;"><?php echo $value['article_des']?></td>
                        <td width="15%">
                            <?php if(empty($value['article_img'])){ ?>
                                <img class="img-responsive"  src="<?php echo base_url('uploads/blog/blog-dummy.jpg') ?>"/>
                           <?php } else { ?>
                                <img class="img-responsive"  src="<?php echo base_url($value['article_img']) ?>"/>
                            <?php  } ?>
                              
                        </td>
                        <td>
                            <?php
                                if($value['status'] == 1){
                                    echo '<span class="label label-success">Active</span>';
                                } else if($value['status'] == 0) {
                                    echo '<span class="label label-default">Inactive</span>';
                                }
                            ?>
                        </td>
                        
                        <td>
                            <a href="javascript:;" onclick="edit_article(<?php echo $value['article_id']?>)"><i class="ace-icon fa fa-pencil bigger-130"></i></a> |
                            <a href="javascript:;" onclick="delete_article(<?php echo $value['article_id']?>)" class="red"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="confirm_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Delete Advertisement</h5>
            </div>
            <div class="modal-body">
                Are you sure delete this article?
            </div>
            <input type="hidden" value="" id="del_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <a class="btn btn-danger btn_delete">Yes</a>
            </div>
        </div>
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
                   // $("#description").val(value.article_des);
                    CKEDITOR.instances['description'].setData(value.article_des)
                    $("#position").val(value.position);
                    $("#category").val(value.article_category);
                    $("#status").val(value.status);
                });
            }
        });
        //location.reload();
    }

</script>
