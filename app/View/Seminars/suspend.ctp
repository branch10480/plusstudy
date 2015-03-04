<?php
	// このページ限定のCSS,JS
	// $this->Html->script(array(
	// 	'imgopt',
	// 	), array('inline' => false));
	$this->Html->css(array(
		'seminars',
		), null, array('inline' => false));
?>

<script>
	$(window).load(function () {
		ImgOpt.setImgId('.optim');
		ImgOpt.optimize();
	});
</script>


<h2><img src="<?php echo IMG_PATH; ?>seminarcreateconfirm_h.png" alt="勉強会作成確認" width="306" height="109"><span class="hidden">勉強会作成確認</span></h2>
<section id="newSmnConfirm">
	<div class="wrapper">
		<div id="coverArea">
			<?php
				if (!empty($smnImgId))
					echo '<img src="' . $smnImgId . '" alt="">';
			?>
		</div>
		<h3><?php echo htmlspecialchars($smnName); ?></h3>
		<div class="cf">
			<article>
			<h4>詳細</h4>
				<?php echo $dsc; ?>
			</article>
			<aside>
			<h4>開催情報</h4>
			<div>
				<dl>
					<dt>開催日時</dt>
					<dd><?php
						list($date, $month, $day) = split('-', $startDate);
						echo $date . '年' . $month . '月' . $day . '日<br />' . sprintf('%02d', $startH) . ':' . sprintf('%02d', $startM) . '〜' . sprintf('%02d', $endH) . ':' . sprintf('%02d', $endM);
					?></dd>
					<dt>開催場所</dt>
					<dd><?php echo htmlspecialchars($place); ?></dd>
					</dd>
					<dt>募集人数</dt>
					<dd>
						<?php echo +$upperLimit === 0 ? '制限なし' : $upperLimit . '人まで'; ?>
					</dd>
					<dt>予約締切日時</dt>
					<dd>
					<?php
						list($limitDate, $limitMonth, $limitDay) = split('-', $rsvLimitDate);
						echo $limitDate . '年' . $limitMonth . '月' . $limitDay . '日<br />' . sprintf('%02d', $rsvLimitH) . '時' . sprintf('%02d', $rsvLimitM) . '分';
					?>
					</dd>
					<dt>主催者</dt>
					<dd>
						<p><?php echo htmlspecialchars($hostUser['last_name']) . ' ' . htmlspecialchars($hostUser['first_name']); ?></p>
						<div class="profImg">
							<?php echo $this->HTML->image('profile/' . $hostUser['id'] . '.' . $hostUser['img_ext'], array('class' => 'optim')); ?>
						</div>
					</dd>
				</dl>
			</div>
			</aside>
		</div>
	</div>
</section>

<div class="btnArea cf" id="newSmnConfirmbtnArea">
	<?php echo $this->Html->link($this->HTML->image('seminarcreateback_btn.png', array('width' => '222', 'height' => '54')), array('action' => 'index'), array('escape' => false)); ?>
	<?php echo $this->Html->link($this->HTML->image('seminarcreateok_btn.png', array('width' => '222', 'height' => '54')), array('action' => 'register'), array('escape' => false)); ?>
</div>