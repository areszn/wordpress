<?php 
/*
Template Name:User_center
*/
?>
<?php get_header(); ?>


<style type="text/css">
<!--

.left_sidebar{
float:left;
width:220px;
}

.content{
float:right;
width:800px;
}

.area {

  height:800px;
  margin: auto;
  background-color: #FFF;
  border-radius: 6px;
  margin-top: 10px;
  padding: 20px 0px;
  box-shadow: 0 0 6px rgba(0, 0, 0, 0.1); }

  

  /* ============== sidebar ============== */
.sidebar {
  border-top: 1px solid #EEE; }
  .sidebar ul {
    padding: 0;
    margin: 0; }
    .sidebar ul li {
      list-style-type: none; }
      .sidebar ul li a {
        display: block;
        padding: 10px;
        border-bottom: 1px solid #EEE;
        text-transform: uppercase; }
      .sidebar ul li a:hover {
        background-color: #EEE;
        /*        color: #FFF;*/
        text-decoration: none; }
      .sidebar ul li ul {
        background-color: #F6F6F6;
        box-shadow: inset 0 1px 10px #E0E0E0; }
  -->
</style>


    <div class="area">


	<div class="left_sidebar">
    <div class="sidebar">

	
	<h4>个人中心</h4>
        <ul>
		<?php
		if (is_super_admin())
		{
		?>
		<li ><a href="wp-admin/index.php">管理站点</a></li>
		<li ><a href="post-new">信息发布</a></li>
		<li ><a href="profile">个人资料</a></li>
		<li ><a href="category/ie">专家博客</a></li>
		<?php
		} else {
		?>
		
		<li ><a href="post-new">信息发布</a></li>
		<li ><a href="profile">个人资料</a></li>
		<li ><a href="dashboard">我的文章</a></li>
		<li ><a href="category/ie">专家博客</a></li>
		
		<?php
		}
		?>
        </ul>
      </div>
 </div>


	<div class="content">


	<section>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content' ); ?>
	</section>
	<!-- #content -->
	<?php comments_template( '', true ); ?>
	<?php endwhile; ?>



  </div>


    </div>

<?php get_footer(); ?> 