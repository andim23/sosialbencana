<!-- banner -->
<div class="banner-bg-inner" style="background: url(<?php echo base_url('uploads/').$post['nama_img'];?>) no-repeat center; background-size:cover;">
  <!-- banner-text -->
  <div class="banner-text-inner">
    <div class="container">
      <h2 class="title-inner">
        <?php echo $post['caption']; ?>
      </h2>
    </div>
  </div>
  <!-- //banner-text -->
</div>
<!-- //banner -->
<div class="clearfix"></div>
<div class="clear-fix"><br><br></div>
<!-- breadcrumbs -->
<div class="crumbs text-center">
  <div class="container">
    <div class="row">
      <ul class="btn-group btn-breadcrumb bc-list">
        <li class="btn ">
          <a href="<?php echo base_url() ?>">
            <i class="glyphicon glyphicon-home"></i>
          </a>
        </li>
        <li class="btn ">
          <a href="<?php echo base_url('home') ?>">Posting</a>
        </li>
        <li class="btn ">
          <a href="<?php echo base_url('Home/post_detail/'.$post['id_post']) ?>"><?php echo $post['caption']; ?></a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!--//breadcrumbs ends here-->

<div class="clearfix"></div>
<div class="clear-fix"><br><hr></div>

<!-- Single -->
<div class="innerf-pages section">
  <div class="container">

    <div class="col-lg-4 single-right-left ">
      <div class="grid images_3_of_2">
        <div class="flexslider1">
          <ul class="slides">
            <li data-thumb="<?php echo base_url('uploads/').$post['nama_img']?>">
              <div class="thumb-image"><img src="<?php echo base_url('uploads/').$post['nama_img'] ?>" data-imagezoom="true" alt=" " class="img-responsive"> </div>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>

    <div class="col-lg-8 single-right-left simpleCart_shelfItem">

    <div class="clearfix"></div>
    <div class="desc_single">
      <h2 style="align: center;">Description</h2>
      <br>
      <table class="col-md-12">
        <tr>
          <th class="col-lg-5">Api Gambar </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-7"><?php echo $post['api_img']; ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Slug </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $post['slug_post']; ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Lokasi </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $post['lokasi']; ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Latitude </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $post['lttd_loc']; ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Longitude </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $post['lgttd_loc']; ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Caption </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $post['caption']; ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Tanggal </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $post['tanggal']."-".$post['waktu']; ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Kode User </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $post['user_kode']; ?></td>
        </tr>
      </table>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="clear-fix"><br><br><br><hr></div>

  <div class="mapContainer">
    <div id="map2" class="map2"></div>
  </div>
  <div class="clear-fix"><br></div>
  <div class="text-center">
    <a href="<?php echo base_url('posting'); ?>" class="btn btn-danger btn-sm"><i class="fa fa-rotate-left"></i> KEMBALI</a>
    <a class="btn btn-success btn-sm" target="_blank" href="//maps.google.com/maps?f=d&amp;daddr=<?php echo $post['lttd_loc']; ?>,<?php echo $post['lgttd_loc']; ?>&amp;hl=en">
      Buka Alamat pada GoogleMaps
    </a>
  </div>

  </div>
</div>
<!--// Single -->
<div class="clearfix"></div>
<hr>
<br>
<br>
<br>
<br>

<!-- /new_arrivals -->
<div class="singlep_btm">
  <div class="container">
    <div class="new_arrivals">
      <h4 class="rad-txt text-center">
        <span class="abtxt1">Berita</span>
        <span class="abtext"> Terbaru</span>
      </h4>
      <!-- row3 -->
      <?php $i=1; foreach( $limit as $post) {?>
      <div class="col-md-3 product-men">
        <div class="product-chr-info chr">
          <div class="thumbnail">
            <a href="<?php echo base_url('Home/post_detail/').$post['slug_post'] ?>">
              <img src="<?php echo base_url('uploads/').$post['nama_img'] ?>" alt="">
            </a>
          </div>
          <div class="caption">
            <h4><?php echo $post['caption'] ?></h4>
            <p><?php echo $post['tanggal'] ?></p>

            <form action="<?php echo base_url('Home/post_detail/'.$post['id_post']) ?>" method="post">
              <button type="submit" class="btn btn-info btn-md">Read More
                <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
      <?php } ?>

      <!-- //row3 -->
      <div class="clearfix"></div>
    </div>
    <!--//new_arrivals-->
    <div class="clearfix"></div>
    <br>
    <br>
    <br>
    <br>

  </div>
</div>
<!--// Single -->
