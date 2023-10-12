<div class="selected-user">
	<span>To: <span class="name"><?= $grup['nama_grup'] ?></span></span>
</div>
<div class="chat-container">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<div style="height: 400px; overflow: auto; width: 100%;" id="scroll" class="live<?= $grup['id_grup'] ?>">
		<ul class="chat-box chatContainerScroll">
			<?php foreach ($chat as $ball): ?>
				<?php if ($ball->id_user != $user['id']): ?>
					<li class="chat-left">
						<div class="chat-avatar">
							<img src="<?= base_url('assets/img/profil/'.$ball->image) ?>" alt="Retail Admin">
							<div class="chat-name"><?= $ball->username ?></div>
						</div>
						<!-- <?php if ($ball->is_read != 1): ?>
							<small class="text-center">Pesan Baru dibaca</small>
						<?php endif ?> -->

						
						<div class="chat-text"><?= $ball->pesan ?></div>
						<div class="chat-hour">
							<?php $date = date('Y-m-d', strtotime($ball->waktu_kirim)); ?>
							<?php if ($date == date('Y-m-d')): ?>
								<?= date('H:i', strtotime($ball->waktu_kirim)); ?>
							<?php elseif($date == date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d'))))): ?>
								Kemarin<br>
								<?= date('H:i', strtotime($ball->waktu_kirim)); ?>
							<?php else: ?>
								<?= date('d/m/Y', strtotime($ball->waktu_kirim)) ?><br>
								<?= date('H:i', strtotime($ball->waktu_kirim)); ?>
							<?php endif ?>
							<!-- <?php if ($ball->is_read == 1): ?>
								<span class="fa fa-check-circle"></span>
							<?php else: ?>
								<span class="fa fa-check-circle text-secondary"></span>
							<?php endif ?> -->
						</div>
					</li>
				<?php else: ?>
					<li class="chat-right">
						<div class="chat-hour">
							<?php $date = date('Y-m-d', strtotime($ball->waktu_kirim)); ?>
							<?php if ($date == date('Y-m-d')): ?>
								Hari ini<br>
								<?= date('H:i', strtotime($ball->waktu_kirim)); ?>
							<?php elseif($date == date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d'))))): ?>
								Kemarin<br>
								<?= date('H:i', strtotime($ball->waktu_kirim)); ?>
							<?php else: ?>
								<?= date('d/m/Y', strtotime($ball->waktu_kirim)) ?><br>
								<?= date('H:i', strtotime($ball->waktu_kirim)); ?>
							<?php endif ?>
							<!-- <?php if ($ball->is_read == 1): ?>
								<span class="fa fa-check-circle"></span>
							<?php else: ?>
								<span class="fa fa-check-circle text-secondary"></span>
							<?php endif ?> -->
						</div>
						<div class="chat-text" style="background-color: #bcf7ce;"><?= $ball->pesan ?></div>
						<div class="chat-avatar">
							<img src="<?= base_url('assets/img/profil/'.$user['image']) ?>" alt="Retail Admin">
							<div class="chat-name">Saya</div>
						</div>
					</li>
				<?php endif ?>
			<?php endforeach ?>
        </ul>
	</div>
    <div class="form-group mt-3 mb-0">
    	<form action="" method="" onsubmit="submitChatGrup()">
            <textarea class="form-control" name="pesan" id="pesan" rows="3" placeholder="Type your message here..."></textarea>
            <button type="button" class="btn btn-info float-right mt-1" id="kirim-chat" onclick="kirimChatGrup(<?= $grup['id_grup'] ?>)">Kirim</button>
    	</form>
    </div>
</div>
<script type="text/javascript">
	$('#scroll').scrollTop($('#scroll')[0].scrollHeight);
	$(document).ready(function() {
		setInterval(function() {
			$('#live<?= $grup['id_grup'] ?>').load('<?= base_url("Perusahaan/getChatGrup2/$grup[id_grup]") ?>')
		}, 1000);
	});

	function getCaret(el) { 
	    if (el.selectionStart) { 
	        return el.selectionStart; 
	    } else if (document.selection) { 
	        el.focus();
	        var r = document.selection.createRange(); 
	        if (r == null) { 
	            return 0;
	        }
	        var re = el.createTextRange(), rc = re.duplicate();
	        re.moveToBookmark(r.getBookmark());
	        rc.setEndPoint('EndToStart', re);
	        return rc.text.length;
	    }  
	    return 0; 
	}

	$('textarea').keyup(function (event) {
	    if (event.keyCode == 13) {
	        var content = this.value;  
	        var caret = getCaret(this);          
	        if(event.shiftKey){
	            this.value = content.substring(0, caret - 1) + "\n" + content.substring(caret, content.length);
	            event.stopPropagation();
	        } else {
	            this.value = content.substring(0, caret - 1) + content.substring(caret, content.length);
	            $('#kirim-chat').click();
	        }
	    }
	});
</script>