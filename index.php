<?php
header( "Content-Type: text/html; charset=utf-8" );
# Счетчик
function TimerSet(){
	list($seconds, $microSeconds) = explode(' ', microtime());
	return $seconds + (float) $microSeconds;
}
$_timer_a = TimerSet();
# Старт сессии
@session_start();
# Старт буфера
@ob_start();

 include 'inc/header.php'; ?>
  <div class="row" style="background-color: #f2f2f2;">
    <?php include 'inc/content.php'; ?>
    <?php include 'inc/left.php'; ?>
  </div>
</div>

<?php include 'inc/footer.php'; ?>
