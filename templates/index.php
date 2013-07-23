<?php include_once("_header.php"); ?>

<div class="row">
    <div class="large-12 columns">
		<h2><?php p($_['uname']); ?></h2>
	</div>
</div>
<div class="row">    
    <div class="large-4 columns">
        <h3>Preferences</h3>
        <ul class="preference-list">
            <li><a href="#">Preferences name</a></li>
            <li><a href="#">Preferences name</a></li>
            <li><a href="#">Preferences name</a></li>
            <li><a href="#">Preferences name</a></li>
            <li><a href="#">Preferences name</a></li>
            <li><a href="#">Preferences name</a></li>
            <li><a href="#">Preferences name</a></li>
            <li><a href="#">Preferences name</a></li>
            <li><a href="#">Preferences name</a></li>
            <li><a href="#">Preferences name</a></li>
        </ul>
        <ul class="pagination">
            <li class="arrow unavailable"><a href="">&laquo;</a></li>
            <li class="current"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li class="unavailable"><a href="">&hellip;</a></li>
            <li><a href="">12</a></li>
            <li><a href="">13</a></li>
            <li class="arrow"><a href="">&raquo;</a></li>
        </ul>
    </div>
    <div class="large-4 columns">
        <h3 class="center">Apps</h3>
        <ul class="apps-list">
            <li><a href="#">App name</a></li>
        </ul>
    </div>
    <div class="large-4 columns">
        <h3><a href="<?php p(OCP\Util::linkToRoute('devices_path'));?>">Devices</a></h3>
        <ul class="device-list">
            <li><a href="#">App name</a></li>
        </ul>
    </div>
</div>
<?php include_once("_footer.php"); ?>