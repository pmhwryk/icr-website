<link href="<? echo STATIC_FRONT_CSS ?>fajira2.css" rel="stylesheet">

<div id="content" class="site-content">
  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <div class="container section-block">
        <!-- blogpost start -->
        <article class="blogpost full section-block">
          <header>
            <div class="post-info mb-4">
              <?php if (isset($details['title']) && !empty($details['title'])) { ?>
                <h1 class="primary-heading"><?= $details['title']; ?></h1>
              <?php } ?>
              <?php if (isset($details['blog_date']) && !empty($details['blog_date'])) { ?>
                <span class="day"><i class="fa fa-calendar-o pr-1"> </i> <?= $details['blog_date']; ?></span>
              <?php } ?>
              <!-- <span class="post-date">
                    <i class="fa fa-calendar-o pr-1"></i>
                    <span class="day"><?= (isset($details['create_date']) && !empty($details['create_date']) ? $details['create_date'] : '') ?></span>
                  </span>
                  <span class="submitted"><i class="fa fa-user pr-1 pl-1"></i> by <a href="#"><?= (isset($details['by_whom']) && !empty($details['by_whom']) ? $details['by_whom'] : '') ?></a></span>  -->
            </div>
          </header>
          <div class="blogpost-content">
            <div id="carousel-blog-post" class="slide mb-5">
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <div class="overlay-container">
                    <img src="<?php echo $details['image']; ?>" alt="web-ui-ux">
                    <a class="overlay-link popup-img" href="<?php echo $details['image']; ?>"></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="container">
              <p><?php echo $details['blog_detail']; ?></p>
              <!-- <div class="row">
                <div class="col-md-4 bio">
                  <span class="auth_img"><img src="<?php echo $details['auth_image']; ?>" alt="web-ui-ux"></span>
                  <span class="submitted">
                    <p> by <b><a href="<?= (isset($details['auth_link']) && !empty($details['auth_link']) ? $details['auth_link'] : '') ?>" class="submitted" target="blank"><?= (isset($details['by_whom']) && !empty($details['by_whom']) ? $details['by_whom'] : '') ?></a></b></p>
                  </span>
                  <span class="black">
                    <p class="black"><?= (isset($details['auth_desc']) && !empty($details['auth_desc']) ? $details['auth_desc'] : '') ?></p>
                  </span>
                  <span class=""></span>
                </div>
              </div> -->
            </div>
            <div class="comment_list">
              <div class="row">
                <div class="col-12 col-lg-10 m-auto">
                  <h3>Comments</h3>
                  <?php if (isset($comments) && !empty($comments)) {
                    foreach ($comments as $row) { ?>
                      <div class="single_comment">
                        <div class="row dis_com">
                          <div class="col-sm-10">
                            <span class="auth_img"><img src="<?php echo STATIC_FRONT_IMAGE . '/' . DEFAULT_AUTHOR_IMAGE; ?>" alt="web-ui-ux"></span>
                            <a href="#" class="padin"><?= $row['name'] ?></a>
                            <p class="padin"><?= $row['comment'] ?></p>
                          </div>
                          <p class="date"><?= date('d M Y', strtotime($row['comment_date'])) ?></p>
                        </div>
                      </div>
                    <? }
                  } else { ?>
                    <p class="black"> No comments to display</p>
                  <? } ?>
                </div>
              </div>
            </div>
          </div>
          <footer class="clearfix">
            <div class="link pull-right">
              <ul class="social-links circle small colored clearfix margin-clear text-right animated-effect-1">
              </ul>
            </div>
          </footer>
        </article>
      </div>
      <!-- socail links -->
      <div id="st-2" class="st-sticky-share-buttons st-left st-toggleable st-has-labels st-show-total">
        <div class="st-btn st-btn1" data-network="facebook" style="display: inline-block;">
          <a href="http://facebook.com/sharer/sharer.php?u=<?= $meta_tags['page_url'] ?>" title="Facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" class="fb">
            <img alt="twitter sharing button" src="https://www.facebook.com/images/fb_icon_325x325.png" style="max-width:30px;min-width:30px;">
          </a>
          <span class="st-label">Share</span>
        </div>
        <div class="st-btn st-btn2" data-network="twitter" style="display: inline-block;">
          <a href="http://twitter.com/intent/tweet?url=<?= $meta_tags['page_url'] ?>&text=<?= $meta_tags['title'] ?>"> <img alt="twitter sharing button" src="https://www.abilityfirst.org/wp-content/uploads/2018/06/Twitter.png" style="max-width:30px;min-width:30px;"></a>
          <span class="st-label">Tweet</span>
        </div>
        <div class="st-btn st-btn3" data-network="facebook" style="display: inline-block;">
          <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?= $meta_tags['page_url'] ?>&title=<?= $meta_tags['title'] ?>&source=<?= (isset($outlet_detail['alt_image']) && !empty($outlet_detail['alt_image']) ? $outlet_detail['alt_image'] : '') ?>" style='margin-top: 0px;' src="<?= (isset($outlet_detail['image']) && !empty($outlet_detail['image']) ? Modules::run('api/image_path_with_default', ACTUAL_OUTLET_TYPE_IMAGE_PATH, $outlet_detail['image'], '', '') : '') ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <img alt="twitter sharing button" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQthjrpIIouhM2QwGvzECpTiBV4_2UiSiWaNA&usqp=CAU" style="max-width:30px;min-width:30px;">
          </a>
          <span class="st-label">Share</span>
        </div>
      </div>
      <div id="comments" class="comments-area">
        <!-- .comments-title -->
        <div class="comment_listing"></div>
        <div class="container">
          <div class="row roww" style="justify-content: center;">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div id="respond" class="comment-respond">
                <h2 class="secondary-heading text-center">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" style="display:none;">Cancel reply</a></small></h2>
                <form method="post" id="commentform" class="comment-form" novalidate="" action="<?= BASE_URL ?>front/submit_comment">
                  <div class="form-group">
                    <input class="form-control" placeholder="Name" id="name" name="author" type="text" required="required">
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="email" placeholder="Email" id="email" type="email" aria-describedby="email-notes" required="required">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" id="comment" placeholder="Comment" name="comment" rows="5" maxlength="65525" required="required"></textarea>
                  </div>
                  <input type="hidden" name="comment_parent" id="comment_parent" value="">
                  <input type="hidden" name="comment_post_ID" value="<?= (isset($details['id']) && !empty($details['id']) ? $details['id'] : '') ?>" id="comment_post_ID">
                  <p class="errors alert alert-danger" style="display: none;"> Fill all required fields</p>
                  <p class="error1 alert alert-danger" style="display: none;">Please enter valid email address</p>
                  <button type="submit" class="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
              </div><!-- #respond -->
            </div>
          </div>
        </div>
      </div>
    </main>
  </div> <!-- #primary -->
</div> <!-- #content -->
</div>
<script>
  // $('#coment').keydown(function(event) {
  //     if (event.keyCode == 13) {
  //         alert('fa');
  //         // return false;
  //      }
  // });
  $(function() {
    // setInterval(
    //     function(){
    var url = $(location).attr('href').split("/").splice(5, 6).join("/");
    $.ajax({
      type: "POST",
      async: false,
      data: {
        'url': url
      },
      url: "<?= ADMIN_BASE_URL ?>front/get_coments",
      //  datatype:'html',
      success: function(data) {
        //  alert(data);
        $('.comment_listing').html(data);
      },
    })
    //  },1000),
    $(document).on('submit', 'form#commentform', function(e) {
      e.preventDefault();
      var url = $(location).attr('href').split("/").splice(5, 6).join("/");
      var name = $('#name').val();
      var email = $('#email').val();
      var coment = $('#comment').val();
      var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      if (email.match(regex)) {
        if (name != '' && email !== '' && coment !== '') {
          $.ajax({
            type: 'POST',
            url: "<?= ADMIN_BASE_URL ?>front/submit_comment",
            data: {
              'name': name,
              'email': email,
              'coment': coment,
              'url': url,
              'id': $('#comment_post_ID').val()
            },
            // async: false,
            success: function(result) {
              $('.errors').text('Thank you!Your Comment will be published after review').show();
              $('#commentform')[0].reset();
            }
          });
        } else {
          $('.errors').text('Fill all required fields').show()
        }
      } else {
        $('.error1').text('Enter valid email address').show()
      }
      // alert('da');
    });
  });
</script>