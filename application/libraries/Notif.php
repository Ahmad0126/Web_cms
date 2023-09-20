<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notif{
    function set($pesan, $warna){
        return '
		<div class="alert alert-'.$warna.' alert-dismissible fade show notifikasi" role="alert">
			<span class="alert-icon"><i class="fa fa-exclamation"></i></span>
            <span class="alert-text">'.$pesan.'</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
		</div>';
    }
}