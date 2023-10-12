<div class="selected-user">
	<span>To: <span class="name"><?= $perusahaan['nama_perusahaan'] ?></span></span>
</div>
<div class="chat-container">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<div style="height: 400px; overflow: auto; width: 100%;" id="scroll" class="live<?= $perusahaan['id'] ?>">
		<ul class="chat-box chatContainerScroll">
			<?php foreach ($chat as $ball): ?>
				<?php if ($ball->id_user_from == $perusahaan['id']): ?>
					<li class="chat-left">
						<div class="chat-avatar">
							<img src="<?= base_url('assets/img/profil/'.$perusahaan['image']) ?>" alt="Retail Admin">
							<div class="chat-name"><?= $perusahaan['nama_perusahaan'] ?></div>
						</div>
						<?php if ($ball->is_read != 1): ?>
							<small class="text-center">Pesan Baru dibaca</small>
						<?php endif ?>
						<div class="chat-text"><?= $ball->message ?></div>
						<div class="chat-hour">
							<?php $date = date('Y-m-d', strtotime($ball->time)); ?>
							<?php if ($date == date('Y-m-d')): ?>
								<?= date('H:i', strtotime($ball->time)); ?>
							<?php elseif($date == date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d'))))): ?>
								Kemarin<br>
								<?= date('H:i', strtotime($ball->time)); ?>
							<?php else: ?>
								<?= date('d/m/Y', strtotime($ball->time)) ?><br>
								<?= date('H:i', strtotime($ball->time)); ?>
							<?php endif ?>
							<?php if ($ball->is_read == 1): ?>
								<span class="fa fa-check-circle"></span>
							<?php else: ?>
								<span class="fa fa-check-circle text-secondary"></span>
							<?php endif ?>
						</div>
					</li>
				<?php else: ?>
					<li class="chat-right">
						<div class="chat-hour">
							<?php $date = date('Y-m-d', strtotime($ball->time)); ?>
							<?php if ($date == date('Y-m-d')): ?>
								Hari ini<br>
								<?= date('H:i', strtotime($ball->time)); ?>
							<?php elseif($date == date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d'))))): ?>
								Kemarin<br>
								<?= date('H:i', strtotime($ball->time)); ?>
							<?php else: ?>
								<?= date('d/m/Y', strtotime($ball->time)) ?><br>
								<?= date('H:i', strtotime($ball->time)); ?>
							<?php endif ?>
							<?php if ($ball->is_read == 1): ?>
								<span class="fa fa-check-circle"></span>
							<?php else: ?>
								<span class="fa fa-check-circle text-secondary"></span>
							<?php endif ?>
						</div>
						<div class="chat-text" style="background-color: #bcf7ce;"><?= $ball->message ?></div>
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
    	<form action="" method="" onsubmit="submitChat()">
		    <select class="form-control" name="pertanyaan" id="pertanyaan">
                <option value="" selected disabled>Pilih Pertanyaan</option>
                <?php foreach ($pertanyaan as $p): ?>
                    <option value="<?= $p['pertanyaan'] ?>"><?= $p['pertanyaan'] ?></option>
                <?php endforeach ?>
            </select>
            <textarea class="form-control" name="pesan" id="pesan" rows="3" placeholder="Type your message here..."></textarea>
            <button type="button" class="btn btn-info float-right mt-1" id="kirim-chat" onclick="kirimChat(<?= $perusahaan['id'] ?>)">Kirim</button>
    	</form>
    </div>
</div>
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
	$('#scroll').scrollTop($('#scroll')[0].scrollHeight);
	$(document).ready(function() {
		setInterval(function() {
			$('#live<?= $perusahaan['id'] ?>').load('<?= base_url("Freelance/getChat2/$perusahaan[id]") ?>')
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
	
    var keyword = document.getElementById('pertanyaan');

    keyword.addEventListener('change', function() {
    	$.ajax({
            success : function(data){
                $('#pesan').val(pertanyaan.value);
            }
        });
    })
</script>